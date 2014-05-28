<?php

/**
 * This is the model class for table "v_admission_form".
 *
 * The followings are the available columns in table 'v_admission_form':
 * @property integer $id
 * @property string $form_number
 * @property string $buyer_name
 * @property string $phone
 * @property string $email
 * @property integer $status_id
 * @property string $remarks
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 */
class vAdmissionForm extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'v_admission_form';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('form_number, buyer_name, phone', 'required'),
            array('status_id, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly' => true),
            array('form_number, buyer_name, phone', 'length', 'max' => 45),
            array('email,high_school', 'length', 'max' => 100),
            array('remarks', 'length', 'max' => 300),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, form_number, buyer_name, phone, email, status_id, remarks, created_date, created_by, updated_date, updated_by', 'safe', 'on' => 'search'),
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
            'form_number' => 'Form Number',
            'buyer_name' => 'Buyer Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'high_school' => 'High School',
            'status_id' => 'Status',
            'remarks' => 'Remarks',
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
        $criteria->compare('form_number', $this->form_number, true);
        $criteria->compare('buyer_name', $this->buyer_name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('status_id', $this->status_id);
        $criteria->compare('remarks', $this->remarks, true);
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
     * @return vAdmissionForm the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getTopCreated() {

        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->order = "created_date DESC";
        $models = self::model()->findAll($criteria);

        $returnarray = array();

        foreach ($models as $model) {
            $returnarray[] = array('id' => $model->id, 'label' => peterFunc::shorten_string($model->title, 7), 'icon' => 'list-alt', 'url' => array('/sCompanyNews/view', 'id' => $model->id));
        }

        return $returnarray;
    }

}
