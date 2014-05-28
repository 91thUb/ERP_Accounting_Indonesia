<?php
/* @var $this ILearningController */
/* @var $model iLearning */

$this->breadcrumbs = array(
    'I Learnings' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Learning Calendar', 'icon' => 'briefcase', 'url' => array('/m1/iLearningHolding')),
    array('label' => 'List By Subject', 'icon' => 'briefcase', 'url' => array('/m1/iLearningHolding/index2')),
    array('label' => 'List By Date', 'icon' => 'calendar', 'url' => array('/m1/iLearningHolding/index3')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-book fa-fw"></i>
        Update: <?php echo $model->learning_title; ?>
    </h1>
</div>



<?php
echo $this->renderPartial('_form', array('model' => $model));
