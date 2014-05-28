<?php
Yii::import('ext.EJuiTooltip', true);
$this->widget('EJuiTooltip', array('selector' => '.tooltip'));
?>

<ul style="padding:0" class="nav nav-list">
    <li class="nav-header"><span class="h-icon-text_list_bullets">Operation</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu10,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />

<ul style="padding:0" class="nav nav-list">
    <li class="nav-header"><span class="h-icon-application_side_list">Filter By</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu7,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />


