<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-work-result-grid4',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentWorkResult::model()->search($model->id, $year),
    'type' => 'condensed',
    //'filter'=>$model,
    'template' => '{items}',
    'columns' => array(
        'year',
        //array(
        //	'header'=>'Period',
        //	'value' => '$data->getConvertTalentPeriod($data->period)',
        //),
        //'company_id',
        'talent_template.aspect',
        array(
            'name' => 'personal_score',
        ),
        array(
            'name' => 'superior_score',
        ),
        'calcFinalResult',
        'remark',
    ),
));
?>

