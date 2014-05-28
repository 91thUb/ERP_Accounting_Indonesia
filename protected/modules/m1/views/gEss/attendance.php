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
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>


<div class="page-header">
    <h1>
        <i class="fa fa-leaf fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'id' => 'tabs',
    'encodeLabel' => false,
    'tabs' => array(
        array('id' => 'tab1', 'label' => 'Normal View', 'content' => $this->renderPartial("_attendanceNormal", array("model" => $model, 'month' => $month), true), 'active' => true),
        array('id' => 'tab2', 'label' => 'Calendar View ', 'content' => $this->renderPartial("_attendanceCalendar", array("model" => $model, 'month' => $month), true)),
    ),
));
?>



