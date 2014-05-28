<?php

/**
 * This is the model class for table "g_person".
 *
 * The followings are the available columns in table 'g_person':
 * @property integer $id
 * @property string $employee_code
 * @property string $employee_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $sex_id
 * @property integer $religion_id
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $pos_code
 * @property string $identity_number
 * @property string $identity_valid
 * @property string $identity_address1
 * @property string $identity_address2
 * @property string $identity_address3
 * @property string $identity_pos_code
 * @property string $email
 * @property string $email2
 * @property string $blood_id
 * @property string $home_phone
 * @property string $handphone
 * @property string $handphone2
 * @property string $c_pathfoto
 * @property integer $userid
 * @property integer $t_status
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property GLeave[] $gLeaves
 * @property GPersonAbsence[] $gPersonAbsences
 * @property GPersonEducation[] $gPersonEducations
 * @property GPersonFamily[] $gPersonFamilies
 * @property GPersonKarir[] $gPersonKarirs
 */
class gPerson extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return gPerson the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'g_person';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_name, birth_place, birth_date', 'required'),
            array('email, handphone', 'required', 'on' => 'ess'),
            array('birth_date', 'date', 'format' => 'dd-MM-yyyy'),
            array('activation_expire,sex_id, religion_id, userid, t_status, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly' => true),
            array('address3, identity_address3, blood_id', 'length', 'max' => 50),
            array('employee_code, employee_code_global', 'length', 'max' => 50),
            array('activation_code', 'length', 'max' => 16),
            array('employee_name', 'length', 'max' => 100),
            array('email', 'email'),
            //array('handphone', 'ext.BPhoneNumberValidator'),
            array('birth_place', 'length', 'max' => 20),
            array('address1, identity_address1, c_pathfoto', 'length', 'max' => 255),
            array('c_pathfoto', 'unique', 'on' => 'create'),
            array('address2, identity_address2, home_phone, handphone, handphone2, account_number, account_name, bank_name', 'length', 'max' => 50),
            array('pos_code, identity_pos_code', 'length', 'max' => 5),
            array('identity_number', 'length', 'max' => 25),
            array('birth_date, identity_valid', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, employee_code, employee_name, birth_place, birth_date, sex_id, religion_id, address1, address2, address3, pos_code, identity_number, identity_valid, identity_address1, identity_address2, identity_address3, identity_pos_code, email, email2, blood_id, home_phone, handphone, handphone2, c_pathfoto, userid, t_status, created_date, created_by, updated_date, updated_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'many_career' => array(self::HAS_MANY, 'gPersonCareer', 'parent_id', 'order' => 'many_career.start_date DESC'),
            'many_careerC' => array(self::STAT, 'gPersonCareer', 'parent_id'),
            'many_career2' => array(self::HAS_MANY, 'gPersonCareer2', 'parent_id', 'order' => 'many_career2.start_date DESC'),
            'many_career2C' => array(self::STAT, 'gPersonCareer2', 'parent_id'),
            'many_status' => array(self::HAS_MANY, 'gPersonStatus', 'parent_id', 'order' => 'many_status.start_date DESC'),
            'many_statusC' => array(self::STAT, 'gPersonStatus', 'parent_id'),
            'many_experience' => array(self::HAS_MANY, 'gPersonExperience', 'parent_id', 'order' => 'many_experience.start_date DESC'),
            'many_experienceC' => array(self::STAT, 'gPersonExperience', 'parent_id'),
            'many_education' => array(self::HAS_MANY, 'gPersonEducation', 'parent_id', 'order' => 'many_education.level_id DESC'),
            'many_educationC' => array(self::STAT, 'gPersonEducation', 'parent_id'),
            'many_educationnf' => array(self::HAS_MANY, 'gPersonEducationNf', 'parent_id'),
            'many_educationnfC' => array(self::STAT, 'gPersonEducationNf', 'parent_id'),
            'many_otherC' => array(self::STAT, 'gPersonOther', 'parent_id'),
            'many_training' => array(self::HAS_MANY, 'gPersonTraining', 'parent_id', 'order' => 'many_training.start_date'),
            'many_training_holding' => array(self::HAS_MANY, 'iLearningSchPart', 'employee_id', 'condition' => 'flow_id = 2'),
            'many_training_holding_empty' => array(self::HAS_MANY, 'iLearningSchPart', 'employee_id', 'condition' => 'flow_id is null or flow_id = 2'),
            'many_trainingC' => array(self::STAT, 'gPersonTraining', 'parent_id'),
            'many_family' => array(self::HAS_MANY, 'gPersonFamily', 'parent_id', 'order' => 'many_family.relation_id'),
            'many_familyC' => array(self::STAT, 'gPersonFamily', 'parent_id'),
            'has_couple' => array(self::STAT, 'gPersonFamily', 'parent_id', 'condition' => 'relation_id = 1 OR relation_id = 2'),
            'count_children' => array(self::STAT, 'gPersonFamily', 'parent_id', 'condition' => 'relation_id = 3'),
            'religion' => array(self::BELONGS_TO, 'sParameter', array('religion_id' => 'code'), 'condition' => 'type = \'cAgama\''),
            'sex' => array(self::BELONGS_TO, 'sParameter', array('sex_id' => 'code'), 'condition' => 'type = \'cKelamin\''),
            'company' =>
            array(self::HAS_ONE, 'gPersonCareer', 'parent_id',
                //'order' => 'company.start_date DESC',
                'condition' => 'company.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ')',
            ),
            'companycurrent' =>
            array(self::HAS_ONE, 'gPersonCareer', 'parent_id',
                'order' => 'companycurrent.start_date DESC',
            ),
            'companyfirst' => array(self::HAS_ONE, 'gPersonCareer', 'parent_id', 'order' => 'companyfirst.start_date ASC', 'condition' => 'companyfirst.status_id =1'),
            'companyfirstG' => array(self::HAS_ONE, 'gPersonCareer', 'parent_id', 'order' => 'companyfirstG.start_date ASC', 'condition' => 'companyfirstG.status_id =9'),
            'status' => array(self::HAS_ONE, 'gPersonStatus', 'parent_id', 'order' => 'status.start_date DESC'),
            'leave' => array(self::HAS_MANY, 'gLeave', 'parent_id', 'order' => 'leave.start_date DESC'),
            'leaveBalance' => array(self::HAS_ONE, 'gLeave', 'parent_id', 'order' => 'leaveBalance.end_date DESC,leaveBalance.id DESC', 'condition' => 'leaveBalance.approved_id NOT IN (1,5,6)'),
            'leaveGenerated' => array(self::HAS_ONE, 'gLeave', 'parent_id', 'order' => 'leaveGenerated.end_date DESC', 'condition' => 'leaveGenerated.approved_id IN (7,9)'),
            'lastLeave' => array(self::HAS_ONE, 'gLeave', 'parent_id', 'order' => 'lastLeave.end_date DESC', 'condition' => 'lastLeave.approved_id = 2'),
            'user' => array(self::BELONGS_TO, 'sUser', 'userid'),
            'payroll' => array(self::HAS_ONE, 'gPayroll', 'parent_id', 'order' => 'payroll.yearmonth_start DESC'),
            'updated' => array(self::BELONGS_TO, 'sUser', 'updated_by'),
            'targetSetting' => array(self::HAS_MANY, 'gTalentTargetSetting', 'parent_id'),
            'targetSettingC' => array(self::STAT, 'gTalentTargetSetting', 'parent_id', 'select' => 'sum(superior_score*weight)'),
            'workResultC' => array(self::STAT, 'gTalentWorkResult', 'parent_id', 'select' => 'sum(superior_score*gpc.weight)', 'join' => 'inner join g_param_competency gpc on gpc.id = t.talent_template_id'),
            'coreCompetencyC' => array(self::STAT, 'gTalentCoreCompetency', 'parent_id',
                'select' => 'sum(superior_score * g.weight)',
                'join' => 'INNER JOIN g_param_competency g ON t.talent_template_id = g.id'),
            'leadershipCompetencyC' => array(self::STAT, 'gTalentLeadershipCompetency', 'parent_id',
                'select' => 'sum(superior_score * g.weight)',
                'join' => 'INNER JOIN g_param_competency g ON t.talent_template_id = g.id'),
            'performance' => array(self::HAS_MANY, 'gTalentPerformance', 'parent_id'),
            'many_attendance' => array(self::HAS_MANY, 'gAttendance', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'employee_code' => 'Local ID',
            'employee_code_global' => 'Employee ID',
            'employee_name' => 'Employee Name',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'sex_id' => 'Sex',
            'religion_id' => 'Religion',
            'address1' => 'Address',
            'address2' => 'Address2',
            'address3' => 'Address3',
            'pos_code' => 'Pos Code',
            'identity_number' => 'Identity Number',
            'identity_valid' => 'Valid',
            'identity_address1' => 'Identity Address',
            'identity_address2' => 'Identity Address2',
            'identity_address3' => 'Identity Address3',
            'identity_pos_code' => 'Identity Pos Code',
            'email' => 'Email',
            'email2' => 'Email2',
            'blood_id' => 'Blood',
            'home_phone' => 'Home Phone',
            'handphone' => 'Handphone',
            'handphone2' => 'Handphone2',
            'account_number' => 'Account Number',
            'account_name' => 'Account Name',
            'bank_name' => 'Bank Name',
            'c_pathfoto' => 'Photo',
            'userid' => 'User ID',
            't_status' => 'Status',
            'activation_code' => 'Activation Code',
            'activation_expire' => 'Activation Expire',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function sameDepartment($id) {
        //$dependency = new CDbCacheDependency('SELECT MAX(updated_date) FROM g_person_career');
        //if (!Yii::app()->cache->get('samedepartment'.Yii::app()->user->id)) {

        $criteria = new CDbCriteria;


        $criteria->condition = '(select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select c.department_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                ') ORDER BY c.start_date DESC LIMIT 1) =' . $id;

        $criteria->order = '(select s.level_id from g_person_career s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1)';

        $dependency = new CDbCacheDependency('SELECT MAX(updated_date) FROM g_person_career');

        //$dataProvider= new CActiveDataProvider($this, array(
        $dataProvider = new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 45,
            ),
                //'pagination'=>false,
        ));

        //	Yii::app()->cache->set('samedepartment'.Yii::app()->user->id,$dataProvider,3600,$dependency);
        //} else
        //	$dataProvider=Yii::app()->cache->get('samedepartment'.Yii::app()->user->id);

        return $dataProvider;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function sameLevel($id) {
        $criteria = new CDbCriteria;

        $criteria->with = array('company');
        $criteria->order = 'company.department_id ';
        $criteria->order = 't.updated_date DESC';

        //if (Yii::app()->user->name != "admin") {
        $criteria->addInCondition('company.company_id', sUser::model()->myGroupArray);
        //} else {
        //	$criteria->addInCondition('company.company_id',array(sUser::model()->myGroup));
        //}

        $criteria1 = new CDbCriteria; //JOIN, JOIN CONTINUED, ROTATION
        $criteria1->condition = '(select status_id from g_person_career s where s.parent_id = t.id AND s.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY start_date DESC LIMIT 1) IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ')';

        $criteria2 = new CDbCriteria;
        $criteria2->condition = '(select level_id from g_person_career s where s.parent_id = t.id AND s.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY start_date DESC LIMIT 1) =' . $id;

        $criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
        $criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) . ')';

        $criteria->mergeWith($criteria1);
        $criteria->mergeWith($criteria2);
        $criteria->mergeWith($criteria3);

        $dependency = new CDbCacheDependency('SELECT MAX(updated_date) FROM g_person_career');

        return new CActiveDataProvider($this, array(
            //return new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
                //'pagination'=>false,
        ));
    }

    public static function subOrdinate() {
        $returnarray = array();
        $sql = "
			select 			
				`a`.`id` AS `id`,
				`a`.`employee_name` AS `employee_name`,
				(
				(select count(*) from g_leave l where l.parent_id = a.id AND l.superior_approved_id = 1) +
				(select count(*) from g_permission p where p.parent_id = a.id AND p.superior_approved_id = 1) + 
				(select count(*) from g_attendance t where t.parent_id = a.id AND t.superior_approved_id = 1)
				)
				 as request 
			from
				`erp_apl`.`g_person` `a` 
			where
				(select 
						`c`.`superior_id` AS `superior_id`
					from
						`erp_apl`.`g_person_career` `c`
					where
						`a`.`id` = `c`.`parent_id`
							and `c`.`status_id` in (1 , 2, 3, 4, 5, 6, 15)
					order by `c`.`start_date` desc
					limit 1) = " . sUser::model()->currentPersonId() . " 
            and

            (select 
                `s`.`status_id` AS `status`
            from
                `erp_apl`.`g_person_status` `s`
            where
                `s`.`parent_id` = `a`.`id`
            order by `s`.`start_date` desc
            limit 1) NOT IN (" . implode(',', Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) . ")


			UNION ALL
			select 			
				`aa`.`id` AS `id`,
				`aa`.`employee_name` AS `employee_name`, 
				(
				(select count(*) from g_leave l where l.parent_id = aa.id AND l.superior_approved_id = 1) +
				(select count(*) from g_permission p where p.parent_id = aa.id AND p.superior_approved_id = 1) + 
				(select count(*) from g_attendance t where t.parent_id = aa.id AND t.superior_approved_id = 1)
				)
				 as request 
			from
				`erp_apl`.`g_person` `aa` 
			where
				(select 
						`c`.`superior_id` AS `superior_id`
					from
						`erp_apl`.`g_person_career` `c`
					where
						`aa`.`id` = `c`.`parent_id`
							and `c`.`status_id` in (1 , 2, 3, 4, 5, 6, 15)
					order by `c`.`start_date` desc
					limit 1) IN ( 

			select 			
				`a`.`id` AS `id`
			from
				`erp_apl`.`g_person` `a` 
			where
				(select 
						`c`.`superior_id` AS `superior_id`
					from
						`erp_apl`.`g_person_career` `c`
					where
						`a`.`id` = `c`.`parent_id`
							and `c`.`status_id` in (1 , 2, 3, 4, 5, 6, 15)
					order by `c`.`start_date` desc
					limit 1) = " . sUser::model()->currentPersonId() . " 
				
			) AND 

            (select 
                `s`.`status_id` AS `status`
            from
                `erp_apl`.`g_person_status` `s`
            where
                `s`.`parent_id` = `aa`.`id`
            order by `s`.`start_date` desc
            limit 1) NOT IN (" . implode(',', Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) . ")


		";

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array(
            'pagination' => false,
        ));



        foreach ($dataProvider->getData() as $model) {
            $val = $model['request'] != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), $model['request']) : "";
            $_nama = (strlen($model['employee_name']) > 28) ? substr($model['employee_name'], 0, 28) . "... "
                    . $val :
                    $model['employee_name'] . " " . $val;
            $returnarray[] = array('id' => $model['id'], 'label' => $_nama, 'icon' => 'list-alt', 'url' => array('/m1/gEss/subordinate', 'id' => $model['id'],));
        }

        return $returnarray;
    }

    public static function subOrdinateById($id) {
        $returnarray = array();
        $sql = "
			select 			
				`a`.`id` AS `id`,
				`a`.`employee_name` AS `employee_name`,
				(
				(select count(*) from g_leave l where l.parent_id = a.id AND l.superior_approved_id = 1) +
				(select count(*) from g_permission p where p.parent_id = a.id AND p.superior_approved_id = 1) + 
				(select count(*) from g_attendance t where t.parent_id = a.id AND t.superior_approved_id = 1)
				)
				 as request 
			from
				`erp_apl`.`g_person` `a` 
			where
				(select 
						`c`.`superior_id` AS `superior_id`
					from
						`erp_apl`.`g_person_career` `c`
					where
						`a`.`id` = `c`.`parent_id`
							and `c`.`status_id` in (1 , 2, 3, 4, 5, 6, 15)
					order by `c`.`start_date` desc
					limit 1) = " . $id . " 
			order by 
				(select 
						`p`.`updated_date` AS `updated_date`
					from
						`erp_apl`.`g_permission` `p`
					where
						`a`.`id` = `p`.`parent_id`
					order by `p`.`updated_date` desc
					limit 1)					
			LIMIT 100
		";

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array(
            'pagination' => false,
        ));



        foreach ($dataProvider->getData() as $model) {
            $val = $model['request'] != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), $model['request']) : "";
            $_nama = (strlen($model['employee_name']) > 28) ? substr($model['employee_name'], 0, 28) . "... "
                    . $val :
                    $model['employee_name'] . " " . $val;
            $returnarray[] = array('id' => $model['id'], 'label' => $_nama, 'icon' => 'list-alt', 'url' => array('/m1/gEss/subordinate', 'id' => $model['id'],));
        }

        return $returnarray;
    }

    public static function getTopCreated() {

        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->order = "created_date DESC";
        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->employee_name) > 28) ? substr($model->employee_name, 0, 28) . "..." : $model->employee_name;
            $returnarray[] = array(
                'id' => $model->id,
                'description' => $model->employeeShortId . " | " . $model->mDepartment(),
                'label' => $_nama,
                'photo' => $model->photoPath,
                'url' => array('view', 'id' => $model->id,
            ));
        }

        return $returnarray;
    }

    public static function getTopUpdated() {

        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->order = "t.updated_date DESC";
        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->employee_name) > 28) ? substr($model->employee_name, 0, 28) . "..." : $model->employee_name;
            $returnarray[] = array(
                'id' => $model->id,
                'description' => $model->employeeShortId . " | " . $model->mDepartment(),
                'label' => $_nama,
                'photo' => $model->photoPath,
                'url' => array('view', 'id' => $model->id,
            ));
        }

        return $returnarray;
    }

    public static function getTopUpdatedCareer() {

        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->order = "many_career.updated_date DESC";
        $criteria->together = true;
        $criteria->with = array('many_career');

        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->employee_name) > 28) ? substr($model->employee_name, 0, 28) . "..." : $model->employee_name;
            $returnarray[] = array(
                'id' => $model->id,
                'description' => $model->employeeShortId . " | " . $model->mDepartment(),
                'label' => $_nama,
                'photo' => $model->photoPath,
                'url' => array('view', 'id' => $model->id,
            ));
        }

        return $returnarray;
    }

    public static function getTopRelated($name) {

        $_exp = explode(" ", $name);


        $criteria = new CDbCriteria;
        //$criteria->compare('account_name',$_related,true,'OR');

        if (isset($_exp[0]))
            $criteria->compare('employee_name', $_exp[0], true, 'OR');

        if (isset($_exp[1]))
            $criteria->compare('employee_name', $_exp[1], true, 'OR');

        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }

        $criteria->limit = 10;
        $criteria->order = 't.updated_date DESC';

        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->employee_name) > 28) ? substr($model->employee_name, 0, 28) . "..." : $model->employee_name;
            $returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon' => 'list-alt', 'url' => array('view', 'id' => $model->id,));
        }

        return $returnarray;
    }

    public static function getTopOther() {

        $criteria = new CDbCriteria;
        $criteria->limit = 20;
        $criteria->condition = "birth_date is null";  //uncomplete data
        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $_nama = (strlen($model->employee_name) > 28) ? substr($model->employee_name, 0, 28) . "..." : $model->employee_name;
            $returnarray[] = array('id' => $model->id, 'label' => $_nama, 'icon' => 'list-alt', 'url' => array('view', 'id' => $model->id,));
        }

        return $returnarray;
    }

    public function countJoinDate() {
        if (isset($this->companyfirst) && !in_array((int) $this->mStatusId(), Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) {
            $diff = abs(strtotime($this->companyfirst->start_date) - time());
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            if ($years == 0 && $months == 0)
                return $days . " days";
            elseif (!$years != 0)
                return $months . " months, " . $days . " days";
            else
                return $years . " years, " . $months . " months, " . $days . " days";
        } else
            return null;
    }

    public function countJoinDateG() {
        if (isset($this->companyfirstG) && !in_array((int) $this->mStatusId(), Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) {
            $diff = abs(strtotime($this->companyfirstG->start_date) - time());
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            if ($years == 0 && $months == 0)
                return $days . " days";
            elseif (!$years != 0)
                return $months . " months, " . $days . " days";
            else
                return $years . " years, " . $months . " months, " . $days . " days";
        } else
            return null;
    }

    public function countJoinDateB() {
        if (isset($this->company) && !in_array((int) $this->mStatusId(), Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) {
            $diff = abs(strtotime($this->companycurrent->start_date) - time());
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

            if ($years == 0 && $months == 0)
                return $days . " days";
            elseif (!$years != 0)
                return $months . " months, " . $days . " days";
            else
                return $years . " years, " . $months . " months, " . $days . " days";
        } else
            return null;
    }

    public function countContract() {
        if (isset($this->companyfirst) && !in_array((int) $this->mStatusId(), Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) && $this->mStatusId() != 6) {
            if (isset($this->status->end_date)) {
                $diff = abs(strtotime($this->mStatusEndDate()) - time());
                $years = floor($diff / (365 * 60 * 60 * 24));
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                if (strtotime($this->mStatusEndDate()) > time()) {
                    if ($years == 0 && $months == 0)
                        return $days . " days left";
                    elseif (!$years != 0)
                        return $months . " months, " . $days . " days left";
                    else
                        return $years . " years, " . $months . " months, " . $days . " days left";
                } else {
                    if ($years == 0 && $months == 0)
                        return $days . " days expired";
                    elseif (!$years != 0)
                        return $months . " months, " . $days . " days expired";
                    else
                        return $years . " years, " . $months . " months, " . $days . " days expired";
                }
            }
        } else
            return null;
    }

    public function countBirthdate() {
        $diff = abs(strtotime(date('y') . '-' . date('m', strtotime($this->birth_date)) . '-' . date('d', strtotime($this->birth_date))) - time());
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        if ($days == 0) {
            $_value = "Today";
        } elseif ($days == 1) {
            $_value = "Tomorrow";
        } else
            $_value = $days . " Days to go";

        return $_value;
    }

    public function countAge() { //round up and round down
        $diff = abs(strtotime($this->birth_date) - time());
        $years = round($diff / (365 * 60 * 60 * 24));

        return $years . " years old";
    }

    public function countAgeRoundDown() { //round down, exact_age
        $diff = abs(strtotime($this->birth_date) - time());
        $years = floor($diff / (365 * 60 * 60 * 24));

        return $years;
    }

    public function getBirthday() {
        $criteria = new CDbCriteria;
        $criteria->condition = "date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))  
			BETWEEN curdate() AND DATE_ADD(curdate(),INTERVAL 7 DAY)";
        $criteria->order = "date(CONCAT(year(now()),'-',month(birth_date),'-',day(birth_date)))";

        $criteria1 = new CDbCriteria;
        $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (1,2,3,4,5,6,15) ORDER BY c.start_date DESC LIMIT 1) = 1100';
        $criteria->mergeWith($criteria1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

    public function getPhotoExist() {
        if ($this->c_pathfoto != null) {
            if (is_file(Yii::app()->basePath . "/../shareimages/hr/employee/" . $this->c_pathfoto))
                return true;
            else
                return false;
        }
        return false;
    }

    public function getPhotoExistThumb() {
        if ($this->c_pathfoto != null) {
            if (is_file(Yii::app()->basePath . "/../shareimages/hr/employee/thumb/" . $this->c_pathfoto))
                return true;
            else
                return false;
        }
        return false;
    }

    public function getPhotoPath() {
        if ($this->c_pathfoto != null && $this->PhotoExist) {
            if ($this->PhotoExistThumb) {
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/thumb/" . $this->c_pathfoto, CHtml::encode($this->employee_name), array("width" => "100%", 'id' => 'photo'));
            } else
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" . $this->c_pathfoto, CHtml::encode($this->employee_name), array("width" => "100%", 'id' => 'photo'));
        } else {
            if ($this->sex_id == 1) {
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophoto.jpg", CHtml::encode($this->employee_name), array("width" => "100%", 'id' => 'photo'));
            } else
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophotoW.jpg", CHtml::encode($this->employee_name), array("width" => "100%", 'id' => 'photo'));
        }
        return $path;
    }

    public function getPhotoPathReal() {
        if ($this->c_pathfoto != null && $this->PhotoExist) {
            if ($this->PhotoExistThumb) {
                $path = Yii::app()->basePath . "/../shareimages/hr/employee/thumb/" . $this->c_pathfoto;
            } else
                $path = Yii::app()->basePath . "/../shareimages/hr/employee/" . $this->c_pathfoto;
        } else {
            if ($this->sex_id == 1) {
                $path = Yii::app()->basePath . "/../shareimages/nophoto.jpg";
            } else
                $path = Yii::app()->basePath . "/../shareimages/nophotoW.jpg";
        }
        return $path;
    }

    public function getGPersonLink() {
        return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gPerson/view', array(
                            'id' => $this->id,
                                //'en'=>$this->employee_name,
        )));
    }

    public function getGPersonPhoto() {
        return CHtml::link($this->photoPath, Yii::app()->createUrl('/m1/gPerson/view', array(
                            'id' => $this->id,
                                //'en'=>$this->employee_name,
        )));
    }

    public function getGAttendanceLink() {
        return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gAttendance/view', array(
                            'id' => $this->id,
                                //'en'=>$this->employee_name,
        )));
    }

    public function getGTalentLink() {
        return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gTalent/view', array(
                            'id' => $this->id,
                                //'en'=>$this->employee_name,
        )));
    }

    public function getGTrainingLink() {
        return CHtml::link($this->employee_name, Yii::app()->createUrl('/m1/gTraining/view', array(
                            'id' => $this->id,
                                //'en'=>$this->employee_name,
        )));
    }

    public function companyly($limit = 5) {
        $this->getDbCriteria()->mergeWith(array(
            'limit' => $limit,
        ));
        return $this;
    }

    public function mCompanyId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value != null) {
            return $_value->company->id;
        } else
            return '.::INCOMPLETE::.';
    }

    public function mCompany() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value != null) {
            return $_value->company->name;
        } else
            return '.::INCOMPLETE::.';
    }

    public function mSuperiorLink() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if (isset($_value->superior) && $_value->superior_id != null) {
            return CHtml::link($_value->superior->employee_name, Yii::app()->createUrl('m1/gPerson/view', array('id' => $_value->superior_id)));
        } else
            return null;
    }

    public function mSuperior() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value->superior_id != null && $_value->superior->employee_name != null) {
            return $_value->superior->employee_name;
        } else
            return null;
    }

    public function mDoubleSuperior() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value->superior_id != null && $_value->superior->employee_name != null) {
            $criteria1 = new CDbCriteria;
            $criteria1->compare('parent_id', $_value->superior_id);
            $criteria1->order = 'start_date DESC';
            $criteria1->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
            $_value1 = gPersonCareer::model()->find($criteria1);

            if ($_value1->superior_id != null && $_value1->superior->employee_name != null)
                return $_value1->superior->employee_name;
        } else
            return null;
    }

    public function mSuperiorId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value->superior_id != null && $_value->superior->employee_name != null) {
            return $_value->superior_id;
        } else
            return null;
    }

    public function mSuperiorUserId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value->superior_id != null && $_value->superior->employee_name != null) {
            return $_value->superior->userid;
        } else
            return null;
    }

    public function mDoubleSuperiorId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value->superior_id != null && $_value->superior->employee_name != null) {
            $criteria1 = new CDbCriteria;
            $criteria1->compare('parent_id', $_value->superior_id);
            $criteria1->order = 'start_date DESC';
            $criteria1->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
            $_value1 = gPersonCareer::model()->find($criteria1);

            if ($_value1->superior_id != null && $_value1->superior->employee_name != null)
                return $_value1->superior_id;
        } else
            return null;
    }

    public function mDoubleSuperiorUserId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value->superior_id != null && $_value->superior->employee_name != null) {
            $criteria1 = new CDbCriteria;
            $criteria1->compare('parent_id', $_value->superior_id);
            $criteria1->order = 'start_date DESC';
            $criteria1->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
            $_value1 = gPersonCareer::model()->find($criteria1);

            if ($_value1->superior_id != null && $_value1->superior->employee_name != null)
                return $_value1->superior->userid;
        } else
            return null;
    }

    public function mJobTitle() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->job_title;
    }

    public function mLevel() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->level->name;
    }

    public function mLevelId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->level_id;
    }

    public function mGolonganId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition("status_id", Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->level->golongan;
    }

    public function mDepartment() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition('status_id', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value != null) {
            return $_value->department->name;
        } else
            return '.::INCOMPLETE::.';
    }

    public function mDepartmentId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition('status_id', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->department_id;
    }

    public function mCareerDate() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition('status_id', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->start_date;
    }

    public function mJoinTypeId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->addInCondition('status_id', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY);
        $criteria->order = 'start_date DESC';
        $_value = gPersonCareer::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->status_id;
    }

    public function mStatus() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $_value = gPersonStatus::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->status->name;
    }

    public function mStatusId() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $_value = gPersonStatus::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->status_id;
    }

    public function mStatusEndDate() {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $this->id);
        $criteria->order = 'start_date DESC';
        $_value = gPersonStatus::model()->find($criteria);
        if ($_value == null) {
            return null;
        } else
            return $_value->end_date;
    }

    public function scopes() {
        return array(
                //'noResign'=>array(
                //    'condition'=>'status=1',
                //),
                //'noResign'=>array(
                //  'with'=>array('status'),
                //'limit'=>5,
                //),
        );
    }

    public function maritalStatus() {
        if ($this->has_couple == 0) {
            $_status = "TK";
        } else
            $_status = "K" . $this->count_children;

        return $_status;
    }

    public function getEmployee_name_r() {
        if (in_array($this->mStatusId(), Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY)) {
            return $this->employee_name . " " . CHtml::tag("span", array('style' => 'font-size:inherit', 'class' => 'label label-info'), $this->mStatus());
            //} elseif (!in_array($this->mCompanyId(), sUser::model()->myGroupArray) && $this->many_career2C >= 1) {
            //    return $this->employee_name . " " . CHtml::tag("span", array('style' => 'font-size:inherit', 'class' => 'label label-info'), "Assignment");
        } else
            return $this->employee_name;
    }

    public function getLastID() {
        $connection = Yii::app()->db;
        $sqlRaw = "select employee_code_global from g_person ORDER BY employee_code_global DESC limit 1";
        $last = Yii::app()->db->createCommand($sqlRaw)->queryScalar();

        $number = (int) $last + 1;
        $format = str_pad($number, 6, '0', STR_PAD_LEFT);

        return $format;
    }

    public function afterSave() {
        if ($this->isNewRecord) {
            $model = new sNotification;
            $model->group_id = 1;
            $model->link = 'm1/gPerson/view/id/' . $this->id;
            $model->content = 'Person. New Employee created for <read>' . $this->employee_name . '</read>';
            $model->save();

            self::model()->updateByPk((int) $this->id, array('employee_code_global' => $this->lastID));
        }
        return true;
    }

    public function afterDelete() {
        $model = new sNotification;
        $model->group_id = 1;
        $model->link = 'm1/gPerson/';
        $model->content = 'Person. Employee deleted for ' . $this->employee_name;
        $model->save();

        return true;
    }

    public function employeeRandom() {
        $criteria = new CDbCriteria;

        $criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
        $criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) . ')';

        $criteria->mergeWith($criteria3);

        $dependency = new CDbCacheDependency('SELECT MAX(updated_date) FROM g_person');

        $models = gPerson::model()->findAll($criteria);

        foreach ($models as $model)
            $list[] = $model->id;

        $_gen = array_rand($list, 5);
        $_rand[] = $list[$_gen[0]];
        $_rand[] = $list[$_gen[1]];
        $_rand[] = $list[$_gen[2]];
        $_rand[] = $list[$_gen[3]];
        $_rand[] = $list[$_gen[4]];

        $criteria->addInCondition('t.id', $_rand);

        $dataProvider2 = new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
            //$dataProvider2=new CActiveDataProvider('gPerson', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 5,
            ),
                )
        );


        return $dataProvider2;
    }

    public function getEmployeeID() {
        $companyfirst = isset($this->companyfirst) ? date("Y", strtotime($this->companyfirst->start_date)) : "1900";
        $custom1 = isset($this->company->company) ? $this->company->company->custom1 : "";
        $custom2 = isset($this->company->company) ? $this->company->company->custom2 : "";
        $custom3 = isset($this->company->company) ? $this->company->company->custom3 : "";

        $empid = $companyfirst .
                str_pad($this->employee_code_global, 6, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom1, 3, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom2, 1, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom3, 2, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom1, 3, '0', STR_PAD_LEFT);

        return $empid;
    }

    public function getEmployeeShortID() {
        $companyfirst = isset($this->companyfirst) ? date("Y", strtotime($this->companyfirst->start_date)) : "1900";

        $empid = $companyfirst . str_pad($this->employee_code_global, 6, '0', STR_PAD_LEFT);

        return $empid;
    }

    public function getEmployeeFinanceID() {
        $custom1 = isset($this->company->company) ? $this->company->company->custom1 : "";
        $custom2 = isset($this->company->company) ? $this->company->company->custom2 : "";
        $custom3 = isset($this->company->company) ? $this->company->company->custom3 : "";

        $empid = str_pad($custom1, 3, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom2, 1, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom3, 2, '0', STR_PAD_LEFT) . ' - ' .
                str_pad($custom1, 3, '0', STR_PAD_LEFT);

        return $empid;
    }

    public function getCompletion() {
        $sql = '
			select 
			(if(length(g.birth_place) = 0 or isnull(g.birth_place),0,1) + if(length(g.birth_date) = 0 or isnull(g.birth_date),0,1) + if(length(g.address1) = 0 or isnull(g.address1),0,1) 
			  + if(length(g.identity_number) = 0 or isnull(g.identity_number),0,1) + if(length(g.identity_valid) = 0 or isnull(g.identity_valid),0,1) 
			  + if(length(g.identity_address1) = 0 or isnull(g.identity_address1),0,1) + if(length(g.c_pathfoto) = 0 or isnull(g.c_pathfoto),0,1) + if(length(g.account_number) = 0 or isnull(g.account_number),0,1) 
			  + if(length(g.account_name) = 0 or isnull(g.account_name),0,1) + if(length(g.bank_name) = 0 or isnull(g.bank_name),0,1) + if(length(g.blood_id) = 0 or isnull(g.blood_id),0,1) + if(length(g.email) = 0 or isnull(g.email),0,1) 
			  + if(length(g.handphone) = 0 or isnull(g.handphone),0,1)
			  + if((select count(ed.id) from g_person_education ed where ed.parent_id = g.id) = 0,0,1) 
			  + if((select count(ex.id) from g_person_experience ex where ex.parent_id = g.id) = 0,0,1) 
			  + if((select count(ef.id) from g_person_family ef where ef.parent_id = g.id) = 0,0,1) 
			  + if((select ec.superior_id from g_person_career ec where ec.parent_id = g.id order by ec.start_date DESC LIMIT 1) is Null,0,1) 
			  
			  ) / 17 * 100  as t_total

			from g_person g
                        where g.id =' . $this->id;

        $_percent = Yii::app()->db->createCommand($sql)->queryScalar();

        return $_percent;
    }

    public function getMBasicSalary() {
        if (isset($this->payroll)) {
            return $this->payroll->basic_salary;
        } else
            return null;
    }

    public function getBenefitC() {
        $connection = Yii::app()->db;
        $sql = "SELECT amount FROM `g_payroll_benefit` WHERE 
				yearmonth_start >= 201301 AND yearmonth_end <= 201312 AND 
				parent_id = " . $this->id;

        $command = $connection->createCommand($sql);
        $row = $command->queryScalar();

        if (isset($row)) {
            return $row;
        } else
            return null;
    }

    public function getDeductionC() {
        $connection = Yii::app()->db;
        $sql = "SELECT `amount` FROM `g_payroll_deduction` WHERE 
				`yearmonth_start` >= 201301 AND `yearmonth_end` <= 201312 AND 
				`parent_id` = " . $this->id;

        $command = $connection->createCommand($sql);
        $row = $command->queryScalar();

        if (isset($row)) {
            return $row;
        } else
            return null;
    }

    public function getNewPayroll() {
        $criteria = new CDbCriteria;

        //$criteria1=new CDbCriteria;
        $criteria->with = array('payroll');
        //$criteria1->condition='payroll.id is null';

        $criteria->condition = '((select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                implode(",", sUser::model()->myGroupArray) . ')) AND ' .
                '(select concat(left(a.start_date,4),mid(a.start_date,6,2)) from g_person_career a 
			WHERE t.id=a.parent_id AND status_id IN (1,2) ORDER BY a.start_date DESC LIMIT 1) = ' . date("Ym");


        //$criteria->mergeWith($criteria1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getNewPromotion() {
        $criteria = new CDbCriteria;

        //$criteria1=new CDbCriteria;
        $criteria->with = array('payroll');

        $criteria->condition = '((select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                implode(",", sUser::model()->myGroupArray) . ')) AND ' .
                '(select concat(left(a.start_date,4),mid(a.start_date,6,2)) from g_person_career a 
			WHERE t.id=a.parent_id AND status_id IN (5) ORDER BY a.start_date DESC LIMIT 1) = ' . date("Ym");


        //$criteria->mergeWith($criteria1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getNewPromotionAll($periode) {
        if ($periode == null)
            $periode = date("Ym");

        $criteria = new CDbCriteria;

        //$criteria1=new CDbCriteria;

        $criteria->condition = '(select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select concat(left(a.start_date,4),mid(a.start_date,6,2)) from g_person_career a 
			WHERE t.id=a.parent_id AND status_id IN (5) ORDER BY a.start_date DESC LIMIT 1) = ' . $periode;


        //$criteria->mergeWith($criteria1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false
        ));
    }

    public function getNewMutation() {
        $criteria = new CDbCriteria;

        //$criteria1=new CDbCriteria;
        $criteria->with = array('payroll');

        $criteria->condition = '((select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                implode(",", sUser::model()->myGroupArray) . ')) AND ' .
                '(select concat(left(a.start_date,4),mid(a.start_date,6,2)) from g_person_career a 
			WHERE t.id=a.parent_id AND status_id IN (3,4) ORDER BY a.start_date DESC LIMIT 1) = ' . date("Ym");


        //$criteria->mergeWith($criteria1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getNewMutationAll($periode) {
        if ($periode == null)
            $periode = date("Ym");
        $criteria = new CDbCriteria;
        $criteria->condition = '(select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select concat(left(a.start_date,4),mid(a.start_date,6,2)) from g_person_career a 
			WHERE t.id=a.parent_id AND status_id IN (3,4) ORDER BY a.start_date DESC LIMIT 1) = ' . $periode;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getNewResign() {
        $criteria = new CDbCriteria;

        $criteria->condition = '(select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) IN 
		(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select concat(left(a.start_date,4),mid(a.start_date,6,2)) from g_person_status a 
			WHERE t.id=a.parent_id AND status_id IN (' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ')
			 ORDER BY a.start_date DESC LIMIT 1) = ' . date("Ym") . ' AND ' .
                ' (select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                implode(",", sUser::model()->myGroupArray) . ')';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getUncomplete() {
        $sql = '
			select 1 as id, "Birth Place | Birth Date" as  components,
			count(id) as t_count,
			(sum(x_birth_place) + sum(x_birth_date) ) / 2 as t_total
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . ' 
			UNION ALL
			select 2, "Address | Identity Number | Identity Valid | Identity Address",
			count(id) as t_count,
			(sum(x_address1) 
			  + sum(x_identity_number) + sum(x_identity_valid) 
			  + sum(x_identity_address1)) / 4 as t_total
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . ' 
			UNION ALL
			select 3, "Photo",
			count(id) as t_count,
			sum(x_c_pathfoto) as t_total
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . ' 
			UNION ALL
			select 4, "Account Number | Account Name | Bank Name",
			count(id) as t_count,
			(sum(x_account_number) 
			  + sum(x_account_name) + sum(x_bank_name)) / 3 as t_total
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . ' 
			UNION ALL
			select 5, "Blood | Email | Handphone",
			count(id) as t_count,
			(sum(x_blood_id) + sum(x_email) 
			  + sum(x_handphone)) / 3 as t_total
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . ' 
			UNION ALL
			select 12, "Education",count(id) as Total,sum(x_education)
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . '
			UNION ALL
			select 13, "Family",count(id) as Total,sum(x_family)
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . '
			UNION ALL
			select 14, "Experience",count(id) as Total,sum(x_experience)
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . '
			UNION ALL
			select 15, "Education Non Formal",count(id) as Total,sum(x_education_nf)
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup . '
			UNION ALL
			select 16, "Other Info",count(id) as Total,sum(x_other)
			from g_bi_uncomplete
			where company_id = ' . sUser::model()->myGroup;

        $dependency = new CDbCacheDependency('SELECT MAX(updated_date) FROM g_person');

        //$rawData = Yii::app()->db->cache(3600, $dependency)->createCommand($sql)->queryAll();
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array(
            'id' => 'uncomplete',
            'sort' => array(
                'attributes' => array(
                    'components',
                ),
            ),
            'pagination' => false,
        ));

        return $dataProvider;
    }

    public static function getUncompleteHolding($name) {
        if ($name == "basic") {
            $sql = '
				select company_id, company,
				count(id) as t_count,
				(sum(x_birth_place) + sum(x_birth_date) + sum(x_address1) 
				  + sum(x_identity_number) + sum(x_identity_valid) 
				  + sum(x_identity_address1) + sum(x_c_pathfoto) + sum(x_account_number) 
				  + sum(x_account_name) + sum(x_bank_name) + sum(x_blood_id) + sum(x_email) 
				  + sum(x_handphone)) / 13 as t_total
				from g_bi_uncomplete 
							group by company_id ';
        } elseif ($name == "education") {
            $sql = '
				select company_id, company,
				count(id) as t_count,
				sum(x_education) as t_total
				from g_bi_uncomplete 
							group by company_id ';
        } elseif ($name == "family") {
            $sql = '
				select company_id, company,
				count(id) as t_count,
				sum(x_family) as t_total
				from g_bi_uncomplete 
							group by company_id ';
        } elseif ($name == "experience") {
            $sql = '
				select company_id, company,
				count(id) as t_count,
				sum(x_experience) as t_total
				from g_bi_uncomplete 
							group by company_id ';
        } elseif ($name == "educationnf") {
            $sql = '
				select company_id, company,
				count(id) as t_count,
				sum(x_education_nf) as t_total
				from g_bi_uncomplete 
							group by company_id ';
        } elseif ($name == "other") {
            $sql = '
				select company_id, company,
				count(id) as t_count,
				sum(x_other) as t_total
				from g_bi_uncomplete 
							group by company_id ';
        }

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        foreach ($rawData as $row) {
            $_item[] = (int) ($row['t_total'] / $row['t_count'] * 100);
        }
        return $_item;
    }

    public static function getUncompleteHoldingCompany() {
        $sql = '
			select company_id, company_code, company,
			count(id) as t_count,
			(sum(x_birth_place) + sum(x_birth_date) + sum(x_address1) 
			  + sum(x_identity_number) + sum(x_identity_valid) 
			  + sum(x_identity_address1) + sum(x_c_pathfoto) + sum(x_account_number) 
			  + sum(x_account_name) + sum(x_bank_name) + sum(x_blood_id) + sum(x_email) 
			  + sum(x_handphone)) / 13 as t_total

			from g_bi_uncomplete 
                        group by company_id ';

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        foreach ($rawData as $row) {
            $_item[] = $row['company_code'];
        }
        return $_item;
    }

    public function uncompleteList() {

        $criteria = new CDbCriteria;

        //Tahap 1
        $criteria->condition = 'birth_place is null or birth_date is null or address1 is null
		or identity_number is null or identity_valid is null or identity_address1 is null';

        //Tahap 2
        //$criteria->condition='birth_place is null or birth_date is null or address1 is null
        //or identity_number is null or identity_valid is null or identity_address1 is null or
        //handphone is null or c_pathfoto is null or account_number is null or bank_name is null or
        //account_name is null';
        //if (Yii::app()->user->name != "admin") {
        $criteria1 = new CDbCriteria;
        $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
        $criteria->mergeWith($criteria1);
        //}
        $criteria3 = new CDbCriteria;  //8=RESIGN, 9=TERMINATION, 10=End Of Contract
        $criteria3->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) NOT IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_RESIGN_ARRAY) . ')';
        $criteria->mergeWith($criteria3);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array(
                'defaultOrder' => 'employee_name'
            )
        ));
    }

    public function employeeMutationRequest() {
        $criteria = new CDbCriteria;

        $criteria2 = new CDbCriteria;
        $criteria2->condition = '
	        (select `s`.`status_id` AS `status_id` from `erp_apl`.`g_person_status` `s`
            	where `s`.`parent_id` = `t`.`id` order by `s`.`start_date` desc limit 1) = 14
				
				';
        $criteria->mergeWith($criteria2);

        $criteria->order = 'updated_date DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

    public function attendanceStat() {

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
						WHERE id = " . $this->id . "
	
						UNION ALL 
						
                    	SELECT a.id, a.employee_name, '" . peterFunc::cBeginDateBefore(date('Y') . date('m')) . "' as period, -1 as cmonth,
							(select count(id) from g_attendance 
							where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . ") as xcount, 

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(subtime(g.`out`,'01:00:00'), g.`in`)))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89))
								as workhour,

							(select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2) 
							as cuti,

							((select count(id) from g_attendance 
							where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " 
								and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' 
								and realpattern_id NOT IN (90,89)  and `out` is null and `in` is null) 
								-
							(ifnull((select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2),0)) 
							-
							(ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0))
								) 
							-
							(ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0)) 

								  as alpha,

							(select count(g.id) from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
								as lateIn,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(g.`in`, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')))))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
								as lateInCount,

							(select count(g.id) from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
								as earlyOut,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00')), g.out)))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
								as earlyOutCount,

							(select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is not null and `in` is null) 
							as tad,
							(select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is null and `in` is not null) 
							as tap,

							(select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
							as sakit,
							
							(select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
							as special

						FROM g_person a
						WHERE id = " . $this->id . "

						UNION ALL 
						
                    	SELECT a.id, a.employee_name, '" . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . "' as period, -2 as cmonth,
							(select count(id) from g_attendance 
							where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . ") as xcount, 

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(subtime(g.`out`,'01:00:00'), g.`in`)))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89))
								as workhour,

							(select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2) 
							as cuti,

							((select count(id) from g_attendance 
							where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " 
								and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' 
								and realpattern_id NOT IN (90,89)  and `out` is null and `in` is null) 
								-
							(ifnull((select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2),0)) 
							-
							(ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0))
								) 
							-
							(ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0)) 

								  as alpha,

							(select count(g.id) from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
								as lateIn,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(g.`in`, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')))))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
								as lateInCount,

							(select count(g.id) from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
								as earlyOut,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00')), g.out)))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
								as earlyOutCount,

							(select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is not null and `in` is null) 
							as tad,
							(select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is null and `in` is not null) 
							as tap,

							(select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
							as sakit,
							
							(select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . peterFunc::cBeginDateBefore(peterFunc::cBeginDateBefore(date('Y') . date('m'))) . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
							as special

						FROM g_person a
						WHERE id = " . $this->id;

        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dataProvider = new CArrayDataProvider($rawData, array(
            'id' => 'stat',
            'pagination' => false,
        ));

        return $dataProvider;
    }

    public function getCountAttendance($period) {
        $criteria = new CDbCriteria;
        $criteria->with = array('many_attendance');
        $criteria->condition = "CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . peterFunc::cBeginDateBefore(date('Y') . date('m')) . " and parent_id = " . $this->id;

        $count = self::model()->count($criteria);

        return $count;
    }

    public function getReminder() {
        $message = $this->mStatus() . ". " . strtoupper($this->employee_name) . " " . $this->mStatus() . " status is " . $this->countContract();
        return $message;
    }

    public function getReminder2() {
        $message = "Newly Employee. " . strtoupper($this->employee_name) . " " . $this->mStatus() . " status is " . $this->countJoinDate();
        return $message;
    }

    public function getIsValidEmail() {
        $value = "";
        if (in_array($this->email, require(dirname(__FILE__) . '/../../../config/blacklistEmail.php')))
            $value = CHtml::tag("span", array('class' => 'badge badge-error'), "Invalid / Inactive / Bouncing Email");
        return $value;
    }

    function getCloakEmail() {
        $at = str_replace('@', ' at ', $this->email);
        //$dot = str_replace('.',' dot ',$at);

        return $at;
    }

}
