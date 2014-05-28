<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <ul class="nav nav-list">
        <li class="nav-header"><i class="fa fa-bars fa-fw"></i><?php echo Yii::t('basic', ' Reminder System for New Employee') ?></li>
    </ul>
</div>

<ul style="margin:0">
    <?php
    $notifiche = sNotification::getReminder2();
    $counter = false;

    foreach ($notifiche as $key => $notifica) {

        if (($key + 2) % 2 == 0) {
            echo '<div class="row">';
            echo '<ul class="thumbnails">';
        }
        ?>		
        <div class="span2">
            <li class="span2">
                <div class="thumbnail">
                    <?php echo CHtml::tag('div', array(), $notifica->photoPath); ?>
                    <?php /* <h5><? echo $notifica->employee_name ?></h5> */ ?>
                    <p><? echo CHtml::link($notifica->getReminder2(), Yii::app()->createUrl('/m1/gPerson/view', array('id' => $notifica->id))); ?></p>
                </div>
            </li>
        </div>
        <?php
        if (($key + 1) % 2 == 0) {
            echo '</ul>';
            echo '</div>';
            echo '<br/>';
            $counter = false;
        } else
            $counter = true;
    }
    ?>

    <?php
    if ($counter) {
        echo '</ul>';
        echo '</div>';
        echo '<br/>';
    }
    ?>     

</ul>

<br/>