<?php
$this->breadcrumbs = array(
    'U Sos' => array('index'),
    'Manage',
);


$this->menu = array(
        //array('label'=>'Home','icon'=>'home', url'=>array('/m2/uSo')),
);

$this->menu5 = array('Sales Order');

$this->menu1 = uSo::getTopUpdated();
$this->menu2 = uSo::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m2/uSo/index'));
?>


<div class="page-header">
    <h1>Sales Order</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'New Entry', 'url' => Yii::app()->createUrl('/m2/uSo'), 'active' => true),
        array('label' => 'Delivered', 'url' => Yii::app()->createUrl('/m2/uSo/onDelivered')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uSo/onHalfPaid')),
        array('label' => 'Full Paid', 'url' => Yii::app()->createUrl('/m2/uSo/onPaid')),
    ),
));
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-so-grid',
    'dataProvider' => uSo::model()->newEntry(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'system_ref',
            'type' => 'raw',
            'value' => 'CHtml::link($data->system_ref,Yii::app()->createUrl("/m2/uSo/view",array("id"=>$data->id)))'
        ),
        'input_date',
        //'entity.name',
        array(
            'header' => 'Customer',
            'name' => 'customer.company_name',
        ),
        'so_type_id',
        'remark',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
        ),
        array(
            'header' => 'Status',
            'type' => 'raw',
            'value' => '(isset($data->ar)) ? CHtml::tag("span", array("style" => "font-size:inherit", "class" => "label label-info"), "Locked"): ""',
        ),
        array(
            'name' => 'soDetail.amount',
            'value' => 'Yii::app()->indoFormat->number($data->soSum)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'type' => 'raw',
            'value' => '($data->state_id == 1) ?
					CHtml::link("Mark as Delivered",Yii::app()->createUrl("/m2/uSo/toDelivered",array("id"=>$data->id)),array("class"=>"btn btn-mini btn-primary")) : 
		            CHtml::tag("span", array("class" => "label label-info"), "Delivered");
			',
        )
    ),
));
?>

