<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker3', "
		$(function() {
			$( \"#" . CHtml::activeId($model, 'birth_date') . "\" ).datepicker({
				'dateFormat' : 'dd-mm-yy',
			});
			$( \"#" . CHtml::activeId($model, 'relation_id') . "\" ).change(function() {
				if ($(this).val() == '1') {
					$( \"#" . CHtml::activeId($model, 'sex_id') . "\" ).html('<option value=\"1\">Male</option><option selected=\"selected\" value=\"2\">Female</option>');
					$( \"#" . CHtml::activeId($model, 'payroll_cover_id') . "\" ).html('<option selected=\"selected\" value=\"1\">Covered</option><option value=\"2\">Not Covered</option><option value=\"3\">Other</option>');
				} else if ($(this).val() == '2') {
					$( \"#" . CHtml::activeId($model, 'sex_id') . "\" ).html('<option selected=\"selected\" value=\"1\">Male</option><option value=\"2\">Female</option>');
					$( \"#" . CHtml::activeId($model, 'payroll_cover_id') . "\" ).html('<option value=\"1\">Covered</option><option selected=\"selected\" value=\"2\">Not Covered</option><option value=\"3\">Other</option>');
				} else if ($(this).val() == '3') {
					$( \"#" . CHtml::activeId($model, 'payroll_cover_id') . "\" ).html('<option selected=\"selected\" value=\"1\">Covered</option><option value=\"2\">Not Covered</option><option value=\"3\">Other</option>');
				} else if ($(this).val() == '4') {
					$( \"#" . CHtml::activeId($model, 'payroll_cover_id') . "\" ).html('<option value=\"1\">Covered</option><option selected=\"selected\" value=\"2\">Not Covered</option><option value=\"3\">Other</option>');
				} else if ($(this).val() == '5') {
					$( \"#" . CHtml::activeId($model, 'payroll_cover_id') . "\" ).html('<option value=\"1\">Covered</option><option selected=\"selected\" value=\"2\">Not Covered</option><option value=\"3\">Other</option>');
				} else if ($(this).val() == '6') {
					$( \"#" . CHtml::activeId($model, 'payroll_cover_id') . "\" ).html('<option value=\"1\">Covered</option><option selected=\"selected\" value=\"2\">Not Covered</option><option value=\"3\">Other</option>');
				} else {
					$( \"#" . CHtml::activeId($model, 'sex_id') . "\" ).html('<option selected=\"selected\" value=\"1\">Male</option><option value=\"2\">Female</option>');
				}
			});

			
		});


");
?>

<div class="row">
    <div class="span9">

        <?php
        $form = $this->beginWidget('TbActiveForm', array(
            'id' => 'g-person-family-form',
            'enableAjaxValidation' => false,
            'type' => 'horizontal',
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model, 'f_name', array('class' => 'span4')); ?>

        <?php echo $form->dropDownListRow($model, 'relation_id', sParameter::items('HK')); ?>

        <?php echo $form->textFieldRow($model, 'birth_place', array()); ?>

        <?php echo $form->textFieldRow($model, 'birth_date'); ?>

        <?php echo $form->dropDownListRow($model, 'sex_id', sParameter::items('cKelamin')); ?>

        <?php echo $form->textAreaRow($model, 'remark', array('class' => 'span4', 'rows' => 3)); ?>

        <?php echo $form->dropDownListRow($model, 'payroll_cover_id', sParameter::items('cCover')); ?>
        <!-- form -->

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
    </div>
</div>

