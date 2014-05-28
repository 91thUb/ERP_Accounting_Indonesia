<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'module-module-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>


<?php echo $form->dropDownListRow($model, 'parent_id', sModule::items()); ?>

<?php /* echo $form->dropDownListRow($model,'name',array(
  ''=>'NULL',
  'm0'=>'Basic Module',
  'm1'=>'HR','m2'=>'Accounting',
  'm3'=>'Budget',
  'm4'=>'Asset',
  'm5'=>'Process Production',
  )); */ ?>

<?php echo $form->dropDownListRow($model, 'name', sModule::model()->moduleList); ?>

<?php echo $form->textFieldRow($model, 'sort', array('class' => 'span3')); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span3')); ?>

<?php echo $form->textFieldRow($model, 'description', array('class' => 'span3')); ?>

<?php echo $form->textFieldRow($model, 'link', array('class' => 'span3')); ?>

<?php echo $form->textFieldRow($model, 'image', array('class' => 'span3')); ?>

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

