<?php
/* @var $this SAddressbookController */
/* @var $model sAddressbook */

$this->breadcrumbs = array(
    'S Addressbooks' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List sAddressbook', 'url' => array('index')),
    array('label' => 'Create sAddressbook', 'url' => array('create')),
    array('label' => 'View sAddressbook', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage sAddressbook', 'url' => array('admin')),
);
?>

<h1>Update sAddressbook <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>