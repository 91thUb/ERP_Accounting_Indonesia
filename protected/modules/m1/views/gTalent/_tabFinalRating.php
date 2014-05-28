<?php

//echo $this->renderPartial("_summaryPerformance", array("model" => $model), true);
?>


<?php

$this->widget('TbGridView', array(
    'id' => 'g-performance-grid',
    'dataProvider' => gTalentPerformance::model()->search($model->id),
    //'filter'=>$model,
    'template' => '{items}',
    'columns' => array(
        'input_date',
        'year',
        'period.name',
        //'amount',
        'pa_value',
        'potential',
        //'future_dev',
        //array(
        //    'header' => 'Performance Value',
        //    'value' => '$data->valPerformance()',
        //),
        'remark',
        array(
            'class' => 'EJuiDlgsColumn',
            'template' => '{update}{delete}',
            //'updateButtonImageUrl'=>Yii::Yii::app()->baseUrl .'images/viewdetaildialog.png',
            'deleteButtonUrl' => 'Yii::app()->createUrl("m1/gTalent/deletePerformance",array("id"=>$data->id))',
            'updateDialog' => array(
                'controllerRoute' => 'm1/gTalent/updatePerformance',
                'actionParams' => array('id' => '$data->id'),
                'dialogTitle' => 'Update Performance',
                'dialogWidth' => 512, //override the value from the dialog config
                'dialogHeight' => 530
            ),
            'visible' => ($this->id == "gTalent"),
        ),
    ),
));
?>

<?php

if (isset($modelPerformanceR))
    echo $this->renderPartial('_formFinalRating', array('model' => $modelPerformanceR));