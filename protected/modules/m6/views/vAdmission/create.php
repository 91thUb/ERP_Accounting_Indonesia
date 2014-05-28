<?php
$this->breadcrumbs = array(
    'V Admissions' => array('index'),
    'Create',
);


$this->menu = array(
    array('icon' => 'home', 'label' => 'Home', 'url' => array('/m6/vAdmission')),
);
?>


<div class="page-header">
    <h1>Create</h1>
</div>


<?php echo $this->renderPartial('_form', array('model' => $model)); ?>