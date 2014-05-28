<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'student_name', array('class' => 'span5', 'maxlength' => 75)); ?>

<?php echo $form->textFieldRow($model, 'birth_place', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'birth_date', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'gender_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'address1', array('class' => 'span5', 'maxlength' => 300)); ?>

<?php echo $form->textFieldRow($model, 'home_phone', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'handphone', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'faculty_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'major_id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'remark', array('class' => 'span5', 'maxlength' => 300)); ?>

<?php echo $form->textFieldRow($model, 'created_date', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'created_by', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'updated_date', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'updated_by', array('class' => 'span5')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
