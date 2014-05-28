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
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => '<< Previous Month', 'url' => Yii::app()->createUrl("/m1/gEss/attendance", array("id" => $model->id, "month" => $month - 1))),
        array('label' => date("Ym", strtotime(date("Y-m", strtotime($month . " month")) . "-01")),
            'url' => Yii::app()->createUrl("/m1/gEss/attendance", array("id" => $model->id, "month" => $month))),
        array('label' => 'Next Month >>', 'visible' => ($month != 0), 'url' => Yii::app()->createUrl("/m1/gEss/attendance", array("id" => $model->id, "month" => $month + 1))),
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
    'itemsCssClass' => 'table table-bordered table-condensed',
    'template' => '{summary}{items}{pager}',
    //( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
    'rowCssClassExpression' => '
        ( ($data->realpattern_id == 90) ? "white" : "highlight" )
    ',
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'cdate',
            'type' => 'raw',
            //'value' => '$data->cdate',
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
                (peterFunc::isTimeMore($data2->realpattern->out, $data2->out)) ?
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
            'template' => '{permission}',
            'buttons' => array(
                'permission' => array(
                    'label' => 'Set Permission',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/alpha.png',
                    'url' => 'Yii::app()->createUrl("/m1/gEss/createPermission", array("id"=>$data->id))',
                    'options' => array(
                        /* 'ajax' => array(
                          'type' => 'GET',
                          'url' => "js:$(this).attr('href')",
                          'success' => 'js:function(data){
                          $.fn.yiiGridView.update("g-permission-grid", {
                          data: $(this).serialize()});
                          }',
                          ), */
                        'class' => 'btn btn-mini btn-inverse',
                        'style' => 'margin-left:3px;',
                    ),
                    'visible' => '$data->realpattern_id !=90',
                ),
            ),
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{attendance}{printchange}',
            'buttons' => array(
                'attendance' => array(
                    'label' => 'Change Schedule',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/alpha.png',
                    'url' => 'Yii::app()->createUrl("/m1/gEss/changeAttendance", array("id"=>$data->id))',
                    'options' => array(
                        /* 'ajax' => array(
                          'type' => 'GET',
                          'url' => "js:$(this).attr('href')",
                          'success' => 'js:function(data){
                          $.fn.yiiGridView.update("g-permission-grid", {
                          data: $(this).serialize()});
                          }',
                          ), */
                        'class' => 'btn btn-mini btn-inverse',
                        'style' => 'margin-left:3px;',
                    ),
                    'visible' => '($data->approved_id == 0)'
                ),
                'printchange' => array(
                    'label' => 'PRINT FORM',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon/alpha.png',
                    'url' => 'Yii::app()->createUrl("/m1/gEss/changeAttendancePrint", array("id"=>$data->id))',
                    'options' => array(
                        /* 'ajax' => array(
                          'type' => 'GET',
                          'url' => "js:$(this).attr('href')",
                          'success' => 'js:function(data){
                          $.fn.yiiGridView.update("g-permission-grid", {
                          data: $(this).serialize()});
                          }',
                          ), */
                        'class' => 'btn btn-mini btn-inverse',
                        'style' => 'margin-left:3px;',
                    ),
                    'visible' => '($data->approved_id != 0)'
                ),
            ),
        ),
        //'remark'
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'notes',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gLeave/updateLeaveAjax'),
            //'placement' => 'right',
            //'inputclass' => 'span2'
            )),
    ),
));
?>


