<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'matrix-user-module-form1',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->dropDownListRow($model, 's_module_id', sModule::itemsAll(), array('disabled' => true)); ?>

<?php echo $form->dropDownListRow($model, 's_matrix_id', sMatrix::items('sMatrix'), array('class' => 'span3')); ?>

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
