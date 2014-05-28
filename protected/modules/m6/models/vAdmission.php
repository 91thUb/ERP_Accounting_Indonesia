<?php

/**
 * This is the model class for table "v_admission".
 *
 * The followings are the available columns in table 'v_admission':
 * @property integer $id
 * @property string $student_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $gender_id
 * @property string $address1
 * @property string $home_phone
 * @property string $handphone
 * @property string $email
 * @property integer $faculty_id
 * @property integer $major_id
 * @property string $remark
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 */
class vAdmission extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_admission';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('student_name, birth_place, birth_date, handphone, email', 'required'),
            array('gender_id, faculty_id, major_id, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly' => true),
            array('student_name', 'length', 'max' => 75),
            array('photo,high_school', 'length', 'max' => 100),
            array('birth_place, home_phone, handphone, email', 'length', 'max' => 45),
            array('address1, remark', 'length', 'max' => 300),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, student_name, birth_place, birth_date, gender_id, address1, home_phone, handphone, email, faculty_id, major_id, remark, created_date, created_by, updated_date, updated_by', 'safe', 'on' => 'search'),
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
            'student_name' => 'Student Name',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'gender_id' => 'Gender',
            'address1' => 'Address1',
            'home_phone' => 'Home Phone',
            'handphone' => 'Handphone',
            'email' => 'Email',
            'faculty_id' => 'Faculty',
            'major_id' => 'Major',
            'high_school' => 'High School',
            'photo' => 'Photo',
            'remark' => 'Remark',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('student_name', $this->student_name, true);
        $criteria->compare('birth_place', $this->birth_place, true);
        $criteria->compare('birth_date', $this->birth_date, true);
        $criteria->compare('gender_id', $this->gender_id);
        $criteria->compare('address1', $this->address1, true);
        $criteria->compare('home_phone', $this->home_phone, true);
        $criteria->compare('handphone', $this->handphone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('faculty_id', $this->faculty_id);
        $criteria->compare('major_id', $this->major_id);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('created_date', $this->created_date);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('updated_date', $this->updated_date);
        $criteria->compare('updated_by', $this->updated_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return vAdmission the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPhotoExist() {
        if ($this->photo != null) {
            if (is_file(Yii::app()->basePath . "/../shareimages/hr/employee/" . $this->photo))
                return true;
            else
                return false;
        }
        return false;
    }

    public function getPhotoExistThumb() {
        if ($this->photo != null) {
            if (is_file(Yii::app()->basePath . "/../shareimages/hr/employee/thumb/" . $this->photo))
                return true;
            else
                return false;
        }
        return false;
    }

    public function getPhotoPath() {
        if ($this->photo != null && $this->PhotoExist) {
            if ($this->PhotoExistThumb) {
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/thumb/" . $this->photo, CHtml::encode($this->student_name), array("width" => "100%", 'id' => 'photo'));
            } else
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/" . $this->photo, CHtml::encode($this->student_name), array("width" => "100%", 'id' => 'photo'));
        } else {
            if ($this->gender_id == 1) {
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophoto.jpg", CHtml::encode($this->student_name), array("width" => "100%", 'id' => 'photo'));
            } else
                $path = CHtml::image(Yii::app()->request->baseUrl . "/shareimages/nophotoW.jpg", CHtml::encode($this->student_name), array("width" => "100%", 'id' => 'photo'));
        }
        return $path;
    }

}
