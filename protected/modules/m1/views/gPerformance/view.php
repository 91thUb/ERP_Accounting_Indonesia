<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */

$this->breadcrumbs = array(
    'G Performances' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List gPerformance', 'url' => array('index')),
    array('label' => 'Create gPerformance', 'url' => array('create')),
    array('label' => 'Update gPerformance', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete gPerformance', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage gPerformance', 'url' => array('admin')),
);
?>

<h1>View gPerformance #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'parent_id',
        'individual_weight',
        'individual_target',
        'individual_value',
        'superior_value',
        'superior_weight',
        'remark',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by',
    ),
));
?>
