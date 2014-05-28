<?php

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => array(
        array('label' => 'HOME'),
        array('label' => 'Main Dashboard', 'icon' => 'leaf', 'url' => Yii::app()->createUrl("/m2/default")),
        array('label' => 'HISTORY'),
        array('label' => 'Trial Balance History', 'icon' => 'th-large', 'url' => Yii::app()->createUrl("#")),
    ),
));
?>
