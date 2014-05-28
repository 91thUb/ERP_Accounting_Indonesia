<?php
Yii::app()->getClientScript()->registerCoreScript('maskedinput');
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('dp', "
		$(function() {
		
		$( \"#" . CHtml::activeId($modelMember, 'complete_name') . "\" ).autocomplete({
			'minLength' : 2,
			'source': ' " . Yii::app()->createUrl('/sSms/addressAutoComplete') . "',
			'focus': function( event, ui ) {
			$(\"#" . CHtml::activeId($modelMember, 'complete_name') . "\").val(ui.item.label);
			return false;
			},
			'select': function( event, ui ) {
			$(\"#" . CHtml::activeId($modelMember, 'pid') . "\").val(ui.item.id);
			return false;
			},
		});
				

});

		");
?>
<?php
$this->renderPartial('_menu');
?>

<div class="page-header">
    <h1><?php echo $model->group_name; ?></h1>
</div>

<?php
$this->widget('TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'group_name',
        'description',
        array(
            'label' => 'Total Member Group',
            'value' => $model->getListMembers()->totalItemCount,
        )
    ),
));
?>

<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 's-addressbook-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($modelMember); ?>

<?php echo $form->hiddenField($modelMember, 'pid', array('class' => 'span4')); ?>
<?php echo $form->textFieldRow($modelMember, 'complete_name', array('class' => 'span4')); ?>

<div class="form-actions">
    <?php echo CHtml::htmlButton('<i class="fa fa-ok fa-fw"></i>Create', array('class' => 'btn', 'type' => 'submit')); ?>
</div>

<?php $this->endWidget(); ?>


<h4>List of Members</h4>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $model->getListMembers(),
    'itemView' => '_viewMemberList',
));
?>
