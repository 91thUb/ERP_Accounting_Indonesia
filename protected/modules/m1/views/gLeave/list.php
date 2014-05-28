<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu4 = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gLeave')),
    array('icon' => 'calendar', 'label' => 'Leave Calendar', 'url' => array('/m1/gLeave/leaveCalendar')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);


//$this->menu1=gLeave::getTopUpdated();
//$this->menu2=gLeave::getTopCreated();
$this->menu5 = array('Leave');
?>

<div class="page-header">
    <h1>
        <i class="fa fa-suitcase fa-fw"></i>
        Leave
    </h1>
</div>

<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'htmlOptions' => array(
        'style' => 'padding-top:0',
    ),
));
