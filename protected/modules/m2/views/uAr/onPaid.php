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
    <h1>Account Receivable: Paid / Posting</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Unpaid. New Sales Order', 'url' => Yii::app()->createUrl('/m2/uAr')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uAr/onHalfPaid')),
        array('label' => 'Paid. Post to GL', 'url' => Yii::app()->createUrl('/m2/uAr/onPaid'), 'active' => true),
        array('label' => 'Recent AR', 'url' => Yii::app()->createUrl('/m2/uAr/onRecent')),
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
            'value' => 'CHtml::link($data->so->system_ref,Yii::app()->createUrl("/m2/uAr/view",array("id"=>$data->id)))'
        ),
        'so.input_date',
        //'entity.name',
        array(
            'header' => 'Customer',
            'type' => 'raw',
            'value' => 'CHtml::link($data->so->customer->company_name,Yii::app()->createUrl("/m2/uAr/arCustomerView",array("id"=>$data->so->customer_id)))',
        ),
        //'so.so_type_id',
        //'so.remark',
        'remark',
        array(
            'name' => 'total_amount',
            'value' => 'Yii::app()->indoFormat->number($data->total_amount)',
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
        array(
            'type' => 'raw',
            'value' => '($data->journal_state_id == 1) ?
					CHtml::link("Post to GL",Yii::app()->createUrl("/m2/uAr/createJournal",array("id"=>$data->id)),array("class"=>"btn btn-mini btn-primary")) : 
		            CHtml::tag("span", array("class" => "label label-info"), "Posted");
			',
        )
    ),
));
?>

