<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>


<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<?php
$leave = gLeave::searchCount($model->id) != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), gLeave::searchCount($model->id)) : "";
$permission = gPermission::searchCount($model->id) != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), gPermission::searchCount($model->id)) : "";
$attendance = gAttendance::searchCount($model->id) != 0 ? CHtml::tag("span", array('class' => 'badge badge-info'), gAttendance::searchCount($model->id)) : "";

$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'id' => 'tabs',
    'encodeLabel' => false,
    'tabs' => array(
        array('id' => 'tab3', 'label' => 'Attendance ' . $attendance, 'content' => $this->renderPartial("_subordinateAttendance", array("model" => $model, 'month' => $month), true), 'active' => true),
        array('id' => 'tab1', 'label' => 'Leave ' . $leave, 'content' => $this->renderPartial("_subordinateLeave", array("model" => $model), true)),
        array('id' => 'tab2', 'label' => 'Permission ' . $permission, 'content' => $this->renderPartial("_subordinatePermission", array("model" => $model), true)),
        array('id' => 'tab4', 'label' => 'Profile', 'content' => $this->renderPartial("/gPerson/_personalInfo", array("model" => $model, 'month' => $month), true)),
    ),
));
?>
