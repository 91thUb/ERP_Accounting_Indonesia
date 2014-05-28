<?php
$this->breadcrumbs = array(
    'User' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);


$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/sUser')),
    array('label' => 'View Self', 'icon' => 'edit', 'url' => array('viewSelf', 'id' => $model->id)),
);

//$this->menu2=sUser::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo $model->username; ?>
    </h1>
</div>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'user-form',
    //'type'=>'horizontal',
    'enableAjaxValidation' => true,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'full_name', array('class' => 'span4')); ?>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>