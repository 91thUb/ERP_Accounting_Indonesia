<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'AP Supplier', 'icon' => 'home', 'url' => array('/m2/uAp/apSupplier')),
);
?>


<div class="page-header">
    <h1>Account Payable: Recent</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Unpaid. New Purchased Order', 'url' => Yii::app()->createUrl('/m2/uAp')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uAp/onHalfPaid')),
        array('label' => 'Paid. Post to GL', 'url' => Yii::app()->createUrl('/m2/uAp/onPaid')),
        array('label' => 'Recent AP', 'url' => Yii::app()->createUrl('/m2/uAp/onRecent'), 'active' => true),
    ),
));
?>

