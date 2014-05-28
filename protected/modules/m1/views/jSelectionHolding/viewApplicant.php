<?php
$this->breadcrumbs = array(
    'Applicant' => array('index'),
    $model->id,
);

//$this->menu5 = array('Applicant');
//$this->menu7 = hApplicant::model()->topRecentApplicant;

$this->menu = array(
    array('label' => 'Vacancy', 'icon' => 'home', 'url' => array('/m1/hVacancy')),
    array('label' => 'Applicant', 'icon' => 'user', 'url' => array('/m1/hApplicant')),
    array('label' => 'Selection Registration', 'icon' => 'tint', 'url' => array('/m1/jSelection')),
    array('label' => 'Interview', 'icon' => 'volume-up', 'url' => array('/m1/hVacancy/interview')),
    array('label' => 'Print CV', 'icon' => 'print', 'url' => array('printCv', 'id' => $model->id)),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
        //array('label' => 'Transfer', 'icon' => 'forward', 'url' => '#', 'linkOptions' => array('submit' => array('transfer', 'id' => $model->id), 'confirm' => 'Are you sure you want to transfer this employee to Person Administration?')),
);
?>

<?php $this->beginContent('/layouts/column1N'); ?>


<div class="page-header">
    <h1>
        <i class="fa fa-copy fa-fw"></i>
        <?php echo $model->applicant_name; ?>
    </h1>
</div>

<div class="row">
    <div class="span2">
        <p><?php echo $model->photoPath; ?></p>
    </div>
    <div class="span7">
        <?php
        $this->widget('bootstrap.widgets.TbTabs', array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array('label' => 'Selection Process', 'content' => $this->renderPartial("/hApplicant/_tabSelection", array("model" => $model), true), 'active' => true),
                array('label' => 'Candidate Profile', 'content' => $this->renderPartial("/hApplicant/_tabDetail", array("model" => $model), true)),
            ),
        ));
        ?>

    </div>
</div>

<?php
$this->endContent();

