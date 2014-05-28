<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Forum | Bugs Thread </h4>
</div>


<?php
$newthread = '';

$gridColumns = array(
    array(
        'name' => 'subject',
        'headerHtmlOptions' => array('style' => 'display:none'),
        'type' => 'html',
        'value' => '$data->renderSubjectCell()',
    ),
    array(
        'name' => 'postCount',
        'header' => 'Posts',
        'headerHtmlOptions' => array('style' => 'text-align:center;'),
        'htmlOptions' => array('style' => 'width:65px; text-align:center;'),
    ),
    array(
        'name' => 'view_count',
        'header' => 'Views',
        'headerHtmlOptions' => array('style' => 'text-align:center;'),
        'htmlOptions' => array('style' => 'width:65px; text-align:center;'),
    ),
        /* array(
          'name' => 'Last post',
          'headerHtmlOptions' => array('style' => 'text-align:center;'),
          'type' => 'html',
          'value' => '$data->renderLastpostCell()',
          'htmlOptions' => array('style' => 'width:200px; text-align:right;'),
          ), */
);

$this->widget('TbGroupGridView', array(
    'enableSorting' => false,
    'selectableRows' => 0,
    // 'emptyText'=>'', // No threads? Show nothing
    // 'showTableOnEmpty'=>false,
    //'preHeader' => CHtml::encode($forum->title),
    //'preHeaderHtmlOptions' => array(
    //    'class' => 'preheader',
    //),
    'dataProvider' => $threadsProvider,
    'template' => '{items}',
    'extraRowColumns' => array('is_sticky'),
    'extraRowExpression' => '"<b>".($data->is_sticky?"Sticky threads":"Normal threads")."</b>"',
    'columns' => $gridColumns,
    'htmlOptions' => array(
    //'class' => Yii::app()->controller->module->forumTableClass,
    )
));
?>