<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */
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
        <?php echo $form->label($model, 'parent_id'); ?>
        <?php echo $form->textField($model, 'parent_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'individual_weight'); ?>
        <?php echo $form->textField($model, 'individual_weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'individual_target'); ?>
        <?php echo $form->textField($model, 'individual_target'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'individual_value'); ?>
        <?php echo $form->textField($model, 'individual_value'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'superior_value'); ?>
        <?php echo $form->textField($model, 'superior_value'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'superior_weight'); ?>
        <?php echo $form->textField($model, 'superior_weight'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'remark'); ?>
        <?php echo $form->textField($model, 'remark'); ?>
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