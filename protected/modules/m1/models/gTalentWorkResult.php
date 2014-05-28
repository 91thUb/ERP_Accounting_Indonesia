<?php

/**
 * This is the model class for table "g_talent_work_result".
 *
 * The followings are the available columns in table 'g_talent_work_result':
 * @property integer $id
 * @property string $parent_id
 * @property string $strategic_objective
 * @property string $strategic_desc
 * @property string $weight
 * @property string $kpi_desc
 * @property string $target
 * @property string $remark
 * @property string $strategic_initiative
 */
class gTalentWorkResult extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'g_talent_work_result';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('talent_template_id,company_id, year, period_id, superior_score, personal_score', 'numerical', 'integerOnly' => true),
            array('remark', 'length', 'max' => 500),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id, remark', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'talent_template' => array(self::BELONGS_TO, 'gParamCompetency', 'talent_template_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'company_id' => 'Company',
            'year' => 'Year',
            'period_id' => 'Period',
            'talent_template_id' => 'Talent Template',
            'personal_score' => 'Personal Score',
            'superior_score' => 'Superior Score',
            'remark' => 'Remark',
            'calcFinalResult' => 'Final Result',
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
    public function search($id, $year) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('parent_id', $id);
        $criteria->compare('year', $year);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            )
        ));
    }

    public function getCalcFinalResult() {

        $value = $this->superior_score * $this->talent_template->weight;

        return $value;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return gTalentKompetensiInti the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
