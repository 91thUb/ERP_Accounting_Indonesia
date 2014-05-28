<?php
$this->breadcrumbs = array(
    'Recruitment Report',
);

$this->menu4 = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gAttendance')),
);

$this->menu = array(
    //array('label'=>'Report', 'icon'=>'print', 'url'=>array('report')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<div class="page-header">

    <h1>
        <i class="fa fa-suitcase fa-fw"></i>
        Attendance Report
    </h1>

</div>



<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'allocation-form',
    'enableAjaxValidation' => false, 'type' => 'horizontal',
        ));
?>


<?php echo $form->errorSummary($model); ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'period', array('class' => 'control-label')); ?>

    <div class="controls">

        <?php
        $this->widget('ext.EJuiMonthPicker.EJuiMonthPicker', array(
            'model' => $model,
            'attribute' => 'period',
            'options' => array(
                'yearRange' => '-5:+0',
                'dateFormat' => 'yymm',
            ),
            'htmlOptions' => array(
                'value' => '201404',
            ),
                //'htmlOptions'=>array(
                //    'onChange'=>'js:doSomething()',
                //),
        ));
        ?>
    </div>
</div>

<?php
echo $form->dropDownListRow($model, 'report_id', array(
    '1' => '1. Attendance Report by Dept',
        //'2'=>'2. Summary Psycho Test Report',
        //'3'=>'3. Summary HR Interview Report',
        //'4'=>'4. Summary User Interview Report',
        //'5'=>'5. Summary Candidate Source Report',
        //'6'=>'6. Report 6',
        ), array(
    'class' => 'span4',
));
?>

<div class="form-actions">
    <?php echo CHtml::htmlButton('<i class="fa fa-print fa-fw"></i>Report', array('class' => 'btn', 'type' => 'submit')); ?>
</div>


<?php
$this->endWidget();

