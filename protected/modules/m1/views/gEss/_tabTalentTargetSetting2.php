<?php

//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'id' => 'g-target-setting-grid2',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentTargetSetting::model()->search($model->id, $year),
    'type' => 'condensed',
    //'filter'=>$model,
    'template' => '{items}',
    'extraRowColumns' => array('strategic.name'),
    //'extraRowExpression' =>  '"<b style=\"padding:20px 0;\">".$data->strategic_objective."</b>"',
    'columns' => array(
        //'company_id',
        'year',
        array(
            'header' => 'Perspective',
            'name' => 'strategic.name',
        ),
        'strategic_desc',
        'kpi_desc',
        //'strategic_initiative',
        'weight',
        'target',
        'unit',
        //'remark',
        array(
            'name' => 'realization',
        ),
        array(
            'name' => 'value_type_id',
        ),
        array(
            'header' => 'Realisation vs Target',
            'value' => '$data->realizationVsTarget',
        ),
        array(
            'header' => 'Individual Score',
            'value' => '$data->individualScore',
        ),
        array(
            'header' => 'Status',
            'name' => 'validate.name',
        ),
    ),
));
?>

<?php

if ($year == date('Y'))
    echo $this->renderPartial('_formTargetSetting', array('model' => $modelTargetSetting, 'year' => $year));