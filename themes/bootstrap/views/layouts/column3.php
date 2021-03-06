<?php $this->beginContent('//layouts/baseFixed'); ?>

<?php //$this->renderPartial('//layouts/_header'); ?>
<?php //$this->renderPartial('//layouts/_navigation'); ?>

<?php if (!Yii::app()->user->isGuest) { ?>
    <div class="row">
        <div class="span12 my-sticky-element">
            <h4 style="margin-top: -5px; padding: 8px; background-color: #cbcbcb">
                <?php
                if (!Yii::app()->user->isGuest)
                    echo sUser::model()->myGroupName;
                ?>
            </h4>
        </div>
    </div>
<?php } ?>

<?php $this->renderPartial('//layouts/_notification'); ?>

<div class="cleared reset-box"></div>


<div class="row">
    <div class="span2">
        <?php $this->renderPartial('//layouts/_sbLeftMenu'); ?>
    </div>

    <div class="span7">
        <?php echo $content; ?>
    </div>

    <div class="span3">
        <?php $this->renderPartial('//layouts/_sbRightOperationBox'); ?>
    </div>

</div>

<?php $this->endContent(); ?>
