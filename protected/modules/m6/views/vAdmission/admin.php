<?php
$this->breadcrumbs = array(
    'V Admissions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List vAdmission', 'url' => array('index')),
    array('label' => 'Create vAdmission', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('v-admission-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage V Admissions</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'v-admission-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'student_name',
        'birth_place',
        'birth_date',
        'gender_id',
        'address1',
        /*
          'home_phone',
          'handphone',
          'email',
          'faculty_id',
          'major_id',
          'remark',
          'created_date',
          'created_by',
          'updated_date',
          'updated_by',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
