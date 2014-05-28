<?php

$attendanceMonth = gAttendance::searchCountMonth($model->id, $month) != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), gAttendance::searchCountMonth($model->id, $month)) : "";
$attendanceMonthPrev = gAttendance::searchCountMonth($model->id, $month - 1) != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), gAttendance::searchCountMonth($model->id, $month - 1)) : "";
$attendanceMonthNext = gAttendance::searchCountMonth($model->id, $month + 1) != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), gAttendance::searchCountMonth($model->id, $month + 1)) : "";

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'encodeLabel' => false,
    'items' => array(
        array('label' => '<< Previous Month ' . " " . $attendanceMonthPrev, 'url' => Yii::app()->createUrl("/m1/gEss/subordinate", array("id" => $model->id, "month" => $month - 1))),
        array('label' => date("Ym", strtotime(date("Y-m", strtotime($month . " month")) . "-01")) . " " . $attendanceMonth,
            'url' => Yii::app()->createUrl("//m1/gEss/subordinate", array("id" => $model->id, "month" => $month))),
        array('label' => 'Next Month >> ' . " " . $attendanceMonthNext, 'visible' => ($month != 0), 'url' => Yii::app()->createUrl("/m1/gEss/subordinate", array("id" => $model->id, "month" => $month + 1))),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cpersonalia-Attendance-grid',
    'dataProvider' => gAttendance::model()->search((int) $model->id, $month),
    'template' => '{items}',
    'itemsCssClass' => 'table table-striped table-bordered table-condensed',
    'template' => '{summary}{items}{pager}',
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'cdate',
            'value' => '$data->cdate',
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
                . CHtml::tag('div', array(), ($data->approved_id > 0 ) ? "#A# " . $data->changepattern->code . ". " . $data->remark . " "
                                . CHtml::tag("span", array('class' => 'badge badge-info'), $data->superior_approved->name)
                                . CHtml::tag("span", array('class' => 'badge badge-info'), $data->approved->name) : "");
    }
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{approved}',
            'buttons' => array(
                'approved' => array(
                    'label' => 'Approved',
                    'url' => 'Yii::app()->createUrl("/m1/gEss/attendanceSuperiorApproved",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->superior_approved_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
														$.fn.yiiGridView.update("cpersonalia-Attendance-grid", {
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
                    'url' => 'Yii::app()->createUrl("/m1/gEss/attendanceSuperiorRejected",array("id"=>$data->id,"pid"=>$data->person->id))',
                    'visible' => '$data->superior_approved_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
														$.fn.yiiGridView.update("cpersonalia-Attendance-grid", {
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
?>

