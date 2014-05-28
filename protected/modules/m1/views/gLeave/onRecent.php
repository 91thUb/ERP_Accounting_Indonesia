<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu = array(
    array('label' => 'Home', 'url' => array('/m1/gLeave')),
    array('icon' => 'calendar', 'label' => 'Leave Calendar', 'url' => array('/m1/gLeave/leaveCalendar')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);


//$this->menu1=gLeave::getTopUpdated();
//$this->menu2=gLeave::getTopCreated();
$this->menu5 = array('Leave');
?>

<div class="page-header">
    <h1>
        <i class="fa fa-suitcase fa-fw"></i>
        Leave
    </h1>
</div>

<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>

<?php
$onwaiting = (gLeave::model()->onWaiting()->totalItemCount != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), gLeave::model()->onWaiting()->totalItemCount) : "";
$onapproved = (gLeave::model()->onApproved()->totalItemCount != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), gLeave::model()->onApproved()->totalItemCount) : "";
$onleave = (gLeave::model()->onLeave()->totalItemCount != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), gLeave::model()->onLeave()->totalItemCount) : "";

$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'encodeLabel' => false,
    'items' => array(
        array('label' => 'Waiting for Approval ' . $onwaiting, 'url' => Yii::app()->createUrl('/m1/gLeave')),
        array('label' => 'Approved Leave ' . $onapproved, 'url' => Yii::app()->createUrl('/m1/gLeave/onApproved')),
        //array('label' => 'Pending State', 'url' => Yii::app()->createUrl('/m1/gLeave/onPending')),
        array('label' => 'Employee On Leave ' . $onleave, 'url' => Yii::app()->createUrl('/m1/gLeave/onLeave')),
        array('label' => 'Recent Leave', 'url' => Yii::app()->createUrl('/m1/gLeave/onRecent'), 'active' => true),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-person-grid',
    'dataProvider' => gLeave::model()->OnRecent(),
    //'filter'=>$model,
    'template' => '{items}',
    'columns' => array(
        array(
            'type' => 'raw',
            'value' => '$data->person->photoPath',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'header' => 'Name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->person->employee_name,Yii::app()->createUrl("/m1/gLeave/view",array("id"=>$data->parent_id)))',
        ),
        array(
            'header' => 'Department',
            'value' => '$data->person->mDepartment()',
        ),
        'start_date',
        'end_date',
        'number_of_day',
        'balance',
        array(
            'header' => 'Approved By',
            'name' => 'updated.username',
        ),
    ),
));
