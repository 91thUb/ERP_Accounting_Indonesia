<?php $this->beginContent('//layouts/baseFixed'); ?>

<?php //$this->renderPartial('//layouts/_header'); ?>
<?php //$this->renderPartial('//layouts/_navigation'); ?>

<?php if (!Yii::app()->user->isGuest) { ?>
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
<?php } ?>

<?php $this->renderPartial('//layouts/_notification'); ?>

<div class="row">
    <div class="span8">
        <?php echo $content; ?>
    </div>
    <div class="span4">
        <?php $this->renderPartial('//layouts/_sbRightOperationBox'); ?>
    </div>
</div>

<?php $this->endContent(); ?>
