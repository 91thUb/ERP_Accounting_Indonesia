<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */

$this->breadcrumbs = array(
    'S Addressbook Groups' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Address Book', 'url' => array('/sAddressbook')),
    array('label' => 'Address Book Group', 'url' => array('/sAddressbook/group')),
);
?>

<div class="page-header">
    <h1><?php echo $model->group_name; ?></h1>
</div>

<?php
$this->widget('TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'group_name',
        'description',
    ),
));
?>
