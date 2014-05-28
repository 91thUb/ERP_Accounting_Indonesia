<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'pic',
        'address',
        'city',
        'pos_code',
        'province',
        'telephone',
        'fax',
        'email',
        'status_id',
    ),
));
?>
