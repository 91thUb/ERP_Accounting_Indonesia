<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-planet fa-fw"></i>
        <?php echo "Update Leave: " . $model->employee_name; ?>
    </h1>
</div>


<?php
echo $this->renderPartial('_formLeave', array('model' => $modelLeave));
