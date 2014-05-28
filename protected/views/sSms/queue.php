<?php
$this->renderPartial('_menu');
?>

<div class="page-header">
    <h1>		<i class="fa fa-envelope fa-fw"></i>
        Sent</h1>
</div>

<?php
$this->widget('TbGridView', array(
    'id' => 's-smsout-grid',
    'dataProvider' => $dataProvider,
    'itemsCssClass' => 'table table-striped table-condensed',
    'template' => '{items}{pager}',
    //'filter' => $model,
    'enableSorting' => false,
    'columns' => array(
        array(
            'header' => 'Destination Number',
            'value' => '$data["DestinationNumber"]',
        ),
        array(
            'header' => 'Message',
            'value' => '$data["TextDecoded"]',
        ),
    ),
));
?>



