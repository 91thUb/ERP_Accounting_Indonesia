<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'parameter-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->textFieldRow($model, 'code'); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span3')); ?>

<?php echo $form->dropDownListRow($model, 'status_id', sParameter::items("cStatus")); ?>



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