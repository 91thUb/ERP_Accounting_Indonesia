<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'user-form',
    //'type'=>'horizontal',
    'enableAjaxValidation' => true,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'salt', array('disabled' => true)); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>
<?php echo $form->passwordFieldRow($model, 'password_repeat', array('class' => 'span3')); ?>


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