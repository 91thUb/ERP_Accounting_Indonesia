<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'module-module-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<?php //echo $form->dropDownListRow($model,'parent_id',sModule::items()); ?>

<?php echo $form->textFieldRow($model, 'sort', array('class' => 'span3')); ?>

<?php echo $form->textFieldRow($model, 'category_name', array('class' => 'span3')); ?>

<?php echo $form->textAreaRow($model, 'category_description', array('class' => 'span5', 'rows' => 3)); ?>

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

