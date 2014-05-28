<?php
/* @var $this GPersonPerformanceController */
/* @var $model gTalentPerformance */
/* @var $form CActiveForm */
?>

<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker4', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'input_date') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
		'format' : 'dd-mm-yyyy',
		});
			
});

		");

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . "/css/bootstrap-spinedit/js/bootstrap-spinedit.js");
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . "/css/bootstrap-spinedit/css/bootstrap-spinedit.css");


Yii::app()->clientScript->registerScript('sel2', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'year') . "\" ).spinedit({
	    minimum: " . date('Y', strtotime('4 year ago')) . ",
    	maximum: " . date('Y') . ",
	    step: 1,
    	numberOfDecimals: 0,
		});


		});


");
?>

<div class="page-header">
    <h3>New Performance</h3>
</div>

<div class="row">

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'id' => 'g-person-performance-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'input_date'); ?>

    <?php echo $form->textFieldRow($model, 'year', array('class' => 'span2')); ?>

    <?php echo $form->dropDownListRow($model, 'period_id', sParameter::items('cSemester')); ?>


    <?php //echo $form->textFieldRow($model, 'amount', array('class' => 'span2'));  ?>

    <?php //echo $form->textFieldRow($model, 'pa_value', array('class' => 'span2','style' => 'text-transform: uppercase')); ?>
    <?php echo $form->dropDownListRow($model, 'pa_value', array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E'), array('class' => 'span1')); ?>

    <?php echo $form->dropDownListRow($model, 'potential', array('' => '', 'HF+' => 'HF+', 'HF++' => 'HF++')); ?>

    <?php //echo $form->textAreaRow($model, 'future_dev', array('rows' => 3, 'class' => 'span5')); ?>

    <?php echo $form->textAreaRow($model, 'remark', array('rows' => 3, 'class' => 'span5')); ?>

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

</div><!-- form -->