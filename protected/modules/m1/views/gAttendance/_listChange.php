<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-attendance-grid',
    'dataProvider' => gAttendance::model()->onWaiting(),
    //'filter'=>$model,
    'template' => '{items}{pager}',
    'columns' => array(
        array(
            'type' => 'raw',
            'value' => '$data->person->photoPath',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'header' => 'Name',
            'type' => 'raw',
            'value' => function ($data) {
        return CHtml::link($data->person->employee_name, Yii::app()->createUrl("/m1/gAttendance/view", array("id" => $data->parent_id)))
                . "<br/>" . CHtml::tag('div', array('style' => 'color: #999; font-size: 12px'), $data->person->mDepartment());
    },
        ),
        'cdate',
        array(
            'header' => 'Real Pattern',
            'value' => '$data->realpattern->code',
        ),
        array(
            'header' => 'Request Pattern',
            'value' => '$data->changepattern->code',
        ),
        array(
            'header' => 'Superior Status',
            'value' => '$data->superior_approved->name',
        ),
        array(
            'header' => 'HR Status',
            'value' => '$data->approved->name',
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{approved}',
            'buttons' => array
                (
                'approved' => array
                    (
                    'label' => 'Approved',
                    'url' => 'Yii::app()->createUrl("/m1/gAttendance/approved",array("id"=>$data->id,"pid"=>$data->parent_id))',
                    'visible' => '$data->approved_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
								$.fn.yiiGridView.update("g-attendance-grid", {
									data: $(this).serialize()
								});
								}',
                        ),
                        'class' => 'btn btn-mini btn-primary',
                    ),
                ),
            ),
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{rejected}',
            'buttons' => array
                (
                'rejected' => array
                    (
                    'label' => 'Rejected',
                    'url' => 'Yii::app()->createUrl("/m1/gAttendance/rejected",array("id"=>$data->id,"pid"=>$data->parent_id))',
                    'visible' => '$data->approved_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
								$.fn.yiiGridView.update("g-attendance-grid", {
									data: $(this).serialize()
								});
								}',
                        ),
                        'class' => 'btn btn-mini btn-primary',
                    ),
                ),
            ),
        ),
    ),
));

