<?php
$this->widget('TbGridView', array(
    'id' => 'g-param-selection-grid',
    'dataProvider' => gParamSelection::model()->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'sort',
            //'headerHtmlOptions' => array('style' => 'width: 110px'),
            'editable' => array(
                'url' => $this->createUrl('/m1/gHrParameter/updateParamSelectionAjax'),
                'placement' => 'right',
                'inputclass' => 'span3',
                'title' => 'Custom Title',
            )
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'name',
            'value' => '($data->parent_id ==0) ? $data->name : "-- ".$data->name',
            //'headerHtmlOptions' => array('style' => 'width: 110px'),
            'editable' => array(
                'url' => $this->createUrl('/m1/gHrParameter/updateParamSelectionAjax'),
                'placement' => 'right',
                'inputclass' => 'span3',
            )
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/m1/gHrParameter/deleteParamSelection",array("id"=>$data->id))',
        ),
    ),
));
?>

<div class="page-header">
    <h3>New Param Selection</h3>
</div>

<?php
echo $this->renderPartial('_formParamSelection', array('model' => $model));
