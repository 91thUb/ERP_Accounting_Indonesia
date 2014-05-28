<?php
/* @var $this SUserRegistrationController */
/* @var $model sUserRegistration */

$this->breadcrumbs = array(
    'User Registration' => array('index'),
);

$this->menu5 = array('User Registration');
?>

<div class="page-header">
    <h1><i class="fa fa-user fa-fw"></i>User Registration List</h1>
</div>

<?php
$this->widget('ext.bootstrap.widgets.TbGridView', array(
    'id' => 's-user-registration-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'activation_code',
        'email',
        //'password',
        'status.name',
        array(
            'class' => 'TbButtonColumn',
        ),
        'module_name',
        array(
            'header' => 'Registration Time',
            'value' => 'waktu::nicetime($data->registration_date)',
            'filter' => false,
        ),
        array(
            'type' => 'raw',
            'value' => '(isset($data->applicant)) ? 
						CHtml::link($data->applicant->applicant_name,Yii::app()->createUrl("m1/hApplicant/view",array("id"=>$data->id))) : ""',
            'header' => 'Applicant',
        ),
    ),
));
?>
