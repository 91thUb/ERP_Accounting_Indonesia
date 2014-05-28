<?php
/* @var $this VAdmissionFormController */
/* @var $model vAdmissionForm */

$this->breadcrumbs = array(
    'Admission Forms' => array('index'),
    'Index',
);

$this->menu = array(
        //array('label'=>'List vAdmissionForm', 'url'=>array('index')),
        //array('label'=>'Create vAdmissionForm', 'url'=>array('create')),
);

$this->menu5 = array('Admission Sales');

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#v-admission-form-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
    <h1>Admission Form</h1>
</div>



<?php
$this->widget('TbGridView', array(
    'id' => 'v-admission-form-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'form_number',
        'buyer_name',
        'phone',
        'email',
    //'status_id',
    /*
      'remarks',
      'created_date',
      'created_by',
      'updated_date',
      'updated_by',
     */
    //array(
    //	'class'=>'TbButtonColumn',
    //),
    ),
));
?>
