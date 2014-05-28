<?php
$this->breadcrumbs = array(
    'G Cutis' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Home', 'url' => array('/m1/gPermission')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
        //array('label'=>'Manage gPerson','url'=>array('admin')),
);

//$this->menu1=gPermission::getTopUpdated();
//$this->menu2=gPermission::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-medkit fa-fw"></i>
        Create Permission
    </h1>
</div>


<?php
echo $this->renderPartial('_formWithEmp', array('model' => $model));
