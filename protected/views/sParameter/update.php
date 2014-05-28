<?php
$this->breadcrumbs = array(
    'Parameter' => array('index'),
    $model->name => array('view', 'id' => $model->type),
    'Update',
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-flask fa-fw"></i>
        <?php echo $model->name; ?>
    </h1>
</div>

<?php echo $this->renderPartial('_formNoType', array('model' => $model)); ?>