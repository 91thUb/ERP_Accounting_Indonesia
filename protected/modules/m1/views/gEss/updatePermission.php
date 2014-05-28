<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-hand-o-up fa-fw"></i>
        <?php echo "Update Permission: " . $model->employee_name; ?>
    </h1>
</div>

<?php
echo $this->renderPartial('_formPermission', array('model' => $modelPermission));
