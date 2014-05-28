<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */

$this->breadcrumbs = array(
    'G Performances' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List gPerformance', 'url' => array('index')),
    array('label' => 'Create gPerformance', 'url' => array('create')),
    array('label' => 'View gPerformance', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage gPerformance', 'url' => array('admin')),
);
?>

<h1>Update gPerformance <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>