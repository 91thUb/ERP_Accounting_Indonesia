<h4>Payment History</h4>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 't-account-balance-grid',
    'dataProvider' => uArPayment::model()->search($model->id),
    'template' => '{items}{pager}',
    'itemsCssClass' => 'table table-striped table-bordered',
    'columns' => array(
        'payment_date',
        array(
            'header' => 'No Ref',
            'value' => '$data->payment_ref',
        ),
        array(
            'header' => 'Payment Type',
            'value' => '($data->payment_type_id == 1) ? "Cash" : "Cheque/Giro"',
        ),
        array(
            'header' => 'Payment Target',
            'value' => '$data->payment_target->account_concat',
        ),
        array(
            'header' => 'Effective Date',
            'value' => '$data->effective_date',
        ),
        array(
            'class' => 'ext.gridcolumns.TotalColumn',
            'name' => 'amount',
            'output' => 'Yii::app()->indoFormat->number($value)',
            'type' => 'raw',
            'footer' => true,
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
            'footerHtmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px; font-weight:bold'
            ),
        ),
    ),
));
?>


