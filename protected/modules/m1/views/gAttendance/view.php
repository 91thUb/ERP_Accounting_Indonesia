<?php
$this->breadcrumbs = array(
    'G people' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gAttendance')),
    array('label' => 'Schedule Upload', 'icon' => 'calendar', 'url' => array('timeBlock')),
    array('label' => 'Attendant Upload', 'icon' => 'user', 'url' => array('attendBlock')),
    array('label' => 'Parameter Time Block', 'icon' => 'wrench', 'url' => array('paramTimeblock')),
    array('label' => 'Print', 'icon' => 'print', 'url' => array('/m1/gAttendance/printDetail', 'id' => $model->id, 'month' => $month)),
    array('label' => 'Link to Person', 'icon' => 'user', 'url' => array('/m1/gPerson/view', 'id' => $model->id)),
    array('label' => 'Link to Leave', 'icon' => 'plane', 'url' => array('/m1/gLeave/view', 'id' => $model->id)),
    array('label' => 'Link to Permission', 'icon' => 'hand-o-up', 'url' => array('/m1/gPermission/view', 'id' => $model->id)),
    array('label' => 'Rekap by Dept', 'icon' => 'print', 'url' => array('/m1/gAttendance/reportByDept')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);


$this->menu1 = gAttendance::getTopUpdated();
$this->menu2 = gAttendance::getTopCreated();

$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gAttendance/index'));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-key fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => '<< Previous Month', 'url' => Yii::app()->createUrl("/m1/gAttendance/view", array("id" => $model->id, "month" => $month - 1))),
        array('label' => date("Ym", strtotime(date("Y-m", strtotime($month . " month")) . "-01")),
            'url' => Yii::app()->createUrl("/m1/gAttendance/view", array("id" => $model->id, "month" => $month))),
        array('label' => 'Next Month >>', 'url' => Yii::app()->createUrl("/m1/gAttendance/view", array("id" => $model->id, "month" => $month + 1))),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>


<?php
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Attendance', 'content' => $this->renderPartial("_tabAttendance", array("model" => $model, "modelAttendance" => $modelAttendance, "month" => $month), true), 'active' => true),
        //array('label' => 'Over Time', 'content' => $this->renderPartial("_tabOvertime", array("model" => $model, "month" => $month), true)),
        //array('label' => 'Leave / Permission', 'content' => $this->renderPartial("_tabLeavePermission", array("model" => $model, "modelAttendance" => $modelAttendance, "month" => $month), true)),
        array('label' => 'Detail', 'content' => $this->renderPartial("/gPerson/_personalInfo2", array("model" => $model), true),),
    ),
));


