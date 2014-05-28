<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    //$this->widget('ext.groupgridview.GroupGridView', array(
    //'extraRowColumns' => array('start_date'),
    'id' => 'g-permission-grid',
    'dataProvider' => gPermission::model()->search($model->id),
    //'filter'=>$model,
    'template' => '{items}',
    'columns' => array(
        //'start_date',
        'start_date',
        'end_date',
        'number_of_day',
        //'work_date',
        array(
            'header' => 'Permission Type - Reason',
            'type' => 'raw',
            'value' => function ($data) {
        return $data->permission_type->name
                . "<br/>" . CHtml::tag('div', array('style' => 'color: #999; font-size: 12px'), $data->permission_reason);
    },
        ),
        array(
            'header' => 'Superior State',
            'value' => '$data->superior_approved->name',
        ),
        array(
            'header' => 'HR State',
            'value' => '$data->approved->name',
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{approved}',
            'buttons' => array(
                'approved' => array(
                    'label' => 'Approved',
                    'url' => 'Yii::app()->createUrl("/m1/gEss/permissionSuperiorApproved",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->superior_approved_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
														$.fn.yiiGridView.update("g-permission-grid", {
														data: $(this).serialize()
														});
														}',
                        ),
                        'class' => 'btn btn-primary btn-mini',
                    ),
                ),
            ),
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{rejected}',
            'buttons' => array(
                'rejected' => array(
                    'label' => 'Rejected',
                    'url' => 'Yii::app()->createUrl("/m1/gEss/permissionSuperiorRejected",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->superior_approved_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
														$.fn.yiiGridView.update("g-permission-grid", {
														data: $(this).serialize()
														});
														}',
                        ),
                        'class' => 'btn btn-mini',
                    ),
                ),
            ),
        ),
    ),
));
