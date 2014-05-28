<?php
$this->breadcrumbs = array(
    'broadcast' => array('broadcast'),
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
    <h1>Broadcast: <?php echo $modelVacancy->vacancytitle ?></h1>
</div>

<div class="raw">
    <div class="span10">
        <?php
        $form = $this->beginWidget('TbActiveForm', array(
            'id' => 'c-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textAreaRow($model, 'receiver', array('class' => 'span10', 'rows' => 4)); ?>

        <?php echo $form->textFieldRow($model, 'subject', array('class' => 'span10')); ?>

        <?php //echo $form->textAreaRow($model,'body',array('class'=>'span7', 'rows'=>25));  ?>

        <div class="control-group">
            <?php echo $form->labelEx($model, 'body', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php
                $this->widget('ext.tinymce.TinyMce', array(
                    'model' => $model,
                    'attribute' => 'body',
                    // Optional config
                    'compressorRoute' => 'sCompanyNews/compressor',
                    'spellcheckerRoute' => 'sCompanyNews/spellchecker',
                        //'fileManager' => array(
                        //	'class' => 'ext.elFinder.TinyMceElFinder',
                        //	'connectorRoute'=>'sFileBrowser/connectorPublicFolder',
                        //),
                        //'htmlOptions' => array(
                        //	'rows' => 6,
                        //	'cols' => '100%',
                        //),
                ));
                ?>
            </div>
        </div>

        <div class="form-actions">
            <?php echo CHtml::htmlButton('<i class="fa fa-ok fa-fw"></i>Submit', array('class' => 'btn', 'type' => 'submit')); ?>
        </div>
        <?php //echo CHtml::submitButton('Submit');  ?>

        <?php $this->endWidget(); ?>


    </div>
</div>
