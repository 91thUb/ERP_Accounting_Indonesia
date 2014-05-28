<div class="row">
    <div class="span12">
        <?php
        //$this->widget('bootstrap.widgets.TbDetailView', array(
        $this->widget('ext.XDetailView', array(
            'ItemColumns' => 1,
            'data' => array(
                'id' => 1,
                'joindate' => $model->companyfirst->start_date,
                'balance' => (isset($model->leaveBalance)) ? $model->leaveBalance->balance : 0,
            ),
            'attributes' => array(
                array('name' => 'joindate', 'label' => 'Join Date'),
                array('name' => 'balance', 'label' => 'Balance'),
                array('value' => (isset($model->leaveBalance)) ? $model->leaveBalance->start_date . " (" . waktu::nicetime(strtotime($model->leaveBalance->start_date)) . ")" : 0, 'label' => 'Last Leave'),
                array('value' => (isset($model->lastLeave)) ? $model->lastLeave->leave_reason . " (" . $model->lastLeave->number_of_day . " days)" : '', 'label' => 'Last Leave Reason'),
            ),
        ));
        ?>
    </div>
</div>

