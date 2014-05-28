<?php

//$this->widget('bootstrap.widgets.TbGridView',array(
$this->widget('bootstrap.widgets.TbGroupGridView', array(
    'id' => 'g-target-setting-grid1',
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
        'weight',
        'target',
        'unit',
        'remark',
        'strategic_initiative',
        array(
            'class' => 'EJuiDlgsColumn',
            'template' => '{update}{delete}',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gTalent/deleteTargetSetting",array("id"=>$data->id))',
            'updateDialog' => array(
                'controllerRoute' => 'm1/gTalent/updateTargetSetting',
                'actionParams' => array('id' => '$data->id'),
                'dialogTitle' => 'Update Target Setting',
                'dialogWidth' => 512, //override the value from the dialog config
                'dialogHeight' => 530
            ),
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{approved}',
            'buttons' => array
                (
                'approved' => array
                    (
                    'label' => 'Approved',
                    //'icon' => 'icon-ok-circle',
                    'url' => 'Yii::app()->createUrl("/m1/gTalent/approved",array("id"=>$data->id,"pid"=>$data->parent_id))',
                    'visible' => '$data->validate_id ==1',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
								$.fn.yiiGridView.update("g-target-setting-grid1", {
									data: $(this).serialize()
								});
							}',
                        ),
                        'class' => 'btn btn-mini btn-primary',
                    ),
                ),
            ),
        ),
        array(
            'header' => 'Status',
            'name' => 'validate.name',
        ),
    ),
));
?>

<?php

echo $this->renderPartial('_formTargetSetting', array('model' => $modelTargetSetting, 'year' => $year));
