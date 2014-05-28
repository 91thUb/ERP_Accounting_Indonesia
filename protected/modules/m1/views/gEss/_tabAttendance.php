<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Attendance Performance</h4>
</div>


<?php
if ($model->getCountAttendance(peterFunc::cBeginDateBefore(date('Y') . date('m'))) == 1) {

    $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $model->attendanceStat(),
        'template' => "{items}",
        'type' => 'condensed',
        'columns' => array(
            array('name' => 'period', 'header' => 'Periode'),
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
            array(
                'class' => 'TbButtonColumn',
                'template' => '{link}',
                'buttons' => array
                    (
                    'link' => array
                        (
                        'label' => 'Link to Attendance',
                        //'icon' => 'icon-ok-circle',
                        'url' => 'Yii::app()->createUrl("/m1/gEss/attendance",array("id"=>$data["id"],"month"=> $data["cmonth"]))',
                        'options' => array(
                            'class' => 'btn btn-mini btn-primary',
                            'style' => 'width:100px'
                        ),
                    ),
                ),
            ),
        ),
    ));
}
?>
<br/>
