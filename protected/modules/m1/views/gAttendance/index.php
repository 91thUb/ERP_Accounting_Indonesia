<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gAttendance')),
    array('label' => 'Schedule Upload', 'icon' => 'calendar', 'url' => array('timeBlock')),
    array('label' => 'Attendant Upload', 'icon' => 'user', 'url' => array('attendBlock')),
    array('label' => 'Change Shift List', 'icon' => 'info-sign', 'url' => array('listchange')),
    array('label' => 'Parameter Time Block', 'icon' => 'wrench', 'url' => array('paramTimeblock')),
    array('label' => 'Rekap by Dept', 'icon' => 'print', 'url' => array('/m1/gAttendance/reportByDept')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

$this->menu1 = gAttendance::getTopUpdated();
$this->menu2 = gAttendance::getTopCreated();

$this->menu7 = aOrganization::compDeptAttendanceFilter();

$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gAttendance/index'));

$this->menu10 = array(
    array('label' => 'Rekap by Dept', 'icon' => 'print', 'url' => array('/m1/gAttendance/reportByDept')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-key fa-fw"></i>
        Attendance
    </h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '/gPerson/_view',
));
