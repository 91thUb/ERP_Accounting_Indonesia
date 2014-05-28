<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Yii Log', 'url' => Yii::app()->createUrl('/sAdmin/yiiLog'), 'active' => true),
        array('label' => 'All User History', 'url' => Yii::app()->createUrl('/sAdmin/userHistory')),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>

<div class="page-header">
    <h1><i class="fa fa-table fa-fw"></i>
        Yii Log</h1>
</div>

<div class="row">
    <div class="span12">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'yii-log-grid',
            'dataProvider' => $dataProvider,
            'itemsCssClass' => 'table table-striped table-bordered',
            'template' => '{items}{pager}',
            'columns' => array(
                //array(
                //	'header'=>'Sr #',
                //    'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                //),
                array(
                    'type' => 'raw',
                    'value' => function($data) {
                return CHtml::tag('div', array(), $data["IP_User"])
                        . CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data["user_name"])
                        . CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data["logtime"]);
            }
                ),
                array(
                    'type' => 'raw',
                    'value' => function($data) {
                return CHtml::tag('div', array(), substr($data["request_URL"], 0, 100))
                        . CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), peterFunc::shorten_string($data["message"], 20));
            }
                ),
            ),
        ));
        ?>

    </div>
</div>