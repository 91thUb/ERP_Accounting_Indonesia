<div class="row">
    <div class="span9">

        <?php
        echo $this->renderPartial("/gLeave/_LeaveBalance", array("model" => $model), true);
        ?>
    </div>
</div>


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    //$this->widget('ext.groupgridview.GroupGridView', array(
    //'extraRowColumns' => array('start_date'),
    'id' => 'g-leave-grid',
    'dataProvider' => GLeave::model()->search($model->id),
    //'filter'=>$model,
    'template' => '{items}',
    'rowCssClassExpression' => '$data->cssReason()',
    //'rowCssClassExpression'=> function($data){
    //	if ($data->leave_reason == "Auto Generated Leave") {
    //	return "highlight";
    //	} else
    //	return "white";
    //	}
    //},
    'columns' => array(
        'start_date',
        'end_date',
        'number_of_day',
        'leave_reason',
        //'mass_leave',
        //'person_leave',
        'balance',
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
                    'url' => 'Yii::app()->createUrl("/m1/gEss/leaveSuperiorApproved",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->superior_approved_id ==1 || $data->superior_approved_id ==5 || $data->superior_approved_id ==6',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
														$.fn.yiiGridView.update("g-leave-grid", {
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
                    'url' => 'Yii::app()->createUrl("/m1/gEss/leaveSuperiorRejected",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->superior_approved_id ==1 || $data->superior_approved_id ==5 || $data->superior_approved_id ==6',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
														$.fn.yiiGridView.update("g-leave-grid", {
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

