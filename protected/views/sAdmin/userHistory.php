<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Yii Log', 'url' => Yii::app()->createUrl('/sAdmin/yiiLog')),
        array('label' => 'All User History', 'url' => Yii::app()->createUrl('/sAdmin/userHistory'), 'active' => true),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>


<div class="page-header">
    <h1><i class="fa fa-table fa-fw"></i>
        User Login History</h1>
</div>

<div class="row">
    <div class="span12">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'yii-log-grid',
            'dataProvider' => sUserHistory::model()->searchAll(),
            'itemsCssClass' => 'table table-striped',
            'template' => '{items}{pager}',
            'columns' => array(
                array(
                    'header' => 'User Name',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->user->username,Yii::app()->createUrl("/sUser/view",array("id"=>$data->user_id)))',
                ),
                array(
                    'header' => 'Default Entity',
                    'value' => '$data->user->organization->name',
                ),
                'ip_address',
                array(
                    'header' => 'Location',
                    'value' => '$data->location["region_name"]',
                ),
                array(
                    'name' => 'log_time',
                    'value' => 'waktu::nicetime($data->log_time)',
                ),
                'browser_name'
            ),
        ));
        ?>

    </div>
</div>