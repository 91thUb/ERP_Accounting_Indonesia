<?php
$this->breadcrumbs = array(
    'V Admissions' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);


$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m6/vAdmission')),
    array('label' => 'View', 'icon' => 'edit', 'url' => array('view', 'id' => $model->id)),
        //array('label' => 'Print Profile', 'icon' => 'print', 'url' => array('printProfile', 'id' => $model->id)),
        //array('label' => 'Delete', 'icon' => 'trash-o', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);


//$this->menu1 = gPerson::getTopUpdated();
//$this->menu2 = gPerson::getTopCreated();
//$this->menu3 = gPerson::getTopRelated($model->employee_name);
$this->menu5 = array('Admission');

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gPerson/index'), 'field_name' => 'employee_name');
//$this->message="Testing Message";
?>


<div class="page-header">
    <h1>Update</h1>
</div>


<?php echo $this->renderPartial('_form', array('model' => $model)); ?>