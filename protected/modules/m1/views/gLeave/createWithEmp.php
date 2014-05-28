<?php
$this->breadcrumbs = array(
    'G Cutis' => array('index'),
    'Create',
);

$this->menu4 = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gLeave')),
    array('icon' => 'calendar', 'label' => 'Leave Calendar', 'url' => array('/m1/gLeave/leaveCalendar')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

//$this->menu1=gLeave::getTopUpdated();
//$this->menu2=gLeave::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-suitcase fa-fw"></i>
        Create Leave
    </h1>
</div>


<?php
echo $this->renderPartial('_formWithEmp', array('model' => $model));
