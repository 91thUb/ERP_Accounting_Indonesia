<?php
$this->breadcrumbs = array(
    'Applicant' => array('/applicant'),
    'Create',
);

$this->menu7 = hApplicant::model()->topRecentApplicant;

$this->menu = array(
    array('label' => 'Vacancy', 'icon' => 'home', 'url' => array('/m1/hVacancy')),
    array('label' => 'Applicant', 'icon' => 'user', 'url' => array('/m1/hApplicant')),
    array('label' => 'Selection Registration', 'icon' => 'tint', 'url' => array('/m1/jSelection')),
    array('label' => 'Interview', 'icon' => 'volume-up', 'url' => array('/m1/hVacancy/interview')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
?>

<?php $this->beginContent('/layouts/column1N'); ?>

<div class="page-header">
    <h1>
        <i class="fa fa-copy fa-fw"></i>
        <?php echo "Create"; ?>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>

<?php $this->endContent(); ?>