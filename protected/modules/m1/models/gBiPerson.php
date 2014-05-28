<?php

/**
 * This is the model class for table "g_person".
 *
 * The followings are the available columns in table 'g_person':
 * @property integer $id
 * @property string $employee_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $sex_id
 * @property integer $religion_id
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $pos_code
 * @property string $blood_id
 */
class gBiPerson extends BaseModel {

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
        return 'g_bi_person';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'employee_name' => 'Employee Name',
            'employee_code_global' => 'Employee ID',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'age' => 'Age',
            'sex' => 'Gender',
            'religion' => 'Religion',
            'address1' => 'Address',
            'identity_address1' => 'Identity Address',
            //'pos_code' => 'Pos Code',
            'blood_id' => 'Blood',
            'home_phone' => 'Home Phone',
            'company_id' => 'Company ID',
            'company' => 'Company Name',
            'company_type' => 'Company Type',
            'department' => 'Department Name',
            'level' => 'Level',
            'job_title' => 'Job Title',
            'career_status' => 'Career Status',
            'employee_status' => 'Status',
            'employee_status_date' => 'Status Start Date',
            'employee_status_enddate' => 'Status End Date',
            'join_date' => 'Join Date',
            'join_year' => 'LoS Year',
            'join_month' => 'LoS Month',
            'email' => 'email',
            'email2' => 'email2',
            'home_phone' => 'Home Phone',
            'handphone' => 'Hand Phone',
            'handphone2' => 'Hand Phone2',
            'account_number' => 'Account Number',
            'account_name' => 'Account Name',
            'bank_name' => 'Bank Name',
            'education' => 'Education',
            'experience' => 'Experience',
            'family' => 'Family',
            'c_pathfoto' => 'PhotoPath',
            'superior_name' => 'Superior Name',
        );
    }

    public static function getListField($withnull = null) {
        if (isset($withnull))
            $_listField['null'] = null;

        $label = self::model()->attributeLabels();
        foreach (self::model()->tableSchema->columns as $val)
            $_listField[$val->name] = $label[$val->name];

        return $_listField;
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('employee_name', $this->employee_name, true);
        $criteria->compare('employee_code_global', $this->employee_code_global, true);
        $criteria->compare('company', $this->company, true);
        $criteria->compare('company_type', $this->company_type, true);
        $criteria->compare('company_id', $this->company_id, true);
        $criteria->compare('superior_name', $this->superior_name, true);
        $criteria->compare('department', $this->department, true);
        $criteria->compare('level', $this->level, true);
        $criteria->compare('job_title', $this->job_title, true);
        $criteria->compare('career_status', $this->career_status, true);
        $criteria->compare('employee_status', $this->employee_status, true);
        $criteria->compare('employee_status_date', $this->employee_status_date, true);
        $criteria->compare('employee_status_enddate', $this->employee_status_enddate, true);
        $criteria->compare('join_date', $this->join_date, true);
        $criteria->compare('join_year', $this->join_year);
        $criteria->compare('join_month', $this->join_month);
        $criteria->compare('education', $this->education, true);
        $criteria->compare('experience', $this->experience, true);
        $criteria->compare('family', $this->family, true);
        $criteria->compare('c_pathfoto', $this->c_pathfoto, true);
        $criteria->compare('birth_place', $this->birth_place, true);
        $criteria->compare('birth_date', $this->birth_date, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('religion', $this->religion, true);
        $criteria->compare('address1', $this->address1, true);
        $criteria->compare('identity_address1', $this->identity_address1, true);
        $criteria->compare('blood_id', $this->blood_id, true);
        $criteria->compare('account_number', $this->account_number, true);
        $criteria->compare('account_name', $this->account_name, true);
        $criteria->compare('bank_name', $this->bank_name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('email2', $this->email2, true);
        $criteria->compare('home_phone', $this->home_phone, true);
        $criteria->compare('handphone', $this->handphone, true);
        $criteria->compare('handphone2', $this->handphone2, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
