<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu4 = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gLeave')),
    array('icon' => 'calendar', 'label' => 'Leave Calendar', 'url' => array('/m1/gLeave/leaveCalendar')),
);

$this->menu = array(
    array('icon' => 'cog', 'label' => 'Cancellation Leave', 'url' => array('/m1/gLeave/cancellation')),
    array('icon' => 'cog', 'label' => 'Extended Leave', 'url' => array('/m1/gLeave/extended')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

$this->menu1 = array(
    array('icon' => 'print', 'label' => 'Leave Reports ', 'url' => array('/m1/gLeave/reportByDept')),
);

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
        array('label' => 'Waiting for Approval ' . $onwaiting, 'url' => Yii::app()->createUrl('/m1/gLeave'), 'active' => true),
        array('label' => 'Approved Leave ' . $onapproved, 'url' => Yii::app()->createUrl('/m1/gLeave/onApproved')),
        //array('label' => 'Pending State', 'url' => Yii::app()->createUrl('/m1/gLeave/onPending')),
        array('label' => 'Employee On Leave ' . $onleave, 'url' => Yii::app()->createUrl('/m1/gLeave/onLeave')),
        array('label' => 'Recent Leave', 'url' => Yii::app()->createUrl('/m1/gLeave/onRecent')),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>

<?php
echo $this->renderPartial('onWaiting', array('model' => $model));
