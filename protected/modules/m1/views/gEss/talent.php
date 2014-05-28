<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>

<div class="page-header">
    <h1>
        <i class="fa fa-leaf fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<div class="row">
    <div class="span3">
        <div class="well" style="text-align: center">
            <h3> <?php
                if ($model->mGolonganId() >= 10) {
                    echo $model->targetSettingC;
                } else
                    echo $model->workResultC;
                ?></h3>
            <h6><font COLOR="#999">Work Result</font></h6>
        </div>
    </div>

    <div class="span3">
        <div class="well" style="text-align: center">
            <h3> <?php echo $model->coreCompetencyC ?> </h3>
            <h6><font COLOR="#999">Core Competency</font></h6>
        </div>
    </div>

    <div class="span3">
        <div class="well" style="text-align: center">
            <h3> <?php echo $model->leadershipCompetencyC ?> </h3>
            <h6><font COLOR="#999">Leadership Competency</font></h6></td>
        </div>
    </div>
</div>

<br/>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => '<< Previous Year', 'url' => Yii::app()->createUrl("/m1/gEss/talent", array("year" => $year - 1))),
        array('label' => $year,
            'url' => Yii::app()->createUrl("/m1/gEss/talent", array("year" => $year))),
        array('label' => 'Next Year >>', 'visible' => ($year != date("Y")), 'url' => Yii::app()->createUrl("/m1/gEss/talent", array("year" => $year + 1))),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>


<div class="row">
    <div class="span9">
        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array('id' => 'tab41', 'label' => 'KPI', 'content' => $this->renderPartial("_tabTalentTargetSetting2", array('modelTargetSetting' => $modelTargetSetting, "model" => $model, "year" => $year), true), 'visible' => $model->mGolonganId() >= 10, 'active' => true),
                array('id' => 'tab44', 'label' => 'Work Result', 'content' => $this->renderPartial("_tabTalentWorkResult2", array("model" => $model, "year" => $year), true), 'visible' => $model->mGolonganId() < 10, 'active' => true),
                array('id' => 'tab42', 'label' => 'Core Competency', 'content' => $this->renderPartial("_tabTalentCoreCompetency2", array('modelCoreCompetency' => $modelCoreCompetency, "model" => $model, "year" => $year), true)),
                array('id' => 'tab43', 'label' => 'Leadership Competency', 'content' => $this->renderPartial("_tabTalentLeadershipCompetency2", array('modelLeadershipCompetency' => $modelLeadershipCompetency, "model" => $model, "year" => $year), true)),
            ),
        ));
        ?>
    </div>
</div>


<hr/>
