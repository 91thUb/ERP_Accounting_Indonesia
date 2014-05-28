<?php
$this->breadcrumbs = array(
    'Search',
);

$this->menu = array(
    array('label' => 'Home', 'url' => array('/m1/gBiPerson')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-bar-chart-o fa-fw"></i>
        Searching...
    </h1>
</div>

<?php
echo $this->renderPartial('/gBiPerson/_mainContent', array("model" => $model, "dataProvider" => $dataProvider, 'field' => $field, 'production' => $production, 'sql' => $sql));
?>