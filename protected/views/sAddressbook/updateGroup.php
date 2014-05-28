<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */

$this->breadcrumbs = array(
    'S Addressbook Groups' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List sAddressbookGroup', 'url' => array('index')),
    array('label' => 'Create sAddressbookGroup', 'url' => array('create')),
    array('label' => 'View sAddressbookGroup', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage sAddressbookGroup', 'url' => array('admin')),
);
?>

<h1>Update sAddressbookGroup <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>