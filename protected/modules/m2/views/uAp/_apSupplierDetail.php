<?php

if ($model->po = !null) {
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'u-po-grid',
        'dataProvider' => uPo::model()->apSupplierView($model->id),
        //'filter'=>$model,
        'columns' => array(
            'input_date',
            'system_ref',
            'remark',
            array(
                'header' => 'Total PO',
                'value' => 'Yii::app()->indoFormat->number($data->poSum)',
                'htmlOptions' => array(
                    'style' => 'text-align: right; padding-right: 5px;'
                ),
            ),
            array(
                'header' => 'Total Payment',
                'value' => '(isset($data->ap)) ? Yii::app()->indoFormat->number($data->ap->paymentSum) : ""',
                'htmlOptions' => array(
                    'style' => 'text-align: right; padding-right: 5px;'
                ),
            ),
            array(
                'header' => 'Status',
                'type' => 'raw',
                'value' => '
				CHtml::tag("span", array("class" => "label label-info"), (isset($data->ap) && $data->poSum <= $data->ap->paymentSum) ? "Paid" : "Out Standing")',
            ),
        ),
    ));
} else
    echo "No Purchased Order";
?>