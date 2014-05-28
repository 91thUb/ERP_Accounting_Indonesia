<?php
/* @var $this SAddressbookController */
/* @var $model sAddressbook */

$this->breadcrumbs = array(
    'S Addressbooks' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/sAddressbook')),
);
?>

<div class="page-header">
    <h1><?php echo $model->complete_name; ?></h1>
</div>


<?php
$this->widget('TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'category_name',
        'complete_name',
        'company_name',
        'title',
        'address',
        'handphone',
        'email',
        'member_of',
    ),
));
?>
