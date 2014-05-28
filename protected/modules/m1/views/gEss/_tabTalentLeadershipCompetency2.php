<?php
//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'id' => 'g-target-setting-grid4a',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentLeadershipCompetency::model()->search($model->id, $year),
    'type' => 'condensed',
    //'filter'=>$model,
    'template' => '{items}',
    //'extraRowColumns'=> array('level.name'),
    'columns' => array(
        'year',
        //array(
        //	'header'=>'Period',
        //	'value' => '$data->getConvertTalentPeriod($data->period)',
        //),
        //'company_id',
        //array(
        //	'header'=>'Level',
        //	'name'=>'level.name',
        //),
        //'company_id',
        'talent_template.aspect',
        'talent_template.weight',
        array(
            'name' => 'personal_score',
        ),
        //array(
        //    'name' => 'superior_score',
        //),
        //'calcFinalResult',
        'remark',
        array(
            'header' => 'Status',
            'name' => 'validate.name',
        ),
    ),
));
?>

<br/>

<?php
if ($year == date('Y'))
    echo $this->renderPartial('_formLeadershipCompetency', array('model' => $modelLeadershipCompetency, 'id' => $model->id, 'year' => $year));
