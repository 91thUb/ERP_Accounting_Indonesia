<?php
/* @var $this GPayrollController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'G Payrolls',
);

$this->menu = array(
    array('label' => 'Report', 'icon' => 'print', 'url' => array('/m1/gTalentHolding/report')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-flask fa-fw"></i>
        PRODESI Information
    </h1>
</div>

<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>


<?php /*
  $this->widget('bootstrap.widgets.TbMenu', array(
  'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
  'stacked' => false, // whether this is a stacked menu
  'items' => array(
  array('label' => 'Dash Board', 'url' => Yii::app()->createUrl('/m1/gTalentHolding'), 'active' => true),
  ),
  'htmlOptions'=>array(
  'style'=>'padding:0',
  )
  ));
 */ ?>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'encodeLabel' => false,
    'items' => array(
        array('label' => '<i class="fa fa-chevron-left fa-fw"></i>Previous Month', 'url' => Yii::app()->createUrl("/m1/gTalentHolding/index", array("periode" => peterFunc::cBeginDateBefore($periode)))),
        array('label' => $periode,
            'url' => Yii::app()->createUrl("/m1/gTalentHolding/index", array("periode" => $periode))),
        array('label' => 'Next Month <i class="fa fa-chevron-right"></i>', 'url' => Yii::app()->createUrl("/m1/gTalentHolding/index", array("month" => peterFunc::cBeginDateAfter($periode)))),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>

<h4 style="margin-top: -5px; padding: 8px; background-color:#E6E6E6">
    Mutation</h4>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-newemployee-grid',
    'dataProvider' => gPerson::model()->getNewMutationAll($periode),
    'htmlOptions' => array("style" => "padding-top:0px"),
    'columns' => array(
        array(
            'type' => 'raw',
            'value' => '$data->photoPath',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'header' => 'Name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gTalentHolding/view",array("id"=>$data->id)))',
        ),
        array(
            'header' => 'Start Date',
            'value' => '$data->mCareerDate()',
        ),
        array(
            'header' => 'Company',
            'value' => '$data->mCompany()',
        ),
        array(
            'header' => 'Department',
            'value' => '$data->mDepartment()',
        ),
        array(
            'header' => 'New Job Title',
            'value' => '$data->mJobTitle()',
        ),
    //array(
    //    'header' => 'Status',
    //    'value' => '$data->mStatus()',
    //),
    ),
));
?>

<br/>

<h4 style="margin-top: -5px; padding: 8px; background-color:#E6E6E6">
    Promotion</h4>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-newemployee-grid',
    'dataProvider' => gPerson::model()->getNewPromotionAll($periode),
    'htmlOptions' => array("style" => "padding-top:0px"),
    'columns' => array(
        array(
            'type' => 'raw',
            'value' => '$data->photoPath',
            'htmlOptions' => array("width" => "50px"),
        ),
        array(
            'header' => 'Name',
            'type' => 'raw',
            'value' => 'CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gTalentHolding/view",array("id"=>$data->id)))',
        ),
        array(
            'header' => 'Start Date',
            'value' => '$data->mCareerDate()',
        ),
        array(
            'header' => 'Company',
            'value' => '$data->mCompany()',
        ),
        array(
            'header' => 'Department',
            'value' => '$data->mDepartment()',
        ),
        array(
            'header' => 'New Job Title',
            'value' => '$data->mJobTitle()',
        ),
    //array(
    //    'header' => 'Status',
    //    'value' => '$data->mStatus()',
    //),
    ),
));
?>
