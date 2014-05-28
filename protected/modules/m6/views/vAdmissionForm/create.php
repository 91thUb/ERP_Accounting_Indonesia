<?php
/* @var $this VAdmissionFormController */
/* @var $model vAdmissionForm */

$this->breadcrumbs = array(
    'V Admission Forms' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('index')),
);
?>

<div class="page-header">
    <h1>
        <i class="icon-fa-book"></i>
        Create
    </h1>
</div>



<?php $this->renderPartial('_form', array('model' => $model)); ?>