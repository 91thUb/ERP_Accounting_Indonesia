<?php

$this->widget('TbGridView', array(
    'id' => 'j-selection-grid2',
    'dataProvider' => jSelectionPart::model()->search($model->id),
    //'filter'=>$model,
    'columns' => array(
        array(
            'value' => 'CHtml::link($data->employee->employee_name,Yii::app()->createUrl("m1/hApplicant/viewEmp",array("id"=>$data->applicant_id)))',
            'type' => 'raw',
            'header' => 'Employee Name',
        ),
        array(
            'name' => 'applicant.selection.workflow_by',
            'header' => 'Last Assessment By',
        ),
        array(
            'name' => 'applicant.selection.assessment_date',
            'header' => 'Last Assessment Date',
        ),
        array(
            'name' => 'applicant.selection.assessment_summary',
            'header' => 'Last Assessment Summary',
        ),
        array(
            'name' => 'applicant.selection.development_area',
            'header' => 'Last Development Area',
        ),
        array(
            'class' => 'EJuiDlgsColumn',
            'template' => '{update}',
            'updateDialog' => array(
                'controllerRoute' => 'm1/jSelectionHolding/updateAssessment',
                'actionParams' => array('id' => '$data->applicant_id'),
                'dialogTitle' => 'New Assessment',
                'dialogWidth' => 600, //override the value from the dialog config
                'dialogHeight' => 530
            ),
        ),
    ),
));
