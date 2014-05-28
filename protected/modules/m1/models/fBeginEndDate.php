<?php

class fBeginEndDate extends CFormModel {

    public $begindate;
    public $enddate;
    public $report_id;
    public $company_id;
    public $period;
    public $level_id;

    public function rules() {
        return array(
            array('begindate, enddate', 'required', 'on' => 'recruitment'),
            array('period', 'required', 'on' => 'attendance'),
            array('company_id, level_id', 'required', 'on' => 'performance'),
            array('report_id,period, level_id', 'numerical', 'integerOnly' => true),
            array('begindate, enddate', 'type', 'type' => 'date', 'dateFormat' => 'dd-MM-yyyy'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'begindate' => 'Start Date',
            'enddate' => 'Finish Date',
            'report_id' => 'Report',
            'company_id' => 'Company',
            'period' => 'Period',
            'level_id' => 'Level',
        );
    }

}
