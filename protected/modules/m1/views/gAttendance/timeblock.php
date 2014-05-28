<?php
$this->breadcrumbs = array(
    'Attendance',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gAttendance')),
    //array('label' => 'Schedule Upload', 'icon' => 'calendar', 'url' => array('timeBlock')),
    array('label' => 'Attendant Upload', 'icon' => 'user', 'url' => array('attendBlock')),
    array('label' => 'Parameter Time Block', 'icon' => 'wrench', 'url' => array('paramTimeblock')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-key fa-fw"></i>
        Schedule Import
    </h1>
</div>

<?php
if (!isset($gridDataProvider)) {

    $form = $this->beginWidget(
            'CActiveForm', array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )
    );
    echo $form->labelEx($model, 'picture');
    echo $form->fileField($model, 'picture');
    echo $form->error($model, 'picture');
    echo CHtml::submitButton('Submit');
    $this->endWidget();
    ?>	
    <div class="alert alert-warning">
        <h4 class="alert-heading">Attention!!</h4>
        <p>File name must be: schedule.xls (MS Office 2005 format)</p>
        <p>File size must be less than 5 MB</p>
    </div>
    <?php
} else {
    echo CHtml::link('Save to Database', Yii::app()->createUrl('/m1/gAttendance/timeblockSave'), array('class' => 'btn btn-large'));
    echo CHtml::link('Delete Temp File', Yii::app()->createUrl('/m1/gAttendance/deleteTempFile'), array('class' => 'btn btn-large'));

    $this->widget('bootstrap.widgets.TbGridView', array(
        'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}{pager}",
        'columns' => $headers,
    ));
}

//echo sUser::getMyGroup() 
?>
