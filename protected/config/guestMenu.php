<?php
	$items = array(
		array('label' => 'Home', 'url' => Yii::app()->createUrl('/site/login')),
		array('label' => 'Photo', 'url' => Yii::app()->createUrl('/site/photo')),
		array('label' => 'Learning', 'url' => Yii::app()->createUrl('/site/learning')),
		array('label' => 'Career', 'url' => (Yii::app()->params['webcareer']), 'linkOptions' => array('target' => '_blank', 'style' => 'background-color:#ddeeee')),
	);

	return $items;
?>