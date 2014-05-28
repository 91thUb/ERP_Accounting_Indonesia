<?php

$this->widget('ext.bootstrap.widgets.TbAlert', array(
    'id' => 'alert',
    //'keys'=>array('success','info','warning','error'),
    //'options'=>array(
    //'displayTime'=>5000,
    //'closeTime'=>350,
    //		'closeText'=>'x',
    //),
    'block' => true, // display a larger alert block?
    'fade' => true, // use transitions?
    'closeText' => '&times;', // close link text - if set to false, no close link is displayed
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        'info' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
        'error' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
    ),
));
?>
