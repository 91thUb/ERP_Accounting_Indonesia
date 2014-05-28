<?php

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'employee_code',
        array(
            'label' => 'Birth Place',
            'value' => $model->birth_place,
        ),
        array(
            'label' => 'Birth Date',
            'value' => $model->birth_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $model->countAgeRoundDown() . ' years'),
            'type' => 'raw',
        ),
        //'birth_date',
        array(
            'label' => 'Gender',
            'value' => isset($model->sex) ? $model->sex->name : "",
        ),
        array(
            'label' => 'Religion',
            'value' => $model->religion->name,
        ),
        //array(
        //		'label'=>'Marital Status',
        //		'value'=>$model->maritalstatus->name,
        //),
        'blood_id',
        'address1',
        /* 'address2',
          'address3', */
        'pos_code',
        'identity_number',
        'identity_valid',
        'identity_address1',
        /* 'identity_address2',
          'identity_address3',
          'identity_pos_code', */
        array(
            'label' => 'Email',
            'type' => 'raw',
            'value' => $model->cloakEmail . ' ' . $model->isValidEmail,
        ),
        //'email2',
        'home_phone',
        'handphone',
        //'handphone2',
        'account_number',
        'account_name',
        'bank_name',
    ),
));


