<style>
    tr.highlight
    {
        background: #f5f5f5;
        //font-weight:bold;
    }
    tr.white
    {
        background: #FFFFFF;
    }
</style>



<?php
$this->breadcrumbs = array(
    'Notification' => array('index'),
    'index',
);


$this->menu = array(
//array('label'=>'Create', 'url'=>array('create')),
);

//$this->menu4=ModelNotifyii::getTopOther();
?>

<div class="page-header">
    <h1>
        <i class="fa fa-bars fa-fw"></i>
        Notification Manager
    </h1>
</div>

<div class="row">
    <div class="span8">
        <?php
        if (Yii::app()->user->name == "admin" || sUser::model()->rightCountM > 2 || !Yii::app()->user->checkAccess('HR ESS Staff')) {
            ?>

            <div class="pull-right">
                <?php
                $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'buttons' => array(
                        array('label' => 'Mark All as Read', 'url' => Yii::app()->createUrl('/sNotification/markRead')),
                    ),
                ));
                ?>
            </div>
            <br/>


            <?php
//Yii::app()->clientScript->registerScript('refreshGridView', "
//setInterval(\"$.fn.yiiGridView.update('notification-grid')\",30000);
//");

            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'notification-grid',
                'dataProvider' => $dataProvider,
                'itemsCssClass' => 'table table-condensed',
                'template' => '{items}{pager}',
                'rowCssClassExpression' => '$data->cssUnread()',
                'columns' => array(
                    array(
                        'header' => '',
                        'type' => 'raw',
                        'value' => '$data->photoPath',
                        'htmlOptions' => array(
                            'style' => 'width:40px',
                        )
                    ),
                    array(
                        'header' => 'Detail',
                        'type' => 'raw',
                        //'value' =>'$data->linkReplace',
                        'value' => function($data) {
                    return $data->linkReplace
                            . CHtml::tag("div", array('style' => 'color:grey;font-size:12px; margin-bottom:10px;'), ($data->company_id) == 0 ? "All" : $data->company->name);
                }
                    ),
                    array(
                        'header' => 'Time',
                        'type' => 'raw',
                        'value' => function($data) {
                    return $data->author_name
                            . CHtml::tag("div", array('style' => 'color:grey;font-size:12px;'), waktu::nicetime($data->expire));
                }
                    ),
                //'author_name',
                ),
            ));
        }
        ?>
    </div>
    <div class="span4">

        <?php
        $dir2 = Yii::app()->basePath . "/../shareimages/photo/";
        $this->widget('ext.albumPhoto', array('dir' => $dir2,
            'columns' => 2,
            'span' => 2,
            'limit' => 10,
            'header' => 5,
            'descLimit' => 10
        ));
        ?>


    </div>
</div>


