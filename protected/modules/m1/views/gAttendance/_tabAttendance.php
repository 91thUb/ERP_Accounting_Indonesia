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
    'id' => 'cpersonalia-Attendance-grid',
    'dataProvider' => gAttendance::model()->search((int) $model->id, $month),
    'template' => '{items}',
    'itemsCssClass' => 'table table-bordered table-condensed',
    'template' => '{summary}{items}{pager}',
    //( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
    'rowCssClassExpression' => '
        ( ($data->realpattern_id == 90) ? "white" : "highlight" )
    ',
    //'filter'=>$model,
    'columns' => array(
        array(
            'header' => 'Permission',
            'class' => 'EJuiDlgsColumn',
            'template' => '{update}{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gAttendance/deleteAttendance",array("id"=>$data->id))',
            'updateDialog' => array(
                'controllerRoute' => '/m1/gAttendance/updateAttendance',
                //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/ijin.png',
                'actionParams' => array('id' => '$data->id'),
                'dialogTitle' => 'Update Attendance',
                'dialogWidth' => 512, //override the value from the dialog config
                'dialogHeight' => 530
            ),
        ),
        array(
            'name' => 'cdate',
            'type' => 'raw',
            'value' => '$data->cdate',
            'value' => function($data) {
        return
                CHtml::tag('div', array(), $data->cdate)
                . CHtml::tag('div', array('style' => 'font-size: 11px;'), date('l', strtotime($data->cdate)));
    }
        ),
        array(
            'header' => 'Pattern',
            'type' => 'raw',
            'value' => function($data1) {
        return
                CHtml::tag('div', array(), (isset($data1->realpattern)) ? $data1->realpattern->code : "")
                . CHtml::tag('div', array('style' => 'font-size: 11px;'), peterFunc::toTime($data1->realpattern->in) . " - " . peterFunc::toTime($data1->realpattern->out));
    }
        ),
        array(
            'name' => 'in',
            'type' => 'raw',
            'value' => function($data3) {
        return
                (peterFunc::isTimeMore($data3->in, $data3->realpattern->in)) ?
                CHtml::tag('div', array('style' => 'color: red;'), $data3->actualIn)
                . CHtml::tag('div', array('style' => 'color: red;font-size: 11px;'), $data3->lateInStatus) : $data3->actualIn;
    }
        ),
        array(
            'name' => 'out',
            'type' => 'raw',
            'value' => function($data2) {
        return
                (peterFunc::isTimeMore2($data2->realpattern->out, $data2->out, $data2->in)) ?
                CHtml::tag('div', array('style' => 'color: red;'), $data2->actualOut)
                . CHtml::tag('div', array('style' => 'color: red;font-size: 11px;'), $data2->earlyOutStatus) : $data2->actualOut;
    }
        ),
        array(
            'header' => 'Status',
            'type' => 'raw',
            'value' => function($data) {
        return
                CHtml::tag('div', array(), $data->OkName)
                . CHtml::tag('div', array(), isset($data->permission1) ? $data->permission1->name . ". " . $data->remark : "")
                . CHtml::tag('div', array(), isset($data->permission2) ? $data->permission2->name : "")
                . CHtml::tag('div', array(), isset($data->permission3) ? $data->permission3->name : "")
                . CHtml::tag('div', array(), isset($data->syncPermission) ? "#P# " . $data->syncPermission->permission_reason . " "
                                . CHtml::tag("span", array('class' => 'badge badge-info'), $data->syncPermission->approved->name) : "")
                . CHtml::tag('div', array(), isset($data->syncLeave) ? "#L# " . $data->syncLeave->leave_reason . " "
                                . CHtml::tag("span", array('class' => 'badge badge-info'), $data->syncLeave->approved->name) : "")
                . CHtml::tag('div', array(), ($data->approved_id != 0 ) ? "#A# " . $data->changepattern->code . ". " . $data->remark . " "
                                . CHtml::tag("span", array('class' => 'badge badge-info'), $data->superior_approved->name)
                                . CHtml::tag("span", array('class' => 'badge badge-info'), $data->approved->name) : "");
    }
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{leaveauto}',
            'buttons' => array(
                'leaveauto' => array(
                    'label' => 'Set Auto Leave',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/alpha.png',
                    'visible' => '$data->actualIn =="??:??" && $data->actualOut =="??:??" && !isset($data->syncLeave) ',
                    'url' => 'Yii::app()->createUrl("/m1/gLeave/autoLeave", array("id"=>$data->id))',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
								$.fn.yiiGridView.update("cpersonalia-Attendance-grid", {
								data: $(this).serialize()});
							}',
                        ),
                        'class' => 'btn btn-mini btn-inverse',
                    //'style' => 'margin-left:3px;',
                    ),
                ),
            ),
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{reset}',
            'buttons' => array(
                'reset' => array(
                    'label' => 'Reset In/Out',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/alpha.png',
                    'url' => 'Yii::app()->createUrl("/m1/gAttendance/reset", array("id"=>$data->id))',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
                                $.fn.yiiGridView.update("cpersonalia-Attendance-grid", {
                                data: $(this).serialize()});
                            }',
                        ),
                        'class' => 'btn btn-mini btn-inverse',
                        'style' => 'margin-left:3px;',
                    ),
                ),
            ),
        ),
        'notes'
    //'remark',
    ),
));
?>

<?php
$this->renderPartial('_formAttendance', array('model' => $modelAttendance));

