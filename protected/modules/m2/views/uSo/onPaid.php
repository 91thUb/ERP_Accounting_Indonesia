<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
        //array('label'=>'List uAr','url'=>array('index')),
);

$this->menu5 = array('Sales Order');

$this->menu1 = uSo::getTopUpdated();
$this->menu2 = uSo::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m2/uSo/index'));
?>


<div class="page-header">
    <h1>Sales Order: Paid</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'New Entry', 'url' => Yii::app()->createUrl('/m2/uSo')),
        array('label' => 'Delivered', 'url' => Yii::app()->createUrl('/m2/uSo/onDelivered')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uSo/onHalfPaid')),
        array('label' => 'Full Paid', 'url' => Yii::app()->createUrl('/m2/uSo/onPaid'), 'active' => true),
    ),
));
?>



<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-ar-grid',
    'dataProvider' => uAr::model()->onPaid(),
    //'filter'=>$model,
    'columns' => array(
        //'entity_id',
        //'periode_date',
        //'ar_type_id',
        array(
            'name' => 'so.system_ref',
            'type' => 'raw',
            'value' => 'CHtml::link($data->so->system_ref,Yii::app()->createUrl("/m2/uSo/view",array("id"=>$data->id)))'
        ),
        'so.input_date',
        //'entity.name',
        array(
            'header' => 'Customer',
            'name' => 'so.customer.company_name',
        ),
        //'so.so_type_id',
        'remark',
        array(
            'name' => 'soDetail.amount',
            'value' => 'Yii::app()->indoFormat->number($data->so->soSum)',
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

