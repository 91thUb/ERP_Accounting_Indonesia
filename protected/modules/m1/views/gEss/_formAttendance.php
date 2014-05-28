<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker', "
$(function() {
		$( \"#" . CHtml::activeId($model, 'cdate') . "\" ).datepicker({
		'dateFormat' : 'dd-mm-yy',
});
		
		
});

		");
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'g-Attendance-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'cdate', array('disabled' => 'disabled')); ?>
<?php echo $form->dropDownListRow($model, 'realpattern_id', gParamTimeblock::timeBlockDropDown(), array('disabled' => 'disabled')); ?>

<?php echo $form->dropDownListRow($model, 'changepattern_id', gParamTimeblock::timeBlockDropDown()); ?>

<?php //echo $form->textFieldRow($model,'overtime_factor',array('size'=>3,'maxlength'=>3)); ?>
<?php echo $form->textAreaRow($model, 'remark', array('class' => 'span4', 'rows' => 3)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
        'visible' => ($model->changepattern_id == 0)
    ));
    ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'url' => Yii::app()->createUrl('/m1/gEss/attendance'),
        'label' => 'Close',
        'visible' => ($model->changepattern_id != 0),
        'htmlOptions' => array(
            'target' => 'blank',
        ),
    ));
    ?>


    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'url' => Yii::app()->createUrl('/m1/gEss/changeAttendancePrint', array('id' => $model->id)),
        'label' => 'Print',
        'visible' => ($model->changepattern_id != 0)
    ));
    ?>



</div>

<?php
$this->endWidget();


