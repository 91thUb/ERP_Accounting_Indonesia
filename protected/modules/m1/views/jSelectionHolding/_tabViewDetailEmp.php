<?php

$this->widget('TbGridView', array(
    'id' => 'j-selection-grid1',
    'dataProvider' => jSelectionPart::model()->search($model->id),
    //'filter'=>$model,
    'columns' => array(
        array(
            'value' => 'CHtml::link($data->employee->employee_name,Yii::app()->createUrl("m1/jSelectionHolding/viewEmployee",array("id"=>$data->applicant_id)))',
            'type' => 'raw',
            'header' => 'Employee Name',
        ),
        array(
            'name' => 'company.name',
            'header' => 'Company',
        ),
        array(
            'name' => 'department.name',
            'header' => 'Department',
        ),
        array(
            'name' => 'level.name',
            'header' => 'Level',
        ),
        'for_position',
        array(
            'name' => 'flow.name',
            'header' => 'Status',
        ),
        //'remark',
        array(
            'class' => 'TbButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/m1/jSelectionHolding/deleteParticipant",array("id"=>$data->id))',
        ),
        array(
            'name' => 'created.username',
            'header' => 'Created By',
        ),
    ),
));
