<?php
$this->renderPartial('_menu');
?>

<div class="page-header">
    <h1>Address Book Group</h1>
</div>

<?php
$this->widget('TbGridView', array(
    'id' => 's-addressbook-group-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        //'parent_id',
        array(
            'name' => 'group_name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->group_name,Yii::app()->createUrl("/sSms/viewAddressbookGroup",array("id"=>$data->id)))',
        ),
        'description',
        array(
            'class' => 'TbButtonColumn',
            'template' => '{update}{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("sSms/deleteAddressbookGroup",array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("sSms/updateAddressbookGroup",array("id"=>$data->id))'
        ),
        array(
            'header' => 'Total Member',
            'filter' => false,
            'value' => '$data->getListMembers()->totalItemCount',
            'htmlOptions' => array(
                'style' => 'text-align: right; padding-right: 5px;'
            ),
        ),
    ),
));
?>

