<h3>Career</h3>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'g-karir-grid',
    'dataProvider' => gPersonCareer::model()->search($model->id),
    //'filter'=>$model,
    'template' => '{items}',
    'columns' => array(
        'start_date',
        array(
            'header' => 'Status',
            'value' => 'isset($data->status->name) ? $data->status->name : ""',
        ),
        array(
            'header' => 'Company',
            'value' => 'isset($data->company->name) ? $data->company->name : ""',
        ),
        array(
            'header' => 'Department',
            'value' => 'isset($data->department->name) ? $data->department->name : ""',
        ),
        //'department_id',
        array(
            'header' => 'Level',
            'value' => 'isset($data->level->name) ? $data->level->name : ""',
        ),
        'job_title',
        array(
            'header' => 'Superior',
            'type' => 'raw',
            'value' => 'isset($data->superior) ? CHtml::link($data->superior->employee_name,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->superior_id))) : ""',
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{move}',
            'buttons' => array
                (
                'move' => array
                    (
                    'label' => 'Move to Experience',
                    'url' => 'Yii::app()->createUrl("/m1/gPersonHolding/move",array("id"=>$data->id))',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'js:function(data){
								$.fn.yiiGridView.update("g-karir-grid", {
									data: $(this).serialize()
								});
								$.fn.yiiGridView.update("g-person-experience-grid", {
									data: $(this).serialize()
								});
							}',
                        ),
                        'class' => 'btn btn-mini btn-primary',
                    ),
                ),
            ),
            'visible' => $this->id != "gEss",
        ),
    ),
));
?>

<h3>Experience</h3>
<?php echo $this->renderPartial('/gPerson/_tabExperience', array("model" => $model)); ?>

<h3>Status</h3>
<?php
echo $this->renderPartial('/gPerson/_tabStatus', array("model" => $model));
