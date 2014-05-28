<?php
$this->breadcrumbs = array(
    'C Suppliers' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'AP Dashboard', 'icon' => 'home', 'url' => array('/m2/uAp')),
    array('label' => 'AP Supplier', 'icon' => 'home', 'url' => array('/m2/uAp/apSupplier')),
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
        array('label' => 'Sales Order List', 'content' => $this->renderPartial("_apSupplierDetail", array("model" => $model), true), 'active' => true),
        array('label' => 'Detail', 'content' => $this->renderPartial("/uSupplier/_detail", array("model" => $model), true)),
    ),
));
?>

