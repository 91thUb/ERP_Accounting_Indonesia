<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */

$this->breadcrumbs = array(
    'G Performances' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List gPerformance', 'url' => array('index')),
    array('label' => 'Manage gPerformance', 'url' => array('admin')),
);
?>

<h1>Create gPerformance</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>