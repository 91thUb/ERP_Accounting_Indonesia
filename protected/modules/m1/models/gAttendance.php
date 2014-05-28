<?php

/**
 * This is the model class for table "c_personalia_absence".
 *
 * The followings are the available columns in table 'c_personalia_absence':
 * @property string $id
 * @property string $parent_id
 * @property string $cdate
 * @property integer $realpattern_id
 * @property integer $daystatus1_id
 * @property string $in
 * @property string $out
 */
class gAttendance extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @return cPersonaliaAbsence the static model class
     */
    public $lateIn;
    public $earlyOut;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'g_attendance';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cdate', 'required'),
            array('remark', 'required', 'on' => 'changeshift', 'message' => 'Remark cannot be blank. You must explain the reason why you change your schedule...'),
            array('cdate', 'date', 'format' => 'dd-MM-yyyy'),
            //array('cdate, parent_id', 'ext.EUniqueIndexValidator'),
            array('realpattern_id, changepattern_id, daystatus1_id,daystatus2_id,daystatus3_id, overtime_in, overtime_out', 'numerical', 'integerOnly' => true),
            array('parent_id', 'length', 'max' => 11),
            array('remark, notes', 'length', 'max' => 150),
            array('cdate, in, out', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent_id, cdate, realpattern_id, daystatus1_id, in, out', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'realpattern' => array(self::BELONGS_TO, 'gParamTimeblock', 'realpattern_id'),
            'changepattern' => array(self::BELONGS_TO, 'gParamTimeblock', 'changepattern_id'),
            'person' => array(self::BELONGS_TO, 'gPerson', 'parent_id'),
            'permission1' => array(self::BELONGS_TO, 'gParamPermission', 'daystatus1_id'),
            'permission2' => array(self::BELONGS_TO, 'gParamPermission', 'daystatus2_id'),
            'permission3' => array(self::BELONGS_TO, 'gParamPermission', 'daystatus3_id'),
            'approved' => array(self::BELONGS_TO, 'sParameter', array('approved_id' => 'code'), 'condition' => 'type = \'cLeaveApproved\''),
            'superior_approved' => array(self::BELONGS_TO, 'sParameter', array('superior_approved_id' => 'code'), 'condition' => 'type = \'cLeaveApproved\''),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'cdate' => 'Date',
            'realpattern_id' => 'Real Pattern',
            'changepattern_id' => 'Change Pattern',
            'daystatus1_id' => 'Day Status 1',
            'daystatus2_id' => 'Day Status 2',
            'daystatus3_id' => 'Day Status 3',
            'in' => 'In',
            'out' => 'Out',
            'remark' => 'Remark',
            'notes' => 'Notes to HR',
            'overtime_in' => 'Overtime In',
            'overtime_out' => 'Overtime Out',
        );
    }

    public function search($id, $month) {
        $criteria = new CDbCriteria;

        $criteria->compare('parent_id', $id);
        $criteria->addBetweenCondition('cdate', date("Y-m-d", strtotime(date("Y-m", strtotime($month . " month")) . "-01")), date("Y-m-d", strtotime("-1 day", strtotime(date("Y-m", strtotime($month + 1 . " month")) . "-01"))));
        $criteria->order = 'cdate';
        $criteria->with = 'realpattern';

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            //'pagination'=>array(
            //		'pageSize'=>31,
            //),
            'pagination' => false,
        ));
    }

    public function searchOvertime($id, $month) {

        $criteria = new CDbCriteria;

        $criteria->compare('parent_id', $id);
        $criteria->addBetweenCondition('cdate', date("Y-m-d", strtotime(date("Y-m", strtotime($month . " month")) . "-01")), date("Y-m-d", strtotime("-1 day", strtotime(date("Y-m", strtotime($month + 1 . " month")) . "-01"))));
        //$criteria->compare('realpattern_id',$this->realpattern_id);

        $criteria->order = 'cdate';
        $criteria->with = 'realpattern';

        $criteria1 = new CDbCriteria;
        $criteria1->compare('daystatus3_id', 400, false, 'OR');
        $criteria1->compare('daystatus3_id', 500, false, 'OR');
        $criteria1->compare('daystatus3_id', 600, false, 'OR');
        $criteria->mergeWith($criteria1);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 31,
            ),
        ));
    }

    public function onWaiting() {

        $criteria = new CDbCriteria;

        //if (Yii::app()->user->name != "admin") {
        $criteria2 = new CDbCriteria;
        $criteria2->condition = '(select c.company_id from g_person_career c WHERE t.parent_id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
        $criteria->mergeWith($criteria2);
        //}

        $criteria->with = array('person');
        $criteria->together = true;
        $criteria->compare('approved_id', 1);
        //$criteria->compare('start_date>',Yii::app()->dateFormatter->format("yyyy-MM-dd",time()));
        $criteria->order = 't.cdate';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            //'pagination'=>false,
            'pagination' => array(
                'pageSize' => 50,
            )
        ));
    }

    public function getLateInStatus() {
        if (isset($this->in) && peterFunc::isTimeMore($this->in, $this->realpattern->in)) {
            $_val = "Late In";
        } else
            $_val = "";

        return $_val;
    }

    public function getEarlyOutStatus() {
        if (isset($this->out) && peterFunc::isTimeMore2($this->realpattern->out, $this->out, $this->in)) {
            $_val = "Early Out";
        } else
            $_val = "";

        return $_val;
    }

    public function getActualIn() {
        if (isset($this->in)) {
            $_val = peterFunc::toTime($this->in);
        } elseif ($this->realpattern_id != 90 && $this->realpattern_id != 89 && !isset($this->syncLeave) && time() > strtotime($this->cdate . " " . $this->in)) {
            $_val = "??:??";
        } else
            $_val = "";

        return $_val;
    }

    public function getActualOut() {
        if (isset($this->out)) {
            $_val = peterFunc::toTime($this->out);
        } elseif ($this->realpattern_id != 90 && $this->realpattern_id != 89 && !isset($this->syncLeave) && time() > strtotime($this->cdate . " " . $this->out)) {
            $_val = "??:??";
        } else
            $_val = "";

        return $_val;
    }

    public function getDiffIn() {
        if (peterFunc::isTimeMore($this->in, $this->realpattern->in)) {
            $_val = peterFunc::countTimeDiff($this->in, $this->realpattern->in);
        } else
            $_val = "";

        return $_val;
    }

    public function getDiffOut() {
        if (peterFunc::isTimeMore2($this->realpattern->out, $this->out, $this->in)) {
            $_val = peterFunc::countTimeDiff($this->realpattern->out, $this->out);
        } else
            $_val = "";

        return $_val;
    }

    public function getOvertimeIn() {
        if ($this->daystatus3_id == 500 || $this->daystatus3_id == 600) {
            $_val = peterFunc::countTimeDiff($this->realpattern->in, $this->in);
        } else
            $_val = "";

        return $_val;
    }

    public function getOvertimeOut() {
        if ($this->daystatus3_id == 400) {
            $_val = peterFunc::countTimeDiff($this->out, $this->realpattern->out);
        } else
            $_val = "";

        return $_val;
    }

    public function getOkName() {
        if ($this->daystatus3_id == 100) {
            $_val = "CONFIRM";
        } elseif ($this->daystatus3_id == 200) {
            $_val = "CUTI";
        } elseif ($this->daystatus3_id == 300) {
            $_val = "ALPHA";
        } elseif ($this->daystatus3_id == 400) {
            $_val = "LEMBUR";
        } elseif ($this->daystatus3_id == 500) {
            $_val = "LEMBUR DATANG";
        } elseif ($this->daystatus3_id == 600) {
            $_val = "LEMBUR DATANG DAN PULANG";
        } else
            $_val = "";

        return $_val;
    }

    public function getSyncPermission() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->parent_id);

        $criteria1 = new CDbCriteria;
        //$criteria1->compare('DATE_FORMAT(start_date,"%Y-%m-%d")', date("Y-m-d", strtotime($this->cdate)), false, 'OR');
        //$criteria1->compare('DATE_FORMAT(end_date,"%Y-%m-%d")', date("Y-m-d", strtotime($this->cdate)), false, 'OR');
        $criteria1->condition = 'DATE_FORMAT(start_date,"%Y-%m-%d") <= "' . date("Y-m-d", strtotime($this->cdate)) . '" AND 
        					 DATE_FORMAT(end_date,"%Y-%m-%d") >= "' . date("Y-m-d", strtotime($this->cdate)) . '"';

        $criteria->mergeWith($criteria1);

        $model = gPermission::model()->find($criteria);

        if (isset($model) && $this->realpattern_id <> 90 && $this->realpattern_id <> 89) {
            return $model;
        } else
            return null;
    }

    public function getSyncLeave() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->addInCondition('approved_id', array(1, 2));

        $criteria1 = new CDbCriteria;
        $criteria1->condition = 'DATE_FORMAT(start_date,"%Y-%m-%d") <= "' . date("Y-m-d", strtotime($this->cdate)) . '" AND 
        					 DATE_FORMAT(end_date,"%Y-%m-%d") >= "' . date("Y-m-d", strtotime($this->cdate)) . '"';

        $criteria->mergeWith($criteria1);

        $model = gLeave::model()->find($criteria);

        if (isset($model) && $this->realpattern_id <> 90 && $this->realpattern_id <> 89) {
            return $model;
        } else
            return null;
    }

    public static function searchCount($id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('parent_id', $id);
        $criteria->compare('superior_approved_id', 1);
        $criteria->order = 't.start_date DESC, t.id DESC';

        return self::model()->count($criteria);
    }

    public static function searchCountMonth($id, $month = 0) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->addBetweenCondition('cdate', date("Y-m-d", strtotime(date("Y-m", strtotime($month . " month")) . "-01")), date("Y-m-d", strtotime("-1 day", strtotime(date("Y-m", strtotime($month + 1 . " month")) . "-01"))));

        $criteria->compare('parent_id', $id);
        $criteria->compare('superior_approved_id', 1);

        return self::model()->count($criteria);
    }

    /* public function afterSave() {
      if($this->isNewRecord) {
      Notification::create(
      1,
      'm1/gAttendance/view/id/'.$this->parent_id,
      'Attendance. New Attendance created: '.$this->person->employee_name
      );
      }
      return true;
      } */

    public static function getTopCreated() {

        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->with = array('person');
        $criteria->group = 'employee_name';
        $criteria->order = "t.created_date DESC";
        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.parent_id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->person->employee_name) > 28) ? substr($model->person->employee_name, 0, 28) . "..." : $model->person->employee_name;
            $returnarray[] = array(
                'id' => $model->person->id,
                'description' => $model->person->employeeShortId . " | " . $model->person->mDepartment(),
                'label' => $_nama,
                'photo' => $model->person->photoPath,
                'url' => array('view', 'id' => $model->person->id,
            ));
        }

        return $returnarray;
    }

    public static function getTopUpdated() {

        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->with = array('person');
        $criteria->group = 'employee_name';
        $criteria->order = "t.updated_date DESC";
        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.parent_id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->person->employee_name) > 28) ? substr($model->person->employee_name, 0, 28) . "..." : $model->person->employee_name;
            $returnarray[] = array(
                'id' => $model->person->id,
                'description' => $model->person->employeeShortId . " | " . $model->person->mDepartment(),
                'label' => $_nama,
                'photo' => $model->person->photoPath,
                'url' => array('view', 'id' => $model->person->id,
            ));
        }

        return $returnarray;
    }

    public function lateList() {

        $sql = "
            SELECT a.id, a.employee_name, '" . date('Y') . date('m') . "' as period, 0 as cmonth,
                (select count(id) from g_attendance 
                where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . date('Y') . date('m') . ") as xcount, 

                (select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(subtime(g.`out`,'01:00:00'), g.`in`)))),'%H.%i.%s') from g_attendance g 
                    inner join g_param_timeblock t on t.id = g.realpattern_id
                    where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . date('Y') . date('m') . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89))
                    as workhour,

                (select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . date('Y') . date('m') . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2) 
                as cuti,

                ((select count(id) from g_attendance 
                where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . date('Y') . date('m') . " 
                    and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' 
                    and realpattern_id NOT IN (90,89)  and `out` is null and `in` is null) 
                    -
                (ifnull((select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . date('Y') . date('m') . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2),0)) 
                -
                (ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
                where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . date('Y') . date('m') . " 
                    and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0))
                    ) 
                -
                (ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
                where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . date('Y') . date('m') . " 
                    and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0)) 

                      as alpha,

                (select count(g.id) from g_attendance g 
                    inner join g_param_timeblock t on t.id = g.realpattern_id
                    where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . date('Y') . date('m') . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
                    and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
                    as lateIn,

                (select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(g.`in`, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')))))),'%H.%i.%s') from g_attendance g 
                    inner join g_param_timeblock t on t.id = g.realpattern_id
                    where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . date('Y') . date('m') . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
                    and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
                    as lateInCount,

                (select count(g.id) from g_attendance g 
                    inner join g_param_timeblock t on t.id = g.realpattern_id
                    where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . date('Y') . date('m') . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
                    and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
                    as earlyOut,

                (select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00')), g.out)))),'%H.%i.%s') from g_attendance g 
                    inner join g_param_timeblock t on t.id = g.realpattern_id
                    where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . date('Y') . date('m') . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
                    and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
                    as earlyOutCount,

                (select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . date('Y') . date('m') . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is not null and `in` is null) 
                as tad,
                (select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . date('Y') . date('m') . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is null and `in` is not null) 
                as tap,

                (select sum(datediff(end_date,start_date)+1) from g_permission 
                where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . date('Y') . date('m') . " 
                    and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
                as sakit,
                
                (select sum(datediff(end_date,start_date)+1) from g_permission 
                where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . date('Y') . date('m') . " 
                    and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
                as special

            FROM g_person a
            WHERE (select 
                    `o`.`id` AS `id`
                from
                    (`erp_apl`.`g_person_career` `c`
                    left join `erp_apl`.`a_organization` `o` ON ((`o`.`id` = `c`.`company_id`)))
                where
                    ((`a`.`id` = `c`.`parent_id`)
                        and (`c`.`status_id` in (1 , 2, 3, 4, 5, 6, 15)))
                order by `c`.`start_date` desc
                limit 1) = " . sUser::model()->myGroup . "
            ORDER BY 
                (select count(g.id) from g_attendance g 
                    inner join g_param_timeblock t on t.id = g.realpattern_id
                    where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . date('Y') . date('m') . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
                    and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) DESC
            LIMIT 20";

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array(
            'id' => 'stat',
            'pagination' => false,
        ));

        return $dataProvider;
    }

}
