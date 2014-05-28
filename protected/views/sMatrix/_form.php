<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'module-matrix-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>


<?php echo $form->textFieldRow($model, 'level', array('class' => 'span3')); ?>

<?php echo $form->textFieldRow($model, 'level_r'); ?>

<?php echo $form->textFieldRow($model, 'level_c'); ?>

<?php echo $form->textFieldRow($model, 'level_u'); ?>

<?php echo $form->textFieldRow($model, 'level_d'); ?>

<div class="form-actions">
    <?php echo CHtml::htmlButton($model->isNewRecord ? '<i class="fa fa-ok fa-fw"></i>Create' : '<i class="fa fa-ok fa-fw"></i>Save', array('class' => 'btn', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>