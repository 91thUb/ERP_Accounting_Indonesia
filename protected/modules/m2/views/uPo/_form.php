<?php
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->getClientScript()->registerCoreScript('maskedinput');


Yii::app()->clientScript->registerScript('datepicker', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'input_date') . "\" ).datepicker({
			
		'dateFormat' : 'dd-mm-yy',
});
		$( \"#" . CHtml::activeId($model, 'input_date') . "\" ).mask('99-99-9999');
});

		");
?>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'u-po-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'supplier_id', uSupplier::items(), array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'input_date', array('class' => 'span2')); ?>

<?php //echo $form->textFieldRow($model,'system_ref',array('class'=>'span5','maxlength'=>100)); ?>

<?php echo $form->dropDownListRow($model, 'po_type_id', array('1' => '1', '2' => '2')); ?>

<?php echo $form->textAreaRow($model, 'remark', array('rows' => 3, 'class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Create',
    ));
    ?>

</div>

<?php
$this->widget('ext.appendo.JAppendo', array(
    'id' => 'repeateEnum',
    'model' => $model,
    'viewName' => '_detailPo',
    'labelDel' => 'Remove Row',
    'appendoPath' => '/modules/m2/views/jAppendo/',
        //'cssFile' => 'css/jquery.appendo2.css'
));
?>

<?php $this->endWidget(); ?>
