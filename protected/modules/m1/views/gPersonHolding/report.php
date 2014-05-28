<?php
$this->breadcrumbs = array(
    'Person Holding',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gPersonHolding')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
        //array('label'=>'Manage gPerson','url'=>array('admin')),
);



$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        Report
    </h1>
</div>

<ul>
    <li>
        <?php echo CHtml::link('Report Multi Position Employee', Yii::app()->createUrl('/m1/gPersonHolding/report1')); ?>
    </li>
    <li>
        <?php echo CHtml::link('Report Mandays per Business Unit', Yii::app()->createUrl('/m1/gPersonHolding/report2')); ?>
    </li>
</ul>
