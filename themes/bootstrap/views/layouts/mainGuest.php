<?php $this->beginContent('/layouts/baseFixed'); ?>

<?php //$this->renderPartial('/layouts/_header'); ?>
<?php //$this->renderPartial('/layouts/_navigation'); ?>
<?php $this->renderPartial('/layouts/_notification'); ?>

<div class="row">
    <div class="span9">

        <?php echo $content; ?>

    </div>


    <div class="span3">
        <?php $this->renderPartial('/layouts/_sbRightGuest'); ?>
    </div>


</div>

<?php $this->endContent(); ?>
