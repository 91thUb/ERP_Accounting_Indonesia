<?php
/* @var $this VAdmissionFormController */
/* @var $model vAdmissionForm */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'form_number'); ?>
        <?php echo $form->textField($model, 'form_number', array('size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'buyer_name'); ?>
        <?php echo $form->textField($model, 'buyer_name', array('size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status_id'); ?>
        <?php echo $form->textField($model, 'status_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'remarks'); ?>
        <?php echo $form->textField($model, 'remarks', array('size' => 60, 'maxlength' => 300)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_date'); ?>
        <?php echo $form->textField($model, 'created_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_by'); ?>
        <?php echo $form->textField($model, 'created_by'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'updated_date'); ?>
        <?php echo $form->textField($model, 'updated_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'updated_by'); ?>
        <?php echo $form->textField($model, 'updated_by'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->