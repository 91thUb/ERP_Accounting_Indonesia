<?php
/* @var $this HVacancyController */
/* @var $model hVacancy */

$this->breadcrumbs = array(
    'H Vacancies' => array('index'),
    'Create',
);

$this->menu7 = hVacancy::model()->topRecentVacancy;

$this->menu = array(
    array('label' => 'Vacancy', 'icon' => 'home', 'url' => array('/m1/hVacancy')),
    array('label' => 'Applicant', 'icon' => 'user', 'url' => array('/m1/hApplicant')),
    array('label' => 'Selection Registration', 'icon' => 'tint', 'url' => array('/m1/jSelection')),
    array('label' => 'Interview', 'icon' => 'volume-up', 'url' => array('/m1/hVacancy/interview')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);
$this->menu4 = hVacancyApplicant::model()->topRecentInterview;
$this->menu8 = hApplicant::model()->topRecentApplicant;
?>

<div class="page-header">
    <h1>
        <i class="fa fa-paper-clip fa-fw"></i>
        Update</h1>
</div>
<?php
echo $this->renderPartial('_form', array('model' => $model));
