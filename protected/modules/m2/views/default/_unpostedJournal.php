<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="icon-fa-reorder fa-fw"></i>
            <?php
            echo " Unposted Journal ";
            ?></li>
    </ul>
</div>

<ul>
    <?php
    $criteria = new CDbCriteria;
    $criteria->condition = 'state_id = 1 OR state_id = 2';
    $criteria->order = 't.input_date';
    $criteria->compare('yearmonth_periode', Yii::app()->settings->get("System", "cCurrentPeriod"));

    $criteria->limit = 10;


    $models = tJournal::model()->findAll($criteria);

    foreach ($models as $model) {
        echo CHtml::openTag('li', array());
        echo CHtml::tag('strong', array(), CHtml::link($model->system_reff, Yii::app()->createUrl('/tJournal/view', array('id' => $model->id))));
        echo "<br/>";
        echo $model->input_date . " | " . number_format($model->journalSum, 0, ",", ".");
        echo "<br/>";
        echo $model->remark;
        echo CHtml::closeTag('li');
    }
    ?>
</ul>

