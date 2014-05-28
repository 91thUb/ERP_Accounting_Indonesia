<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<div class="row">
    <div class="span2">
        <?php echo $this->renderPartial('_menuNavigation'); ?>
    </div>

    <div class="span10">
        <div class="page-header">
            <h1>Black List Former Employee</h1>
        </div>

        <div class="row">
            <div class="span10">
                <?php $this->renderPartial('_sbBlacklist'); ?>
            </div>
        </div>
    </div>
</div>