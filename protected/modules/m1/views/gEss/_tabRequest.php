<?php
if (sNotification::getApproval() == null) {
    ?>

    <div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
        <h4>Waiting Your Approval</h4>
    </div>


    <ul style="margin:0">
        <?php
        $notifiche = sNotification::getApproval();

        foreach ($notifiche->getData() as $notifica) {
            echo CHtml::openTag('li', array());
            echo CHtml::openTag('div', array('class' => 'media-body'));
            echo CHtml::openTag('p', array('class' => 'media-heading'));
            //echo CHtml::tag('div',array('style'=>'width:30px;margin-right:10px;float:left'),$notifica->photoPath);
            echo CHtml::link($notifica['employee_name'], Yii::app()->createUrl('/m1/gEss/subordinate', array('id' => $notifica['id'])));
            echo " is waiting your approval";
            echo CHtml::closeTag('p');
            echo CHtml::closeTag('div');
            //echo CHtml::closeTag('div');
            echo CHtml::closeTag('li');
        }
        ?>
    </ul>

    <br/>

<?php } ?>

