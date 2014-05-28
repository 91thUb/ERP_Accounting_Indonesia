<?php
$this->breadcrumbs = array(
    'Applicant' => array('index'),
);

$this->menu5 = array('Applicant');
$this->menu7 = hApplicant::model()->topRecentApplicant;


$this->menu = array(
    array('label' => 'Vacancy', 'icon' => 'home', 'url' => array('/m1/hVacancy')),
    array('label' => 'Applicant', 'icon' => 'user', 'url' => array('/m1/hApplicant')),
    array('label' => 'Selection Registration', 'icon' => 'tint', 'url' => array('/m1/jSelection')),
    array('label' => 'Interview', 'icon' => 'volume-up', 'url' => array('/m1/hVacancy/interview')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
    $.fn.yiiListView.update('applicantList', { 
        data: $(this).serialize()
    });
    return false;
});


");
?>

<?php $this->beginContent('//layouts/column1N'); ?>


<div class="page-header">
    <h1>
        <i class="fa fa-copy fa-fw"></i>
        Applicant
    </h1>
</div>

<?php
//	Yii::app()->user->setFlash('info', '<strong>Good News!</strong> Saat ini, Pendaftaran Registrasi peserta Assessment, tidak perlu lagi diinput ke database Applicant.
//	 Anda bisa langsung ke Selection Registration, pilih tanggal assessment dan masukan daftar karyawan di business unit masing-masing yang akan di assessment. 
//	 Mekanisme pendaftaran peserta psikotes tidak berubah... ');
?>


<?php
echo $this->renderPartial('_search', array('model' => $model));
?>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'id' => 'applicantList',
    'itemView' => '_view',
));
?>

<?php
$this->endContent();
