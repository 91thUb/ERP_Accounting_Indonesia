<?php
/* @var $this VAdmissionFormController */
/* @var $model vAdmissionForm */

$this->breadcrumbs = array(
    'V Admission Forms' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List vAdmissionForm', 'url' => array('index')),
    array('label' => 'Create vAdmissionForm', 'url' => array('create')),
    array('label' => 'View vAdmissionForm', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage vAdmissionForm', 'url' => array('admin')),
);
?>

<h1>Update vAdmissionForm <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>