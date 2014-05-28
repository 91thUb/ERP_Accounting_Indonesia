<?php
$this->renderPartial('_menu');
?>

<div class="page-header">
    <h1>Broadcast SMS</h1>
</div>

<?php
$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => false,
));

echo CHtml::tag('strong', array(), $model->message);

$this->endWidget();
?>


<?php
$this->widget('TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //array(
        //	'label'=>'Group',
        //	'name'=>'sender.name',
        //),
        'receivergroup_tag',
        'approved_id',
        array(
            'label' => 'Created By',
            'name' => 'created.username',
        ),
        array(
            'label' => 'Sent',
            'value' => waktu::nicetime($model->created_date),
        ),
    ),
));
?>

<h4>List of Receipient</h4>

<?php
$this->widget('TbGridView', array(
    'id' => 's-addressbook-grid',
    'dataProvider' => sAddressbookGroup::model()->listRecepient($model->id),
    //'filter' => $model,
    'columns' => array(
        //'category_name',
        array(
            'name' => 'complete_name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->complete_name,Yii::app()->createUrl("/sAddressbook/view",array("id"=>$data->id)))',
        ),
        //'company_name',
        'title',
        'handphone',
        'member_of',
    ),
));
?>