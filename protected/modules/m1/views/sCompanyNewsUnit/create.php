<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs = array(
    'Company News' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Home', 'url' => array('/m1/sCompanyNewsUnit')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

//$this->menu1 = sCompanyNews::getTopUpdated();
//$this->menu2 = sCompanyNews::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="iconic-article"></i>
        Create
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>