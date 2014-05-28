<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    $model->id,
);


$this->menu = array(
    array('label' => 'AR Dashboard', 'icon' => 'home', 'url' => array('/m2/uAr')),
    array('label' => 'AR Customer', 'icon' => 'home', 'url' => array('/m2/uAr/arCustomer')),
);
?>


<div class="page-header">
    <h1><?php echo $model->so->system_ref; ?></h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'entity.name',
        'so.input_date',
        array(
            'label' => 'Customer',
            'type' => 'raw',
            'value' => CHtml::link($model->so->customer->company_name, Yii::app()->createUrl("/m2/uAr/arCustomerView", array("id" => $model->so->customer_id))),
        ),
        array(
            'name' => 'total_amount',
            'value' => Yii::app()->indoFormat->number($model->total_amount),
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        'remark',
    ),
));
?>

<?php
echo $this->renderPartial('_paymentHistory', array('model' => $model));

if ($model->total_amount > $model->paymentSum)
    echo $this->renderPartial('_formPayment', array('model' => $modelPayment));
?>