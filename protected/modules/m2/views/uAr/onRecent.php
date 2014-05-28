<?php
$this->breadcrumbs = array(
    'U Ars' => array('index'),
    'Manage',
);


$this->menu = array(
    array('label' => 'AR Customer', 'icon' => 'home', 'url' => array('/m2/uAr/arCustomer')),
);
?>


<div class="page-header">
    <h1>Account Receivable: Recent</h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Unpaid. New Sales Order', 'url' => Yii::app()->createUrl('/m2/uAr')),
        array('label' => 'Half Paid', 'url' => Yii::app()->createUrl('/m2/uAr/onHalfPaid')),
        array('label' => 'Paid. Post to GL', 'url' => Yii::app()->createUrl('/m2/uAr/onPaid')),
        array('label' => 'Recent AR', 'url' => Yii::app()->createUrl('/m2/uAr/onRecent'), 'active' => true),
    ),
));
?>

