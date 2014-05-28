<div class="page-header">
    <h1><i class="fa fa-table fa-fw"></i>
        User Login History</h1>
</div>

<div class="row">
    <div class="span12">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'yii-log-grid',
            'dataProvider' => sUserHistory::model()->search(Yii::app()->user->id),
            'itemsCssClass' => 'table table-striped',
            'template' => '{items}{pager}',
            'columns' => array(
                'ip_address',
                //array(
                //	'header'=>'Location',
                //	'value'=> '$data->location["region_name"]',
                //),
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