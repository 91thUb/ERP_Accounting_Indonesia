<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'AR Dashboard', 'icon' => 'home', 'url' => array('/m2/uAr')),
);
?>


<div class="page-header">
    <h1>AR per Customer</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-so-grid',
    'dataProvider' => uCustomer::model()->arCustomer(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'company_name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->company_name,Yii::app()->createUrl("/m2/uAr/arCustomerView",array("id"=>$data->id)))',
        ),
        'pic',
        'telephone',
        array(
            'header' => 'Total Sales',
            'value' => 'Yii::app()->indoFormat->number($data->so)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'header' => 'Total Payment',
            'value' => 'Yii::app()->indoFormat->number($data->soPayment)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'header' => 'Balance',
            'value' => 'Yii::app()->indoFormat->number($data->so - $data->soPayment)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    ),
));
?>

