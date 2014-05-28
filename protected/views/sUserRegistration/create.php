<?php
/* @var $this SUserRegistrationController */
/* @var $model sUserRegistration */

$this->breadcrumbs = array(
    'S User Registrations' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/sUserRegistration')),
);
?>

<div class="page-header">
    <h1><i class="fa fa-user fa-fw"></i>Create</h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>