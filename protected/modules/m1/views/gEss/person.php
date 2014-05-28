<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<div class="row">
    <div class="span2">
        <?php
        echo $model->photoPath;
        ?>

        <p>
        <ul class="unstyled">
            <li style="font-size:11px">Data Completeness <span class="pull-right strong"><?php echo number_format($model->completion, 0) ?>%</span>
                <?php
                $this->widget('bootstrap.widgets.TbProgress', array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $model->completion,
                    'htmlOptions' => array(
                        'style' => 'height:7px',
                    )
                ));
                ?>
            </li>
        </ul>		
        </p>

    </div>
    <div class="span7">
        <?php echo $this->renderPartial('/gPerson/_personalInfo', array('model' => $model)); ?>
    </div>
</div>

<div class="row">
    <div class="span9">
        <?php
        $carC = ($model->many_careerC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_careerC) : "";
        $staC = ($model->many_statusC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_statusC) : "";
        $expC = ($model->many_experienceC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_experienceC) : "";
        $eduC = ($model->many_educationC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_educationC) : "";
        $famC = ($model->many_familyC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_familyC) : "";
        $othC = ($model->many_otherC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_otherC) : "";
        $edunfC = ($model->many_educationnfC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_educationnfC) : "";
        $traC = ($model->many_trainingC != 0) ? CHtml::tag("span", array('class' => 'badge badge-info'), $model->many_trainingC) : "";

        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'encodeLabel' => false,
            'tabs' => array(
                array('label' => 'Detail', 'content' => $this->renderPartial("/gPerson/_tabDetail", array("model" => $model), true), 'active' => true),
                array('label' => 'Career ' . $carC . ' - Experience ' . $expC . ' - Status ' . $staC, 'content' => $this->renderPartial("/gPersonHolding/_mainCareerExperienceStatus", array("model" => $model), true)),
                //array('label'=>'Internal Career'.$carC,'content'=>$this->renderPartial("/gPerson/_tabCareer", array("model"=>$model), true)),
                //array('label'=>'Experience'.$expC,'content'=>$this->renderPartial("/gPerson/_tabExperience", array("model"=>$model), true)),
                //array('label'=>'Status'.$staC,'content'=>$this->renderPartial("/gPerson/_tabStatus", array("model"=>$model), true)),
                array('label' => 'Education ' . $eduC, 'content' => $this->renderPartial("/gPersonHolding/_mainEducation", array("model" => $model), true)),
                //array('label'=>'Education'.$eduC,'content'=>$this->renderPartial("/gPerson/_tabEducation", array("model"=>$model), true)),
                //array('label'=>'Non Formal Education'.$edunfC,'content'=>$this->renderPartial("/gPerson/_tabEducationNf", array("model"=>$model), true)),
                array('label' => 'Training ' . $traC, 'content' => $this->renderPartial("/gPersonHolding/_mainTraining", array("model" => $model), true)),
                array('label' => 'Family ' . $famC, 'content' => $this->renderPartial("/gPerson/_tabFamily", array("model" => $model), true)),
                array('label' => 'Other ' . $othC, 'content' => $this->renderPartial("/gPerson/_tabOther", array("model" => $model, "modelOther" => $modelOther), true)),
            ),
        ));
        ?>

        <?php $this->renderPartial('_sameDepartmentE', array('model' => $model)); ?>

    </div>
</div>
