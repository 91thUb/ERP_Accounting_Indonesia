<?php $this->beginContent('//layouts/baseFixed'); ?>

<div class="row">
    <div class="span12 my-sticky-element">
        <h4 style="margin-top: -5px; padding: 8px; background-color:#cbcbcb">
            <?php
            if (!Yii::app()->user->isGuest)
                echo sUser::model()->myGroupName;
            ?>
        </h4>
    </div>
</div>

<?php $this->renderPartial('//layouts/_notification'); ?>

<?php echo $content; ?>


<?php $this->endContent(); ?>
