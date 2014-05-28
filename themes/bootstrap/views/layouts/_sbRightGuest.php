<?php

$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Navigation',
    'headerIcon' => 'icon-wrench',
));

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => array(
        array('label' => 'Home', 'url' => Yii::app()->createUrl('/site/login'), 'visible' => Yii::app()->user->isGuest),
        array('label' => 'Home', 'url' => Yii::app()->createUrl('/menu'), 'visible' => !Yii::app()->user->isGuest),
    //array('label'=>'Photo Gallery', 'url'=>Yii::app()->createUrl('/sGallery'),'visible'=>Yii::app()->user->isGuest),
    ),
));

$this->endWidget();
?>

<?php /*

  <?php
  $this->beginWidget('bootstrap.widgets.TbBox', array(
  'title' => 'Company News',
  'headerIcon' => 'icon-circle-arrow-up',
  ));

  $this->widget('bootstrap.widgets.TbMenu', array(
  'type'=>'list',
  'items'=>$this->menu1,
  ));

  $this->endWidget();
  ?>



  <?php
  $this->beginWidget('bootstrap.widgets.TbBox', array(
  'title' => 'Public Documents',
  'headerIcon' => 'icon-circle-arrow-up',
  ));

  $this->widget('bootstrap.widgets.TbMenu', array(
  'type'=>'list',
  'items'=>$this->menu2,
  ));

  $this->endWidget();
  ?>


  <?php
  $this->beginWidget('bootstrap.widgets.TbBox', array(
  'title' => 'Photo Gallery',
  'headerIcon' => 'icon-circle-arrow-up',
  ));

  $this->widget('bootstrap.widgets.TbMenu', array(
  'type'=>'list',
  'items'=>$this->menu3,
  ));

  $this->endWidget();
  ?>

 */ ?>


