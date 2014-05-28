<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'AP Dashboard', 'icon' => 'home', 'url' => array('/m2/uAp')),
);
?>


<div class="page-header">
    <h1>AP per Supplier</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-so-grid',
    'dataProvider' => uSupplier::model()->apSupplier(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'company_name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->company_name,Yii::app()->createUrl("/m2/uAp/apSupplierView",array("id"=>$data->id)))',
        ),
        'pic',
        'telephone',
        array(
            'header' => 'Total Puchased',
            'value' => 'Yii::app()->indoFormat->number($data->po)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'header' => 'Total Payment',
            'value' => 'Yii::app()->indoFormat->number($data->poPayment)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'header' => 'Balance',
            'value' => 'Yii::app()->indoFormat->number($data->po - $data->poPayment)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    ),
));
?>

