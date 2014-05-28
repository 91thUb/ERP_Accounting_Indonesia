<h4>Semester I</h4>


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
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'realization',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'value_type_id',
            // 'headerHtmlOptions' => array('style' => 'width: 60px'),
            'editable' => array(
                'type' => 'select',
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                'source' => array('1' => 'Min', '2' => 'Max'),
            )
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
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'superior_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'header' => 'Superior Score vs Weight',
            'value' => '$data->superiorVsWeight',
        ),
    ),
));
?>

<br/>
<h4>Semester II</h4>


<?php
//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'id' => 'g-target-setting-grid22',
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
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'realization2',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'value_type_id',
            // 'headerHtmlOptions' => array('style' => 'width: 60px'),
            'editable' => array(
                'type' => 'select',
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                'source' => array('1' => 'Min', '2' => 'Max'),
            )
        ),
        array(
            'header' => 'Realisation vs Target',
            'value' => '$data->realization2VsTarget',
        ),
        array(
            'header' => 'Individual Score',
            'value' => '$data->individualScore2',
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'superior2_score',
            'sortable' => false,
            'editable' => array(
                'url' => $this->createUrl('/m1/gTalent/updateTargetAjax'),
                //'placement' => 'right',
                'inputclass' => 'span1'
            )),
        array(
            'header' => 'Superior Score vs Weight',
            'value' => '$data->superior2VsWeight',
        ),
    ),
));
?>

