
<?php
$this->breadcrumbs = array(
    'Print List Journal',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m2/tAccount')),
);
?>

<div class="page-header">
    <h1>
        Print List Journal
    </h1>
</div>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'allocation-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model, 'account_no_id', tAccount::item(), array('class' => 'span5')); ?>

<?php //echo $form->textFieldRow($model, 'begindate'); ?>
<?php //echo $form->textFieldRow($model, 'enddate'); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'begindate', array('class' => 'control-label')); ?>

    <div class="controls">

        <?php
        $this->widget('ext.EJuiMonthPicker.EJuiMonthPicker', array(
            'model' => $model,
            'attribute' => 'begindate',
            'options' => array(
                'yearRange' => '-5:+0',
                'dateFormat' => 'yymm',
            ),
                //'htmlOptions'=>array(
                //    'onChange'=>'js:doSomething()',
                //),
        ));
        ?>
    </div>
</div>

<?php
echo $form->dropDownListRow($model, 'type_report_id', array(
    '1' => 'Summary Style',
    '2' => 'Detail Style',
));

//echo $form->dropDownListRow($model, 'post_id', sParameter::items("cStatus", 2));
?>

<div class="form-actions">
    <?php echo CHtml::htmlButton('<i class="icon-fa-ok"></i>Report', array('class' => 'btn', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>
