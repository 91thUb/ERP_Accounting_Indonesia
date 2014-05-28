<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => false,
    'headerIcon' => 'fa fa-globe fa-fw',
    'htmlHeaderOptions' => array('style' => 'background:white'),
        //'htmlContentOptions'=>array('style'=>'background:#FFA573'),
));
?>

<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="fa fa-comment fa-fw"></i><?php echo Yii::t('basic', ' FeedBack') ?></li>
    </ul>
</div>


<?php foreach (sFeedback::model()->searchFilter()->getData() as $data): ?>

    <?php
    echo CHtml::openTag('div', array('class' => 'media', 'style' => 'margin-top:0;'));

    echo CHtml::openTag('div', array('class' => 'media-body'));
    echo CHtml::openTag('p', array('class' => 'media-heading'));
    echo CHtml::link(peterFunc::shorten_string($data->long_desc, 12) . ' ', Yii::app()->createUrl('/sFeedback/view', array("id" => $data->id)));
    echo CHtml::tag('i', array('style' => 'color:grey;font-size:11px; margin-bottom:10px;'), Yii::app()->dateFormatter->format("dd-MM-yyyy", $data->sender_date) . ' | ' . $data->status->name . ' (' . $data->countComment . ')');
    echo CHtml::closeTag('p');
    echo CHtml::closeTag('div');
    echo CHtml::closeTag('div');
    ?>

<?php endforeach; ?>

<?php
$this->endWidget();
?>

