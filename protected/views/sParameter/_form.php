<?php
$form = $this->beginWidget('TbActiveForm', array(
    'id' => 'parameter-form',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>

<div class="control-group">
    <?php echo $form->labelEx($model, 'type', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model' => $model,
            'attribute' => 'type',
            'value' => $this->createUrl('SParameter/TParameter'),
            'source' => $this->createUrl('SParameter/TParameter'),
            'options' => array(
                'minLength' => '2',
            ),
            'htmlOptions' => array(
            ),
        ));
        ?>
    </div>
</div>


<?php echo $form->textFieldRow($model, 'code'); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span3')); ?>

<?php echo $form->dropDownListRow($model, 'status_id', sParameter::items("cStatus")); ?>

<div class="form-actions">
    <?php //echo CHtml::htmlButton($model->isNewRecord ? '<i class="fa fa-ok fa-fw"></i>Create':'<i class="fa fa-ok fa-fw"></i>Save', array('class'=>'btn', 'type'=>'submit'));  ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>

</div>


<?php $this->endWidget(); ?>
