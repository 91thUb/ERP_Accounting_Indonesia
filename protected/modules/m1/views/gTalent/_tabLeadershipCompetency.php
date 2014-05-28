<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-leadership-competency-grid4a',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentLeadershipCompetency::model()->search($model->id, $year),
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
            'class' => 'EJuiDlgsColumn',
            'template' => '{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gTalent/deleteLeadershipCompetency",array("id"=>$data->id))',
        ),
    ),
));
?>

<?php

echo $this->renderPartial('_formLeadershipCompetency', array('model' => $modelLeadershipCompetency, 'id' => $model->id, 'year' => $year));
