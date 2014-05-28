<?php
$this->breadcrumbs = array(
    'Attendance',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gAttendance')),
    array('label' => 'Schedule Upload', 'icon' => 'calendar', 'url' => array('timeBlock')),
    //array('label' => 'Attendant Upload', 'icon' => 'user', 'url' => array('attendBlock')),
    array('label' => 'Parameter Time Block', 'icon' => 'wrench', 'url' => array('paramTimeblock')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-key fa-fw"></i>
        Real Attendant Upload
    </h1>
</div>

<?php
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
    <p>File name must be: attendant.xls (MS Office 2005 format)</p>
    <p>File size must be less than 5 MB</p>
</div>
