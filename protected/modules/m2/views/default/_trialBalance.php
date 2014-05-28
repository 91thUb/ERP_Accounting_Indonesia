<h3>TRIAL BALANCE <small><?php echo "Period: " . Yii::app()->settings->get("System", "cCurrentPeriod") ?> </small>
</h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 't-account-balance-grid',
    'dataProvider' => tBalanceSheet::model()->searchTrialBalance(Yii::app()->settings->get("System", "cCurrentPeriod")),
    'template' => '{pager}{items}{pager}',
    'itemsCssClass' => 'table table-striped table-bordered',
    'columns' => array(
        array(
            'name' => 'Account Type',
            'type' => 'raw',
            'value' => function ($data) {
        return $data->account->cRoot . "<br/>" .
                CHtml::tag("div", array("style" => "color: #999; font-size: 11px"), $data->account->getparent->account_concat)
        ;
    },
        ),
        array(
            'name' => 'account.account_name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->account->account_concat,Yii::app()->createUrl("/m2/tAccount/view",array("id"=>$data->parent_id)))',
        ),
        array(
            'name' => 'beginning_balance',
            'value' => 'Yii::app()->indoFormat->number($data->beginning_balance)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'name' => 'debit',
            'value' => 'Yii::app()->indoFormat->number($data->debit)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'name' => 'credit',
            'value' => 'Yii::app()->indoFormat->number($data->credit)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'name' => 'end_balance',
            'value' => 'Yii::app()->indoFormat->number($data->end_balance)',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    //'user_remark',
    ),
));
?>

<br />
