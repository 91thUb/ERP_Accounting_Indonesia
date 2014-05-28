<style>
    tr.highlight {
        background: #EAEFFF;
        font-weight:bold;
    }
    tr.white {
        background: #FFFFFF;
    }
    td.green {
        color:#0A7C00;
    }

</style>


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
        //'number_of_day',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'number_of_day',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gLeave/updateLeaveAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        'leave_reason',
        //'mass_leave',
        //'person_leave',
        //'balance',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'balance',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gLeave/updateLeaveAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'header' => 'Superior State',
            'value' => '$data->superior_approved->name',
            'cssClassExpression' => '( ($data->superior_approved_id == 2) ? "green" : "white" )',
        ),
        array(
            'header' => 'HR State',
            'value' => '$data->approved->name',
            'cssClassExpression' => '( ($data->approved_id == 2) ? "green" : "white" )',
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{print}',
            'buttons' => array
                (
                'print' => array
                    (
                    'label' => 'Print',
                    'url' => 'Yii::app()->createUrl("/m1/gLeave/printLeave",array("id"=>$data->id))',
                    'visible' => '$data->approved_id ==1 || $data->approved_id ==6',
                    'options' => array(
                        'class' => 'btn btn-mini',
                    ),
                ),
            ),
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{approved}',
            'buttons' => array
                (
                'approved' => array
                    (
                    'label' => 'Approved',
                    'url' => 'Yii::app()->createUrl("/m1/gLeave/approved",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->approved_id ==1 || $data->approved_id ==5 || $data->approved_id ==6',
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
        array(
            'class' => 'EJuiDlgsColumn',
            'template' => '{update}{delete}',
            //'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gLeave/delete",array("id"=>$data->id))',
            'updateDialog' => array(
                'controllerRoute' => 'm1/gLeave/update',
                'actionParams' => array('id' => '$data->id'),
                'dialogTitle' => 'Update Leave',
                'dialogWidth' => 512, //override the value from the dialog config
                'dialogHeight' => 530
            ),
        ),
    ),
));

