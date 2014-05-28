<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-core-competency-grid4a',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentCoreCompetency::model()->search($model->id, $year),
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
        'remark',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gTalent/deleteCoreCompetency",array("id"=>$data->id))',
        ),
    ),
));
?>

<?php

echo $this->renderPartial('_formCoreCompetency', array('model' => $modelCoreCompetency, 'id' => $model->id, 'year' => $year));
