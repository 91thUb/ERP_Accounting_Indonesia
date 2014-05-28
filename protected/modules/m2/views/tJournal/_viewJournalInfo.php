<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    //$this->widget('ext.XDetailView', array(
    //		'ItemColumns' => 3,
    'data' => array(
        'id' => 1,
        'entity_id' => $data->entity->name,
        'input_date' => $data->input_date,
        'yearmonth_periode' => $data->yearmonth_periode,
        'module' => $data->module->name,
        'user_ref' => $data->user_ref,
        'total' => Yii::app()->indoFormat->number($data->journalSum),
        'created' => $data->created->username,
        'posted' => (isset($data->posted)) ? $data->posted->username : null,
        'cb_custom1' => $data->cb_custom1,
    ),
    'attributes' => array(
        array('name' => 'entity_id', 'label' => 'Entity'),
        array('name' => 'input_date', 'label' => 'Input Date'),
        array('name' => 'yearmonth_periode', 'label' => 'Periode'),
        array('name' => 'module', 'label' => 'Module'),
        array('name' => 'cb_custom1', 'label' => $data->user_reff, 'visible' => $data->user_reff),
        array('name' => 'created', 'label' => 'Created By'),
        array('name' => 'posted', 'label' => 'Posted By', 'visible' => ($data->posted != null)),
        array('name' => 'total', 'label' => 'Total'),
    ),
));
?>
