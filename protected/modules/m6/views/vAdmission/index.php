<?php
$this->breadcrumbs = array(
    'V Admissions',
);


$this->menu = array(
        //array('label'=>'Create vAdmission','url'=>array('create')),
        //array('label'=>'Manage vAdmission','url'=>array('admin')),
);

$this->menu5 = array('Admission');
?>


<div class="page-header">
    <h1>Admission</h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>

