<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="fa fa-bars fa-fw"></i><?php echo Yii::t('basic', ' Newest Black List') ?></li>
    </ul>
</div>


<?php
$criteria = new CDbCriteria;

$criteria->order = '(select start_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) DESC';

$criteria1 = new CDbCriteria;
$criteria1->condition = '(select status_id from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) IN(13)';
$criteria1->limit = 3;

$criteria2 = new CDbCriteria;
$criteria2->condition = '(select start_date from g_person_status s where s.parent_id = t.id ORDER BY start_date DESC LIMIT 1) > DATE_ADD(CURDATE(),INTERVAL -30 DAY)';

$criteria->mergeWith($criteria1);
$criteria->mergeWith($criteria2);

$total = gPerson::model()->count($criteria);
$pages = new CPagination($total);
$pages->pageSize = 3;
$pages->applyLimit($criteria);
$models = gPerson::model()->findAll($criteria);
?>



<ul style="margin:0">
    <?php
    foreach ($models as $notifica) {
        echo CHtml::openTag('div', array('class' => 'media', 'style' => 'margin-top:0;'));
        echo CHtml::openTag('p', array('class' => 'pull-left', 'style' => 'width:60px'));
        echo $notifica->photoPath;
        echo CHtml::closeTag('p');

        echo CHtml::openTag('div', array('class' => 'media-body'));
        echo CHtml::openTag('p', array('class' => 'media-heading'));
        echo CHtml::tag('strong', array(), $notifica->employee_name);
        echo '<br/>';
        echo (isset($notifica->company)) ? CHtml::tag('strong', array(), $notifica->company->company->name) : '';
        echo (isset($notifica->company)) ? " - " . $notifica->company->department->name : '';
        echo '<br/>';
        echo $notifica->status->start_date;
        echo " " . $notifica->status->remark;

        echo CHtml::closeTag('p');
        echo CHtml::closeTag('div');
        echo CHtml::closeTag('div');
    }
    ?>
</ul>

<br/>


