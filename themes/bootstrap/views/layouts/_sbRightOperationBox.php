<?php if (!empty($this->menu9) && (!Yii::app()->user->isGuest)): ?>

    <?php
    $this->renderPartial('/layouts/_search', array('model' => $this->menu9['model'], 'action' => $this->menu9['action']));
    ?>

<?php endif; ?>


<?php if (!empty($this->menu5) && (!Yii::app()->user->isGuest)): ?>	


    <?php
    $_module = (isset($this->module->id)) ? $this->module->id : "";
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create New ' . $this->menu5[0],
        'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        //'size'=>'large', // '', 'large', 'small' or 'mini'
        //'url'=>Yii::app()->createUrl($this->id.'/create'),	
        'url' => Yii::app()->createUrl($_module . '/' . $this->id . '/create'),
        'block' => true,
        'icon' => 'plus',
    ));
    ?>
    <br/>

<?php endif; ?>		 

<?php
if (!empty($this->menu)) {    
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Operation',
        'headerIcon' => 'icon-wrench',
    ));

    $this->widget('bootstrap.widgets.TbMenu', array(
        'type' => 'list',
        'items' => $this->menu,
		'htmlOptions'=>array(
			'style'=>'padding:0',
		)
    ));

    $this->endWidget();
}
?>

<?php
if (!empty($this->menu1)) {    
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Recently Updated',
        'headerIcon' => 'icon-circle-arrow-up',
    ));

    $this->widget('bootstrap.widgets.TbMenu', array(
        'type' => 'list',
        'items' => $this->menu1,
		'htmlOptions'=>array(
			'style'=>'padding:0',
		)
    ));

    $this->endWidget();
}
?>

<?php
if (!empty($this->menu2)) {    
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Recently Added',
        'headerIcon' => 'icon-circle-arrow-up',
    ));

    $this->widget('bootstrap.widgets.TbMenu', array(
        'type' => 'list',
        'items' => $this->menu2,
		'htmlOptions'=>array(
			'style'=>'padding:0',
		)
    ));

    $this->endWidget();
}
?>

<?php 
if (!empty($this->menu3)) {    
   $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Related',
        'headerIcon' => 'icon-refresh',
    ));

    $this->widget('bootstrap.widgets.TbMenu', array(
        'type' => 'list',
        'items' => $this->menu3,
		'htmlOptions'=>array(
			'style'=>'padding:0',
		)
    ));

    $this->endWidget();
}
?>

<?php
if (!empty($this->menu4)) {    
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => 'Other Menu',
        'headerIcon' => 'icon-star-empty',
    ));

    $this->widget('bootstrap.widgets.TbMenu', array(
        'type' => 'list',
        'items' => $this->menu4,
		'htmlOptions'=>array(
			'style'=>'padding:0',
		)
    ));

    $this->endWidget();
}
?>
