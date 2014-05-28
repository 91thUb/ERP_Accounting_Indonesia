<h4>Semester I</h4>

<?php
//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'id' => 'g-core-competency-grid24a',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentCoreCompetency::model()->search($model->id, $year),
    'type' => 'condensed',
    //'filter'=>$model,
    'template' => '{items}',
    'extraRowColumns' => array('level.name'),
    'columns' => array(
        'year',
        //array(
        //	'header'=>'Period',
        //	'value' => '$data->getConvertTalentPeriod($data->period)',
        //),
        //'company_id',
        array(
            'header' => 'Level',
            'name' => 'level.name',
        ),
        'talent_template.aspect',
        'talent_template.weight',
        //'target_score',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'personal_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateCoreCompetencyAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'superior_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateCoreCompetencyAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        'calcFinalResult',
        'remark',
    ),
));
?>


<h4>Semester II</h4>

<?php
//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'id' => 'g-core-competency-grid24b',
    //'dataProvider'=>$model->search(),
    'dataProvider' => gTalentCoreCompetency::model()->search($model->id, $year),
    'type' => 'condensed',
    //'filter'=>$model,
    'template' => '{items}',
    'extraRowColumns' => array('level2.name'),
    'columns' => array(
        'year',
        //array(
        //	'header'=>'Period',
        //	'value' => '$data->getConvertTalentPeriod($data->period)',
        //),
        //'company_id',
        array(
            'header' => 'Level',
            'name' => 'level2.name',
        ),
        'talent_template.aspect',
        'talent_template.weight',
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'personal2_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateCoreCompetencyAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'superior2_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateCoreCompetencyAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        'calcFinalResult2',
        'remark',
    ),
));
?>

