<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-plane fa-fw"></i>
        Create Leave
    </h1>
</div>


<?php
echo $this->renderPartial('_formLeave', array('model' => $model));
