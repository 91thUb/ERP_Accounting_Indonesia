<?php
$this->widget('TbGridView', array(
    'id' => 'g-param-permission-grid',
    'dataProvider' => gParamPermission::model()->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'sort',
            //'headerHtmlOptions' => array('style' => 'width: 110px'),
            'editable' => array(
                'url' => $this->createUrl('/m1/gHrParameter/updateParamPermissionAjax'),
                'placement' => 'right',
                'inputclass' => 'span3',
            )
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'name',
            //'headerHtmlOptions' => array('style' => 'width: 110px'),
            'editable' => array(
                'url' => $this->createUrl('/m1/gHrParameter/updateParamPermissionAjax'),
                'placement' => 'right',
                'inputclass' => 'span3',
            )
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'amount',
            //'headerHtmlOptions' => array('style' => 'width: 110px'),
            'editable' => array(
                'url' => $this->createUrl('/m1/gHrParameter/updateParamPermissionAjax'),
                'placement' => 'right',
                'inputclass' => 'span3',
            )
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("/m1/gHrParameter/deleteParamPermission",array("id"=>$data->id))',
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'status_id',
            //we need not to set value, it will be auto-taken from source
            // 'headerHtmlOptions' => array('style' => 'width: 60px'),
            'editable' => array(
                'type' => 'select',
                'url' => $this->createUrl('/m1/gHrParameter/updateParamPermissionAjax'),
                'source' => sParameter::items('cOrganizationStatus'),
            )
        ),
    ),
));
?>

<div class="page-header">
    <h3>New Param Permission</h3>
</div>

<?php
echo $this->renderPartial('_formParamPermission', array('model' => $model));
