<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */

$this->breadcrumbs = array(
    'S Addressbook Groups' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create New SMS Group', 'icon' => 'globe', 'url' => array('/sAddressbook/createGroup')),
    array('label' => 'Address Book', 'icon' => 'globe', 'url' => array('/sAddressbook')),
);

//$this->menu5=array('SMS Group');
?>

<div class="page-header">
    <h1>Address Book Group</h1>
</div>

<?php
$this->widget('TbGridView', array(
    'id' => 's-addressbook-group-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        //'parent_id',
        'group_name',
        'description',
        array(
            'class' => 'TbButtonColumn',
            'template' => '{delete}'
        ),
    ),
));
?>
