<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */
/* @var $form CActiveForm */
?>

<div class="page-header">
    <h3>New Performance Process</h3>
</div>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'g-performance-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'individual_weight'); ?>
<?php echo $form->textFieldRow($model, 'individual_target'); ?>
<?php echo $form->textFieldRow($model, 'individual_value'); ?>
<?php echo $form->textFieldRow($model, 'superior_value'); ?>
<?php echo $form->textFieldRow($model, 'superior_weight'); ?>
<?php echo $form->textAreaRow($model, 'remark', array('rows' => 3, 'class' => 'span4')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Create',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

