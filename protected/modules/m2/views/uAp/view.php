<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    $model->id,
);


$this->menu = array(
    array('label' => 'AP Dashboard', 'icon' => 'home', 'url' => array('/m2/uAp')),
    array('label' => 'AP Supplier', 'icon' => 'home', 'url' => array('/m2/uAp/apSupplier')),
);
?>


<div class="page-header">
    <h1><?php echo $model->po->system_ref; ?></h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'entity.name',
        'so.input_date',
        array(
            'label' => 'Supplier',
            'type' => 'raw',
            'value' => CHtml::link($model->po->supplier->company_name, Yii::app()->createUrl("/m2/uAp/apSupplier", array("id" => $model->po->supplier_id))),
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