<h4>Payment Process</h4>

<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker', "
$(function() {
		$( \"#" . CHtml::activeId($model, 'payment_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});		
		$( \"#" . CHtml::activeId($model, 'effective_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		});		
		
});

		");
?>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'u-ar-payment-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'payment_date', array('class' => 'span2')); ?>

<?php //echo $form->textFieldRow($model,'payment_ref',array('class'=>'span5','maxlength'=>100)); ?>

<?php echo $form->dropDownListRow($model, 'payment_target_id', tAccount::cashbankAccount()); ?>
<?php echo $form->dropDownListRow($model, 'payment_type_id', array('1' => 'Cash', '2' => 'Cheque/Giro')); ?>
<?php echo $form->textAreaRow($model, 'description', array('class' => 'span5', 'rows' => 4)); ?>

<?php echo $form->textFieldRow($model, 'amount', array('class' => 'span3', 'maxlength' => 15)); ?>

<?php echo $form->textFieldRow($model, 'effective_date', array('class' => 'span2')); ?>


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
