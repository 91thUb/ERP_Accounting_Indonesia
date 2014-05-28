<?php
$this->breadcrumbs = array(
    'G people' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gPersonHolding')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);


$this->menu1 = gPerson::getTopUpdated();
$this->menu2 = gPerson::getTopCreated();

//$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gPerson/index'));
?>

<?php
$this->renderPartial('_search', array(
    'model' => $model,
));
?>


<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<div class="row">
    <div class="span2">
        <?php echo $model->PhotoPath; ?>

        <div style="text-align:center; padding:10px 0">
            <?php echo CHtml::link('Print Profile', Yii::app()->createUrl('/m1/gPersonHolding/printProfile', array('id' => $model->id)), array('class' => 'btn btn-mini btn-primary', 'target' => '_blank'))
            ?>
        </div>


    </div>
    <div class="span7">
        <?php echo $this->renderPartial('/gPerson/_personalInfo', array('model' => $model)); ?>	

        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                //array('id'=>'tab1','label'=>'Performance','content'=>$this->renderPartial("_tabPerformance", array("model"=>$model,"modelPerformance"=>$modelPerformance), true),'active'=>true),
                //array('id'=>'tab2','label'=>'Potential','content'=>$this->renderPartial("_tabPotential", array("model"=>$model,"modelPotential"=>$modelPotential), true)),
                array('id' => 'tab3', 'label' => 'Career-Experience-Status', 'content' => $this->renderPartial("_mainCareerExperienceStatus", array("model" => $model), true), 'active' => true),
                array('id' => 'tab4', 'label' => 'Education', 'content' => $this->renderPartial("_mainEducation", array("model" => $model), true)),
                array('id' => 'tab8', 'label' => 'Training ', 'content' => $this->renderPartial("_mainTraining", array("model" => $model), true)),
                array('id' => 'tab5', 'label' => 'Family', 'content' => $this->renderPartial("/gPerson/_tabFamily", array("model" => $model), true)),
                array('id' => 'tab6', 'label' => 'Detail', 'content' => $this->renderPartial("/gPerson/_tabDetail", array("model" => $model), true)),
            ),
        ));
        ?>

    </div>
</div>

<hr/>

<div class="row">
    <div class="span6">
        <?php //echo $this->renderPartial('/gPerson/_sameDepartment',array('model'=>$model));  ?>	
    </div>
    <div class="span6">
        <?php //echo $this->renderPartial('/gPerson/_sameLevel',array('model'=>$model));  ?>	
    </div>
</div>
