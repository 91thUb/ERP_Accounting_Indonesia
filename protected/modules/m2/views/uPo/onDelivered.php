<?php
$this->breadcrumbs = array(
    'U Sos' => array('index'),
    'Manage',
);


$this->menu = array(
        //array('label'=>'Home','icon'=>'home', url'=>array('/m2/uPo')),
);

$this->menu5 = array('Purchased Order');

$this->menu1 = uPo::getTopUpdated();
$this->menu2 = uPo::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m2/uPo/index'));
?>


<div class="page-header">
    <h1>Purchased Order: Delivered</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'New Entry', 'url' => Yii::app()->createUrl('/m2/uPo')),
        array('label' => 'Delivered', 'url' => Yii::app()->createUrl('/m2/uPo/onDelivered'), 'active' => true),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uPo/onHalfPaid')),
        array('label' => 'Full Paid', 'url' => Yii::app()->createUrl('/m2/uPo/onPaid')),
    ),
));
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-so-grid',
    'dataProvider' => uPo::model()->newPo(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'system_ref',
            'type' => 'raw',
            'value' => 'CHtml::link($data->system_ref,Yii::app()->createUrl("/m2/uPo/view",array("id"=>$data->id)))'
        ),
        'input_date',
        //'entity.name',
        array(
            'header' => 'Supplier',
            'name' => 'supplier.company_name',
        ),
        'po_type_id',
        'remark',
        array(
            'name' => 'poDetail.amount',
            'value' => 'Yii::app()->indoFormat->number($data->poSum)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
        ),
    //array(
    //	'header'=>'Status',
    //	'type'=>'raw',
    //	'value'=>'(isset($data->ap)) ? CHtml::tag("span", array("style" => "font-size:inherit", "class" => "label label-info"), "Locked"): ""',
    //),
    ),
));
?>

