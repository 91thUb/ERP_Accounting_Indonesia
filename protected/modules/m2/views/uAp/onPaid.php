<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'AP Supplier', 'icon' => 'home', 'url' => array('/m2/uAp/apSupplier')),
);
?>


<div class="page-header">
    <h1>Account Payable: Paid / Posting</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Unpaid. New Purchased Order', 'url' => Yii::app()->createUrl('/m2/uAp')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uAp/onHalfPaid')),
        array('label' => 'Paid. Post to GL', 'url' => Yii::app()->createUrl('/m2/uAp/onPaid'), 'active' => true),
        array('label' => 'Recent AP', 'url' => Yii::app()->createUrl('/m2/uAp/onRecent')),
    ),
));
?>



<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'u-ar-grid',
    'dataProvider' => uAp::model()->onPaid(),
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
            'type' => 'raw',
            'value' => 'CHtml::link($data->po->supplier->company_name,Yii::app()->createUrl("/m2/uAp/apSupplier",array("id"=>$data->po->supplier_id)))',
        ),
        //'po.po_type_id',
        //'po.remark',
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
					CHtml::link("Post to GL",Yii::app()->createUrl("/m2/uAp/createJournal",array("id"=>$data->id)),array("class"=>"btn btn-mini btn-primary")) : 
		            CHtml::tag("span", array("class" => "label label-info"), "Posted");
			',
        )
    ),
));
?>

