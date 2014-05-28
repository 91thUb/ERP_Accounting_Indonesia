<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl('/m1/hVacancy/index'),
    'method' => 'get',
    'id' => 'searchForm',
    'htmlOptions' => array('class' => 'form-inline'),
        ));
?>

<?php echo $form->textField($model, 'vacancy_title', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo CHtml::htmlButton('<i class="fa fa-search fa-fw"></i>Search', array('class' => 'btn', 'type' => 'submit')); ?>

<?php $this->endWidget(); ?>
