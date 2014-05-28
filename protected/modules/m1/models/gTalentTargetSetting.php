<?php

/**
 * This is the model class for table "g_talent_target_setting".
 *
 * The followings are the available columns in table 'g_talent_target_setting':
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
class gTalentTargetSetting extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'g_talent_target_setting';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('unit', 'length', 'max' => 25),
            array('strategic_objective', 'length', 'max' => 50),
            array('strategic_desc', 'length', 'max' => 80),
            array('weight', 'length', 'max' => 5),
            array('kpi_desc', 'length', 'max' => 500),
            array('target,realization,realization2', 'numerical'),
            array('value_type_id,superior_score, superior2_score, company_id, year,validate_id', 'numerical', 'integerOnly' => true),
            array('remark', 'length', 'max' => 58),
            array('strategic_initiative', 'length', 'max' => 154),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id, strategic_objective, strategic_desc, weight, kpi_desc, target, remark, strategic_initiative', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'strategic' => array(self::BELONGS_TO, 'sParameter', array('strategic_objective' => 'code'), 'condition' => 'type = \'cStrategicObjective\''),
            'validate' => array(self::BELONGS_TO, 'sParameter', array('validate_id' => 'code'), 'condition' => 'type = \'cTargetSettingValidate\''),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'year' => 'Year',
            'company_id' => 'Company',
            'strategic_objective' => 'Perspective',
            'strategic_desc' => 'Strategic Objective',
            'weight' => 'Weight',
            'kpi_desc' => 'KPI Desc',
            'target' => 'Target',
            'unit' => 'Unit',
            'remark' => 'Remark',
            'strategic_initiative' => 'Strategic Initiative',
            'realization' => 'Realization I',
            'value_type_id' => 'Value Type',
            'superior_score' => 'Superior Score I',
            'realization2' => 'Realization II',
            'superior2_score' => 'Superior Score II',
            'validate_id' => 'Validation',
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
        $criteria->order = 't.year DESC,t.id';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            //'pagination'=>array(
            //	'pageSize'=>100,
            //)
            'pagination' => false
        ));
    }

    public function getRealizationVsTargetFormula() {
        $value = '';
        if (isset($this->realization) && $this->target != 0 && $this->realization != 0) {
            if ($this->value_type_id == 2) {
                $value = ($this->realization / $this->target) * 100;
            } else {
                if ($this->realization == 0) {
                    $value = (($this->target + 1) / 1) * 100;
                } else
                    $value = ($this->target / $this->realization) * 100;
            }
            return $value;
        }
        return $value;
    }

    public function getRealization2VsTargetFormula() {
        $value = '';
        if (isset($this->realization2) && $this->target != 0 && $this->realization2 != 0) {
            if ($this->value_type_id == 2) {
                $value = ($this->realization2 / $this->target) * 100;
            } else {
                if ($this->realization2 == 0) {
                    $value = (($this->target + 1) / 1) * 100;
                } else
                    $value = ($this->target / $this->realization2) * 100;
            }
            return $value;
        }
        return $value;
    }

    public function getRealizationVsTarget() {
        if ($this->realizationVsTargetFormula == '') {
            return '';
        } else
            return number_format($this->realizationVsTargetFormula, 2, '.', ',') . '%';
    }

    public function getRealization2VsTarget() {
        if ($this->realization2VsTargetFormula == '') {
            return '';
        } else
            return number_format($this->realization2VsTargetFormula, 2, '.', ',') . '%';
    }

    public function getIndividualScore() {
        $value = '';
        if ($this->realizationVsTargetFormula == '') {
            $value = '';
        } elseif ($this->realizationVsTargetFormula <= 70) {
            $value = 1;
        } elseif ($this->realizationVsTargetFormula > 70 && $this->realizationVsTargetFormula <= 90) {
            $value = 2;
        } elseif ($this->realizationVsTargetFormula > 90 && $this->realizationVsTargetFormula <= 110) {
            $value = 3;
        } elseif ($this->realizationVsTargetFormula > 110 && $this->realizationVsTargetFormula <= 130) {
            $value = 4;
        } elseif ($this->realizationVsTargetFormula > 130) {
            $value = 5;
        } else
            $value = "N.A.";


        return $value;
    }

    public function getIndividualScore2() {
        $value = '';
        if ($this->realization2VsTargetFormula == '') {
            $value = '';
        } elseif ($this->realization2VsTargetFormula <= 70) {
            $value = 1;
        } elseif ($this->realization2VsTargetFormula > 70 && $this->realizationVsTargetFormula <= 90) {
            $value = 2;
        } elseif ($this->realization2VsTargetFormula > 90 && $this->realizationVsTargetFormula <= 110) {
            $value = 3;
        } elseif ($this->realization2VsTargetFormula > 110 && $this->realizationVsTargetFormula <= 130) {
            $value = 4;
        } elseif ($this->realization2VsTargetFormula > 130) {
            $value = 5;
        } else
            $value = "N.A.";


        return $value;
    }

    public function getSuperiorVsWeight() {
        if (isset($this->superior_score))
            return $this->weight * $this->superior_score;
        return '';
    }

    public function getSuperior2VsWeight() {
        if (isset($this->superior2_score))
            return $this->weight * $this->superior2_score;
        return '';
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return gTalentTargetSetting the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
