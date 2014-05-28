<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */

$this->breadcrumbs = array(
    'S Addressbook Groups' => array('index'),
    'Create',
);

$this->menu = array(
        //array('label' => 'List sAddressbookGroup', 'url' => array('index')),
        //array('label' => 'Manage sAddressbookGroup', 'url' => array('admin')),
);
?>

<div class="page-header">
    <h1>Create SMS Group</h1>
</div>


<?php $this->renderPartial('_formGroup', array('model' => $model)); ?>