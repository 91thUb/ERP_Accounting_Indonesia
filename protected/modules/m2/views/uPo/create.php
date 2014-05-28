<?php
$this->breadcrumbs = array(
    'U Pos' => array('index'),
    'Create',
);


$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m2/uPo')),
);


$this->menu1 = uPo::getTopUpdated();
$this->menu2 = uPo::getTopCreated();
?>


<div class="page-header">
    <h1>Create</h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>