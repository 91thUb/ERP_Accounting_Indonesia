<?php
/* @var $this GPerformanceController */
/* @var $model gPerformance */

$this->breadcrumbs = array(
    'G Performances' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List gPerformance', 'url' => array('index')),
    array('label' => 'Create gPerformance', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#g-performance-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage G Performances</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'g-performance-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'parent_id',
        'individual_weight',
        'individual_target',
        'individual_value',
        'superior_value',
        /*
          'superior_weight',
          'remark',
          'created_date',
          'created_by',
          'updated_date',
          'updated_by',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
