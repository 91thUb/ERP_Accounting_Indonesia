<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'AR Customer', 'icon' => 'home', 'url' => array('/m2/uAr/arCustomer')),
);
?>


<div class="page-header">
    <h1>Account Receivable</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Unpaid. New Sales Order', 'url' => Yii::app()->createUrl('/m2/uAr'), 'active' => true),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uAr/onHalfPaid')),
        array('label' => 'Paid. Post to GL', 'url' => Yii::app()->createUrl('/m2/uAr/onPaid')),
        array('label' => 'Recent AR', 'url' => Yii::app()->createUrl('/m2/uAr/onRecent')),
    ),
));
?>



<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-so-grid',
    'dataProvider' => uSo::model()->newSo(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'system_ref',
            'type' => 'raw',
            'value' => 'CHtml::link( (!isset($data->ar)) ? $data->system_ref. " (new)" : $data->system_ref,Yii::app()->createUrl("/m2/uAr/view",array("id"=>$data->id)))'
        ),
        'input_date',
        //'entity.name',
        array(
            'header' => 'Customer',
            'type' => 'raw',
            'value' => 'CHtml::link($data->customer->company_name,Yii::app()->createUrl("/m2/uAr/arCustomerView",array("id"=>$data->customer_id)))',
        ),
        'so_type_id',
        'remark',
        array(
            'name' => 'soDetail.amount',
            'value' => 'Yii::app()->indoFormat->number($data->soSum)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    /*
      array(
      'header'=>'Check Total',
      'name'=>'total_amount',
      'value' => 'Yii::app()->indoFormat->number($data->ar->total_amount)',
      'htmlOptions' => array(
      'style' => 'text-align: right; padding-right: 5px;'
      ),
      ),
     */
    //array(
    //	'class'=>'bootstrap.widgets.TbButtonColumn',
    //	'template'=>'{delete}',
    //),
    ),
));
?>

