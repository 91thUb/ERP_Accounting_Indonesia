<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => gAttendance::model()->lateList(),
    'template' => "{items}",
    'type' => 'condensed',
    'columns' => array(
        array(
            'value' => 'CHtml::link($data["employee_name"],Yii::app()->createUrl("/m1/gAttendance/view",array("id"=>$data["id"])))',
            'type' => 'raw',
            'header' => 'Employee Name',
        ),
        array('name' => 'workhour', 'header' => 'Jam Kerja (**TODO**)'),
        array('name' => 'cuti', 'header' => 'Cuti'),
        array('name' => 'alpha', 'header' => 'Alpha'),
        array('name' => 'lateIn', 'header' => 'Terlambat'),
        array('name' => 'lateInCount', 'header' => 'Menit'),
        array('name' => 'earlyOut', 'header' => 'Pulang Cepat'),
        array('name' => 'earlyOutCount', 'header' => 'Menit'),
        array('name' => 'tad', 'header' => 'TAD'),
        array('name' => 'tap', 'header' => 'TAP'),
        array('name' => 'sakit', 'header' => 'Sakit'),
        array('name' => 'special', 'header' => 'Khusus'),
    ),
));
?>