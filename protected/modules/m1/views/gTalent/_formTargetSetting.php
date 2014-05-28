<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . "/css/bootstrap-maxlength/bootstrap-maxlength.js");

Yii::app()->clientScript->registerScript('sel2', "
		$(function() {
		$( \"textarea#" . CHtml::activeId($model, 'kpi_desc') . "\" ).maxlength({
			alwaysShow: true
		});

		});


");
?>

<div class="page-header">
    <h3>New Target Setting (<?php echo $year ?>)</h3>
</div>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'g-target-setting-form',
    'enableAjaxValidation' => false,
        ));
?>


<?php
//echo $form->dropDownListRow($model,'company_id',array(), 
//array('class'=>'span5','maxlength'=>50)); 
?>


<?php echo $form->dropDownListRow($model, 'strategic_objective', sParameter::items('cStrategicObjective'), array('class' => 'span5', 'maxlength' => 50));
?>


<?php echo $form->dropDownListRow($model, 'period', array('0' => 'All Year', '1' => 'Semester I Only', '2' => 'Semester II Only')); ?>


<?php echo $form->textAreaRow($model, 'strategic_desc', array('class' => 'span5', 'rows' => 5)); ?>


<?php echo $form->textAreaRow($model, 'kpi_desc', array('maxlength' => 500, 'class' => 'span5', 'rows' => 5)); ?>


<?php echo $form->textFieldRow($model, 'weight', array('class' => 'span3')); ?>


<?php echo $form->textFieldRow($model, 'target', array('class' => 'span5', 'maxlength' => 13)); ?>


<?php echo $form->textFieldRow($model, 'unit', array('class' => 'span5', 'maxlength' => 13)); ?>


<?php echo $form->textAreaRow($model, 'remark', array('class' => 'span5', 'rows' => 5)); ?>


<?php echo $form->textFieldRow($model, 'strategic_initiative', array('class' => 'span5', 'maxlength' => 154)); ?>


<?php echo $form->dropDownListRow($model, 'validate_id', sParameter::items('cTargetSettingValidate'), array('class' => 'span5', 'maxlength' => 50));
?>


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
