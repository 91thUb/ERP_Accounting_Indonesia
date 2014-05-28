<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
        //array('label'=>'List uAp','url'=>array('index')),
        //array('label'=>'Create uAp','url'=>array('create')),
);

$this->menu5 = array('Purchased Order');

$this->menu1 = uPo::getTopUpdated();
$this->menu2 = uPo::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m2/uPo/index'));
?>


<div class="page-header">
    <h1>Purchased Order: Half Paid</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'New Entry', 'url' => Yii::app()->createUrl('/m2/uPo')),
        array('label' => 'Delivered', 'url' => Yii::app()->createUrl('/m2/uPo/onDelivered')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uPo/onHalfPaid'), 'active' => true),
        array('label' => 'Full Paid', 'url' => Yii::app()->createUrl('/m2/uPo/onPaid')),
    ),
));
?>



<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-ar-grid',
    'dataProvider' => uAp::model()->onHalfPaid(),
    //'filter'=>$model,
    'columns' => array(
        //'entity_id',
        //'periode_date',
        //'ar_type_id',
        array(
            'name' => 'po.system_ref',
            'type' => 'raw',
            'value' => 'CHtml::link($data->po->system_ref,Yii::app()->createUrl("/m2/uAp/view",array("id"=>$data->id)))'
        ),
        'po.input_date',
        //'entity.name',
        array(
            'header' => 'Supplier',
            'name' => 'po.supplier.company_name',
        ),
        //'so.so_type_id',
        //'so.remark',
        'remark',
        array(
            'name' => 'poDetail.amount',
            'value' => 'Yii::app()->indoFormat->number($data->po->poSum)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'header' => 'Total Paid',
            'value' => 'Yii::app()->indoFormat->number($data->paymentSum)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    ),
));
?>

