<?php
/* @var $this JSelectionController */
/* @var $model jSelection */

$this->breadcrumbs = array(
    'J Selections' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-tasks fa-fw"></i>
        Create</h1>
</div>

<?php
echo $this->renderPartial('_form', array('model' => $model));
