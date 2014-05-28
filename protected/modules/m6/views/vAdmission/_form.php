

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'v-admission-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'student_name', array('class' => 'span5', 'maxlength' => 75)); ?>

<?php echo $form->textFieldRow($model, 'birth_place', array('class' => 'span3', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'birth_date', array('class' => 'span3')); ?>

<?php echo $form->dropDownListRow($model, 'gender_id', array('1' => 'Male', '2' => 'Female')); ?>

<?php echo $form->textAreaRow($model, 'address1', array('class' => 'span5', 'rows' => 3)); ?>

<?php echo $form->textFieldRow($model, 'home_phone', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'handphone', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->dropDownListRow($model, 'faculty_id', array()); ?>

<?php echo $form->dropDownListRow($model, 'major_id', array()); ?>

<?php //echo $form->textFieldRow($model,'high_school',array('class'=>'span5','maxlength'=>100));  ?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'high_school', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model' => $model,
            'attribute' => 'high_school',
            'source' => $this->createUrl('/m6/vAdmission/acHighSchool'),
            'options' => array(
                'minLength' => '2',
            //'focus'=> 'js:function( event, ui ) {
            //	$("#'.CHtml::activeId($model,'c_ganti').'").val(ui.item.label);
            //	return false;
            //}',
            ),
            'htmlOptions' => array(
                'class' => 'input-medium',
                'placeholder' => 'Search Name',
                'class' => 'span4',
            ),
        ));
        ?>
    </div>
</div>

<?php echo $form->textAreaRow($model, 'remark', array('class' => 'span5', 'rows' => 4)); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
