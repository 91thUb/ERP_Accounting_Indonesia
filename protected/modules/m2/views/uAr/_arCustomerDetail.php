<?php

if ($model->so = !null) {
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'u-so-grid',
        'dataProvider' => uSo::model()->arCustomerView($model->id),
        //'filter'=>$model,
        'columns' => array(
            'input_date',
            'system_ref',
            'remark',
            array(
                'header' => 'Total SO',
                'value' => 'Yii::app()->indoFormat->number($data->soSum)',
                'htmlOptions' => array(
                    'style' => 'text-align: right; padding-right: 5px;'
                ),
            ),
            array(
                'header' => 'Total Payment',
                'value' => '(isset($data->ar)) ? Yii::app()->indoFormat->number($data->ar->paymentSum) : ""',
                'htmlOptions' => array(
                    'style' => 'text-align: right; padding-right: 5px;'
                ),
            ),
            array(
                'header' => 'Status',
                'type' => 'raw',
                'value' => '
				CHtml::tag("span", array("class" => "label label-info"), (isset($data->ar) && $data->soSum <= $data->ar->paymentSum) ? "Paid" : "Out Standing")',
            ),
        ),
    ));
} else
    echo "No Sales Order";
?>