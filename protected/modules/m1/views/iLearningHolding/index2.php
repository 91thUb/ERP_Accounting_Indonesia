<?php
/* @var $this ILearningController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'I Learnings',
);

$this->menu = array(
    array('label' => 'Learning Calendar', 'icon' => 'briefcase', 'url' => array('/m1/iLearningHolding')),
    array('label' => 'List By Date', 'icon' => 'briefcase', 'url' => array('/m1/iLearningHolding/index3')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);


$this->menu5 = array('Sylabus');
?>


<div class="pull-right">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div>

<div class="page-header">
    <h1>
        <i class="fa fa-book fa-fw"></i>
        Learning List
    </h1>
</div>


<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
