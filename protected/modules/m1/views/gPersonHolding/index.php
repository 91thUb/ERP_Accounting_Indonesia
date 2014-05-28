<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gPersonHolding')),
    array('label' => 'Report', 'icon' => 'print', 'url' => array('/m1/gPersonHolding/report')),
    array('label' => 'Request to Mutation', 'icon' => 'user', 'url' => array('/m1/default2/requestMutation')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);



$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gPersonHolding/index'));
?>

<div class="row">
    <div class="span2">

    </div>
    <div class="span7">

        <div class="page-header">
            <h1>
                <i class="fa fa-user fa-fw"></i>
                Person View
            </h1>
        </div>

        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>

        <?php
        $this->widget('bootstrap.widgets.TbListView', array(
            //$this->widget('ext.EColumnListView', array(
            //'columns' => 3,
            'dataProvider' => $dataProvider,
            'itemView' => '/gPerson/_view',
        ));
        ?>

    </div>
</div>
