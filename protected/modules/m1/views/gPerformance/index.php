<?php
/* @var $this GPerformanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'G Performances',
);

$this->menu = array(
    array('label' => 'Create gPerformance', 'url' => array('create')),
    array('label' => 'Manage gPerformance', 'url' => array('admin')),
);
?>

<h1>G Performances</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
