<?php
$this->breadcrumbs = array(
    'G people' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gPerson')),
    array('label' => 'View', 'icon' => 'edit', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Delete', 'icon' => 'trash-o', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'),
        array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
    ),
);

$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();
$this->menu5 = array('Person');
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo $model->employee_name_r; ?>
    </h1>
</div>

<?php
echo $this->renderPartial('_form', array('model' => $model));
