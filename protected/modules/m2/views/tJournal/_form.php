<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'u-journal-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'input_date'); ?>

<?php //echo $form->dropDownListRow($model,'yearmonth_periode',array(Yii::app()->settings->get("System", "cCurrentPeriod")=>Yii::app()->settings->get("System", "cCurrentPeriod"))); ?>

<?php echo $form->textAreaRow($model, 'remark', array('rows' => 2, 'class' => 'span5')); ?>

<hr/>

<?php
$this->widget('ext.appendo.JAppendo', array(
    'id' => 'repeateEnum',
    'model' => $model,
    'viewName' => '_detailJournalMemorial',
    'labelDel' => 'Remove Row',
    'appendoPath' => '/modules/m2/views/jAppendo/',
        //'cssFile' => 'css/jquery.appendo2.css'
));
?>

<div class="form-actions">
    <?php echo CHtml::htmlButton('<i class="icon-fa-ok"></i>Create', array('class' => 'btn', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>
