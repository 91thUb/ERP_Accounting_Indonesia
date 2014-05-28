<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'g-performance-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php echo $form->textField($model, 'parent_id'); ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'individual_weight'); ?>
        <?php echo $form->textField($model, 'individual_weight'); ?>
        <?php echo $form->error($model, 'individual_weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'individual_target'); ?>
        <?php echo $form->textField($model, 'individual_target'); ?>
        <?php echo $form->error($model, 'individual_target'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'individual_value'); ?>
        <?php echo $form->textField($model, 'individual_value'); ?>
        <?php echo $form->error($model, 'individual_value'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'superior_value'); ?>
        <?php echo $form->textField($model, 'superior_value'); ?>
        <?php echo $form->error($model, 'superior_value'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'superior_weight'); ?>
        <?php echo $form->textField($model, 'superior_weight'); ?>
        <?php echo $form->error($model, 'superior_weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'remark'); ?>
        <?php echo $form->textField($model, 'remark'); ?>
        <?php echo $form->error($model, 'remark'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'created_date'); ?>
        <?php echo $form->textField($model, 'created_date'); ?>
        <?php echo $form->error($model, 'created_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'created_by'); ?>
        <?php echo $form->textField($model, 'created_by'); ?>
        <?php echo $form->error($model, 'created_by'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'updated_date'); ?>
        <?php echo $form->textField($model, 'updated_date'); ?>
        <?php echo $form->error($model, 'updated_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'updated_by'); ?>
        <?php echo $form->textField($model, 'updated_by'); ?>
        <?php echo $form->error($model, 'updated_by'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->