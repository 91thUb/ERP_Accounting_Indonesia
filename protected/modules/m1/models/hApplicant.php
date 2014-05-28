<?php

/**
 * This is the model class for table "h_applicant".
 *
 * The followings are the available columns in table 'h_applicant':
 * @property integer $id
 * @property string $applicant_name
 * @property string $idcard
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $religion_id
 * @property integer $sex_id
 * @property integer $employee_maritalstat
 * @property integer $employee_nationality
 * @property string $employee_bloodtype
 * @property string $employee_ras
 * @property integer $employee_hometype
 * @property string $employee_address
 * @property string $employee_kec
 * @property string $employee_city
 * @property string $employee_postcode
 * @property integer $employee_country
 * @property string $employee_phone
 * @property string $employee_hp1
 * @property string $employee_hp2
 * @property integer $e_industryid
 * @property integer $e_plevelid
 * @property integer $work_exp_start
 * @property integer $highest_edulevel
 * @property string $mainimagename
 */
class hApplicant extends BaseModel {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GRecruitment1 the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'h_applicant';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('applicant_name, birth_place, birth_date, email', 'required'),
            array('birth_date', 'date', 'format' => 'dd-MM-yyyy'),
            array('company_id, sex_id, religion_id, userid, t_status, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly' => true),
            array('applicant_code, address3, identity_address3, blood_id', 'length', 'max' => 10),
            array('applicant_name', 'length', 'max' => 100),
            array('email, email2', 'email'),
            array('email', 'unique', 'className' => 'sUserRegistration', 'on' => 'create'),
            array('email', 'unique', 'on' => 'update'),
            array('birth_place', 'length', 'max' => 20),
            array('address1, identity_address1, c_pathfoto', 'length', 'max' => 255),
            array('c_pathfoto', 'unique'),
            array('address2, identity_address2, home_phone, handphone, handphone2, account_number, account_name, bank_name', 'length', 'max' => 50),
            array('pos_code, identity_pos_code', 'length', 'max' => 5),
            array('identity_number', 'length', 'max' => 25),
            array('birth_date, identity_valid', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, applicant_code, applicant_name, birth_place, birth_date, sex_id, religion_id, address1, address2, address3, pos_code, identity_number, identity_valid, identity_address1, identity_address2, identity_address3, identity_pos_code, email, email2, blood_id, home_phone, handphone, handphone2, c_pathfoto, userid, t_status, created_date, created_by, updated_date, updated_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'religion' => array(self::BELONGS_TO, 'sParameter', array('religion_id' => 'code'), 'condition' => 'type = \'cAgama\''),
            'sex' => array(self::BELONGS_TO, 'sParameter', array('sex_id' => 'code'), 'condition' => 'type = \'cKelamin\''),
            'many_experience' => array(self::HAS_MANY, 'hApplicantExperience', 'parent_id', 'order' => 'many_experience.start_date DESC'),
            'many_experienceC' => array(self::STAT, 'hApplicantExperience', 'parent_id'),
            'many_education' => array(self::HAS_MANY, 'hApplicantEducation', 'parent_id', 'order' => 'many_education.level_id DESC'),
            'many_educationC' => array(self::STAT, 'hApplicantEducation', 'parent_id'),
            'many_educationnf' => array(self::HAS_MANY, 'hApplicantEducationNf', 'parent_id'),
            'many_family' => array(self::HAS_MANY, 'hApplicantFamily', 'parent_id', 'order' => 'many_family.relation_id'),
            'many_familyC' => array(self::STAT, 'hApplicantFamily', 'parent_id'),
            'has_couple' => array(self::STAT, 'hApplicantFamily', 'parent_id', 'condition' => 'relation_id = 1 OR relation_id = 2'),
            'count_children' => array(self::STAT, 'hApplicantFamily', 'parent_id', 'condition' => 'relation_id = 3'),
            'vacancy' => array(self::HAS_MANY, 'hVacancyApplicant', 'applicant_id'),
            'vacancyC' => array(self::STAT, 'hVacancyApplicant', 'applicant_id'),
            'vacancyLocked' => array(self::STAT, 'hVacancyApplicant', 'applicant_id', 'condition' => 'status_id = 4'),
            'vacancyMany' => array(self::MANY_MANY, 'hVacancy', 'h_vacancy_applicant(applicant_id,vacancy_id)'),
            'registration' => array(self::HAS_ONE, 'sUserRegistration', 'id'),
            'jobalert' => array(self::HAS_MANY, 'hApplicantJobalert', 'parent_id', 'condition' => 'jobalert.status_id = 1'),
            'comment' => array(self::HAS_MANY, 'hApplicantComment', 'parent_id'),
            'commentC' => array(self::STAT, 'hApplicantComment', 'parent_id'),
            'selection' => array(self::HAS_ONE, 'hApplicantSelection', 'parent_id', 'order' => 'assessment_date DESC'),
            'selection_many' => array(self::HAS_MANY, 'hApplicantSelection', 'parent_id', 'order' => 'assessment_date DESC'),
            'selectionC' => array(self::STAT, 'hApplicantSelection', 'parent_id'),
            'schedule' => array(self::HAS_ONE, 'jSelectionPart', 'applicant_id', 'order' => 'created_date DESC'),
            'schedule_many' => array(self::HAS_MANY, 'jSelectionPart', 'applicant_id', 'order' => 'created_date DESC'),
            'scheduleC' => array(self::STAT, 'jSelectionPart', 'parent_id'),
            'company' => array(self::BELONGS_TO, 'aOrganization', 'company_id'),
            'systemrating' => array(self::HAS_ONE, 'hApplicantRating', 'parent_id', 'condition' => 'user_id = 1'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'company_id' => 'Company ID',
            'applicant_code' => 'Applicant Code',
            'applicant_name' => 'Applicant Name',
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
            'identity_address1' => 'Address',
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
            'c_pathfoto' => 'C Pathfoto',
            'userid' => 'Userid',
            'freshgrad_id' => 'Fresh Grad',
            't_status' => 'T Status',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        );
    }

    public function getPhotoExist() {
        if ($this->c_pathfoto != null) {
            if (is_file(Yii::app()->basePath . "/../shareimages/hr/applicant/" . $this->c_pathfoto))
                return true;
            else
                return false;
        }
        return false;
    }

    public function getPhotoExistThumb() {
        if ($this->c_pathfoto != null) {
            if (is_file(Yii::app()->basePath . "/../shareimages/hr/applicant/thumb/" . $this->c_pathfoto))
                return true;
            else
                return false;
        }
        return false;
    }

    public function getPhotoPath() {
        if ($this->c_pathfoto != null && $this->PhotoExist) {
            if ($this->PhotoExistThumb) {
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/applicant/thumb/" . $this->c_pathfoto, CHtml::encode($this->applicant_name), array("width" => "100%", 'id' => 'photo'));
            } else
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/applicant/" . $this->c_pathfoto, CHtml::encode($this->applicant_name), array("width" => "100%", 'id' => 'photo'));
        } else {
            if ($this->sex_id == 1) {
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophoto.jpg", CHtml::encode($this->applicant_name), array("width" => "100%", 'id' => 'photo'));
            } else
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophotoW.jpg", CHtml::encode($this->applicant_name), array("width" => "100%", 'id' => 'photo'));
        }
        return $path;
    }

    public function getPhotoPathReal() {
        if ($this->c_pathfoto != null && $this->PhotoExist) {
            if ($this->PhotoExistThumb) {
                $path = Yii::app()->basePath . "/../shareimages/hr/applicant/thumb/" . $this->c_pathfoto;
            } else
                $path = Yii::app()->basePath . "/../shareimages/hr/applicant/" . $this->c_pathfoto;
        } else {
            if ($this->sex_id == 1) {
                $path = Yii::app()->basePath . "/../shareimages/nophoto.jpg";
            } else
                $path = Yii::app()->basePath . "/../shareimages/nophotoW.jpg";
        }
        return $path;
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('applicant_name', $this->applicant_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getHasExperience() {

        $model = self::model()->with('many_experience')->count('t.id = ' . Yii::app()->user->id);

        if ($model <= 1) {
            return false;
        } else
            return true;
    }

    public function maritalStatus() {
        if ($this->has_couple == 0) {
            $_status = "TK";
        } else
            $_status = "K" . $this->count_children;

        return $_status;
    }

    public static function getTopRecentApplicant() {

        $criteria = new CDbCriteria;
        $criteria->limit = 20;
        $criteria->together = true;
        $criteria->order = "vacancy.created_date DESC";
        //$criteria->compare('t.t_status!',4);
        $criteria->with = array('vacancy');

        //if (Yii::app()->user->name != "admin") {
        //	$criteria2 = new CDbCriteria;
        //	$criteria2->condition='t.company_id IN ('.implode(",",sUser::model()->myGroupArray).')' ;
        //	$criteria->mergeWith($criteria2);
        //}


        $models = self::model()->with('vacancy')->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            //$_title= (strlen($model->applicantM->applicant_name) >32) ? substr($model->applicantM->applicant_name,0,32)."..." : $model->applicantM->applicant_name ." ";
            $returnarray[] = array('id' => $model->id, 'label' => $model->applicant_name, 'icon' => 'list-alt', 'url' => array('/m1/hApplicant/view', 'id' => $model->id));
        }

        return $returnarray;
    }

    public function getFreshgrad() {
        if ($this->freshgrad_id == 0) {
            return "No";
        } else
            return "Yes";
    }

    public function employeeTransferRequest() {
        $criteria = new CDbCriteria;

        $criteria->with = array('selection');
        $criteria->compare('selection.workflow_id', 19);
        $criteria->compare('selection.workflow_result_id', 3);
        $criteria->order = 'selection.assessment_date DESC';

        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->compare('company_id', sUser::model()->myGroup, false, 'OR');
            $criteria1->compare('company_id', 0, false, 'OR');
            $criteria->mergeWith($criteria1);
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

    public static function getLoadModel($id) {
        $model = self::model()->findByPk((int) $id);

        if ($model != null) {
            return $model;
        } else
            return false;
    }

}
