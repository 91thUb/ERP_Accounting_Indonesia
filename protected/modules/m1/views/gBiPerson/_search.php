<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span2')); ?>

<?php echo $form->textFieldRow($model, 'employee_code_global', array('class' => 'span2')); ?>

<?php echo $form->textFieldRow($model, 'employee_name', array('class' => 'span2')); ?>

<?php echo $form->textFieldRow($model, 'birth_place', array('class' => 'span2')); ?>

<?php echo $form->textFieldRow($model, 'birth_date', array('class' => 'span2')); ?>

<?php echo $form->checkBoxRow($model, 'sex', false, array('class' => 'span2')); ?>


<?php /* 	
  <?php echo $form->textFieldRow($model,'religion_id',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'address1',array('class'=>'span5','maxlength'=>255)); ?>

  <?php echo $form->textFieldRow($model,'address2',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'address3',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'pos_code',array('class'=>'span5','maxlength'=>5)); ?>

  <?php echo $form->textFieldRow($model,'identity_number',array('class'=>'span5','maxlength'=>25)); ?>

  <?php echo $form->textFieldRow($model,'identity_valid',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'identity_address1',array('class'=>'span5','maxlength'=>255)); ?>

  <?php echo $form->textFieldRow($model,'identity_address2',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'identity_address3',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'identity_pos_code',array('class'=>'span5','maxlength'=>5)); ?>

  <?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

  <?php echo $form->textFieldRow($model,'email2',array('class'=>'span5','maxlength'=>100)); ?>

  <?php echo $form->textFieldRow($model,'blood_id',array('class'=>'span5','maxlength'=>10)); ?>

  <?php echo $form->textFieldRow($model,'home_phone',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'handphone',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'handphone2',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'c_pathfoto',array('class'=>'span5','maxlength'=>255)); ?>

  <?php echo $form->textFieldRow($model,'account_number',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'account_name',array('class'=>'span5','maxlength'=>50)); ?>

  <?php echo $form->textFieldRow($model,'bank_name',array('class'=>'span5','maxlength'=>45)); ?>

  <?php echo $form->textFieldRow($model,'userid',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'t_status',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'activation_code',array('class'=>'span5','maxlength'=>16)); ?>

  <?php echo $form->textFieldRow($model,'activation_expire',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'created_by',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'updated_date',array('class'=>'span5')); ?>

  <?php echo $form->textFieldRow($model,'updated_by',array('class'=>'span5')); ?>

 */ ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
