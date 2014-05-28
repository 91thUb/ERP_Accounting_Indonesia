<?php
/* @var $this SAddressbookController */
/* @var $model sAddressbook */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . "/css/select2-3.4.1/select2.js");
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . "/css/select2-3.4.1/select2.css");


Yii::app()->clientScript->registerScript('sel2', "
		$(function() {
		$( \"#" . CHtml::activeId($model, 'member_of') . "\" ).select2(
			{tags:" . sAddressbookGroup::model()->getGroupList() . "}
		);

		$( \"textarea#" . CHtml::activeId($model, 'message') . "\" ).maxlength({
			alwaysShow: true
		});

		});


");
?>


<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 's-addressbook-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'complete_name', array('class' => 'span4')); ?>
<?php echo $form->textFieldRow($model, 'title', array('class' => 'span3')); ?>
<?php echo $form->textFieldRow($model, 'handphone', array('hint' => 'start with number 8 or 21 AND not +62 or 0', 'prepend' => '+62', 'class' => 'span3')); ?>
<?php echo $form->textFieldRow($model, 'company_name', array('class' => 'span6')); ?>
<?php echo $form->textAreaRow($model, 'address', array('class' => 'span5', 'rows' => 3)); ?>
<?php echo $form->textFieldRow($model, 'email', array('class' => 'span3')); ?>
<?php echo $form->textFieldRow($model, 'member_of', array('class' => 'span9')); ?>
<br/>

<div class="form-actions">
    <?php echo CHtml::htmlButton($model->isNewRecord ? '<i class="fa fa-ok fa-fw"></i>Create' : '<i class="fa fa-ok fa-fw"></i>Save', array('class' => 'btn', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>

