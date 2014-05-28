<?php
/* @var $this SAddressbookController */
/* @var $model sAddressbook */

$this->breadcrumbs = array(
    'S Addressbooks' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List sAddressbook', 'url' => array('index')),
    array('label' => 'Manage sAddressbook', 'url' => array('admin')),
);
?>

<div class="page-header">
    <h1>Create New Contact</h1>
</div>

<?php $this->renderPartial('_form', array('model' => $model)); ?>