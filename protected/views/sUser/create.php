<?php
$this->breadcrumbs = array(
    'User' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/sUser')),
);

$this->menu2 = sUser::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo "Create New User"; ?>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>