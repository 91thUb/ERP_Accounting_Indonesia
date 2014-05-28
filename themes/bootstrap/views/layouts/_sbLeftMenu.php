<?php if (!empty($this->menu5)): ?>

    <br />
    <?php
    $module = (isset($this->module->id)) ? $this->module->id. '/' : '';

    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create New ' . $this->menu5[0],
        'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        //'size'=>'large', // '', 'large', 'small' or 'mini'
        'url' => Yii::app()->createUrl($module . $this->id . '/create'),
        'block' => true,
        'icon' => 'plus',
    ));
    ?>
    <br />

<?php endif; ?>

<ul class="nav nav-list">
    <li class="nav-header"><span class="h-icon-application_side_list">Navigation</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu4,
    'encodeLabel'=>false,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />

<ul class="nav nav-list">
    <li class="nav-header"><span class="h-icon-text_list_bullets">Operation</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />

<ul class="nav nav-list">
    <li class="nav-header"><span class="h-icon-printer">Report</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu1,
    'encodeLabel'=>false,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />

<ul class="nav nav-list">
    <li class="nav-header"><span class="h-icon-tick">Quick List</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu7,
    'encodeLabel'=>false,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />

<?php if (!empty($this->menu8)): ?>

<ul class="nav nav-list">
    <li class="nav-header"><span class="h-icon-tick">News Archived</li>
</ul>
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'list',
    'items' => $this->menu8,
    'encodeLabel'=>false,
    'htmlOptions'=>array(
    	'style'=>'padding:0',
    )
));
?>
<br />

<?php endif; ?>
