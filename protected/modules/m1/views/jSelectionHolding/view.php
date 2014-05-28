<?php
/* @var $this JSelectionController */
/* @var $model jSelection */

$this->breadcrumbs = array(
    'J Selections' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/jSelectionHolding')),
    array('label' => 'Update', 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete', 'icon' => 'trash-o', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-tasks fa-fw"></i>
        <?php echo $model->category->name; ?></h1>
</div>

<?php
$this->widget('TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'pic',
        array(
            'label' => 'Category',
            'name' => 'category.name',
        ),
        'schedule_date',
        'additional_info',
        //'cost',
        array(
            'label' => 'Status',
            'name' => 'status.name',
        ),
    ),
));
?>

<?php
if ($model->category_id == 1) {
    echo $this->renderPartial('_formParticipant', array('model' => $modelParticipant));

    $this->widget('bootstrap.widgets.TbTabs', array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'id' => 'tabs',
        'tabs' => array(
            array('id' => 'tab1', 'label' => 'Detail', 'content' => $this->renderPartial("_tabViewDetail", array("model" => $model), true), 'active' => true),
        ),
    ));
} else {
    echo $this->renderPartial('_formEmployee', array('model' => $modelParticipant));

    $this->widget('bootstrap.widgets.TbTabs', array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'id' => 'tabs',
        'tabs' => array(
            array('id' => 'tab1', 'label' => 'Detail', 'content' => $this->renderPartial("_tabViewDetailEmp", array("model" => $model), true), 'active' => true),
            array('id' => 'tab2', 'label' => 'Assessment', 'content' => $this->renderPartial("_tabViewAssessmentEmp", array("model" => $model), true)),
        ),
    ));
}
?>


