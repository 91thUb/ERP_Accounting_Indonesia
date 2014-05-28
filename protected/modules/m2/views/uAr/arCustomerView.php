<?php
$this->breadcrumbs = array(
    'C Customers' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'AR Dashboard', 'icon' => 'home', 'url' => array('/m2/uAr')),
    array('label' => 'AR Customer', 'icon' => 'home', 'url' => array('/m2/uAr/arCustomer')),
);
?>

<div class="page-header">
    <h1>
        <?php echo $model->company_name; ?>
    </h1>
</div>


<?php
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Sales Order List', 'content' => $this->renderPartial("_arCustomerDetail", array("model" => $model), true), 'active' => true),
        array('label' => 'Detail', 'content' => $this->renderPartial("/uCustomer/_detail", array("model" => $model), true)),
    ),
));
?>

