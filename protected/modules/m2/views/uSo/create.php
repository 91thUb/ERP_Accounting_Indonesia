<?php
$this->breadcrumbs = array(
    'U Sos' => array('index'),
    'Create',
);


$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m2/uSo')),
);


$this->menu1 = uSo::getTopUpdated();
$this->menu2 = uSo::getTopCreated();
?>


<div class="page-header">
    <h1>Create</h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>