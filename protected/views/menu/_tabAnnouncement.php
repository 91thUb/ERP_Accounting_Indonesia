<?php
$model = sCompanyNews::model()->Announcement;

if ($model != false) {
    ?>

    <div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
        <ul class="nav nav-list">
            <li class="nav-header"><i class="fa fa-bars fa-fw"></i><?php echo Yii::t('basic', ' Announcement') ?></span>
            </li>
        </ul>
    </div>
    <?php
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => false,
        'headerIcon' => 'fa fa-globe fa-fw',
        'htmlHeaderOptions' => array('style' => 'background:white'),
        'htmlContentOptions' => array('style' => 'background:#cbcbcb'),
    ));
    ?>

    <h4><?php echo $model->title; ?></h4>
    <small><?php echo $model->publish_date ?><br/></small>

    <?php
    $this->beginWidget('CMarkdown', array('purifyOutput' => true));
    echo $model->content;
    $this->endWidget();
    ?>

    <p class="pull-right"><small>
            Expire Time: <?php echo waktu::nicetime(strtotime($model->expire_date)) ?>
        </small></p>

    <?php
    $this->endWidget();
}
?>


