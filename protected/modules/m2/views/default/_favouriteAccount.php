<h3>Favourite Account <small><?php echo "Period: " . Yii::app()->settings->get("System", "cCurrentPeriod") ?> </small>
</h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 't-account-balance-grid',
    'dataProvider' => tBalanceSheet::model()->searchFavouriteAccount(Yii::app()->settings->get("System", "cCurrentPeriod")),
    'template' => '{pager}{items}{pager}',
    'itemsCssClass' => 'table table-condensed ',
    'columns' => array(
        array(
            'name' => 'Account Type',
            'type' => 'raw',
            'value' => function ($data) {
        return
                CHtml::link($data['account_name'], Yii::app()->createUrl("/m2/tAccount/view", array("id" => $data['parent_id'])))
        ;
    },
        ),
        array(
            'header' => 'Begin',
            'value' => 'Yii::app()->indoFormat->number($data["beginning_balance"])',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'name' => 'debit',
            'value' => 'Yii::app()->indoFormat->number($data["debit"])',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'name' => 'credit',
            'value' => 'Yii::app()->indoFormat->number($data["credit"])',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
        array(
            'header' => 'End',
            'value' => 'Yii::app()->indoFormat->number($data["end_balance"])',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    //'created_date',
    //'user_remark',
    ),
));
?>

<br />
