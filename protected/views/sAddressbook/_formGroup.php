<?php
/* @var $this SAddressbookGroupController */
/* @var $model sAddressbookGroup */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 's-addressbook-group-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'group_name', array('class' => 'span5')); ?>
<?php echo $form->textAreaRow($model, 'description', array('class' => 'span9', 'rows' => 4)); ?>

<div class="form-actions">
    <?php echo CHtml::htmlButton($model->isNewRecord ? '<i class="fa fa-ok fa-fw"></i>Create' : '<i class="fa fa-ok fa-fw"></i>Save', array('class' => 'btn', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>

