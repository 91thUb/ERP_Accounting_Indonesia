<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu = array(
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
        //array('label' => 'Home', 'icon'=>'home', 'url' => array('/m1/gTalent')),
        //array('label'=>'Report', 'icon'=>'print','url'=>array('/m1/gTalent/report')),
);



$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();

$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gTalent/index'));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-flask fa-fw"></i>
        Performance
    </h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    //$this->widget('ext.EColumnListView', array(
    //'columns' => 3,
    'dataProvider' => $dataProvider,
    'itemView' => '/gPerson/_view',
    'htmlOptions' => array(
        'style' => 'padding-top:0',
    )
));

