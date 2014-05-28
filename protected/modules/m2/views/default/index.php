<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<div class="page-header">
    <h3>
        <i class="icon-fa-flag"></i>
        <?php
        echo "DashBoard";
        ?>
    </h3>
</div>

<div class="row">
    <div class="span2">
        <?php $this->renderPartial("_menuNavigation"); ?>
    </div>
    <div class="span10">
        <?php $this->renderPartial("_financePosition"); ?>

        <div class="row">
            <div class="span7">
                <?php //$this->renderPartial("_trialBalance"); ?>

                <?php //$this->renderPartial("_favouriteAccount"); ?>

                <?php $this->renderPartial("_top20account"); ?>
            </div>
            <div class="span3">
                <?php $this->renderPartial("_newJournal"); ?>
                <br/>
                <?php $this->renderPartial("_unpostedJournal"); ?>
            </div>
        </div>
    </div>
</div>

