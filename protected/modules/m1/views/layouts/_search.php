<?php

Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
?>
<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => $action,
    'method' => 'get',
    'id' => 'searchForm',
    'htmlOptions' => array('class' => 'form-inline'),
        ));
?>

<?php //echo $form->textField($model,'employee_name',array('width'=>'100%','maxlength'=>100,'placeholder'=>'Search Name','prepend'=>'<i class="fa fa-search fa-fw"></i>')); ?>
<?php

$model->employee_name = null;
//$test=3492;
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model' => $model,
    'attribute' => 'employee_name',
    'source' => $this->createUrl('/m1/gPerson/personAutoCompletePhoto'),
    'options' => array(
        'minLength' => '2',
        'focus' => 'js:function( event, ui ) {
					$("#' . CHtml::activeId($model, 'employee_name') . '").val(ui.item.label);
					return false;
					}',
        'select' => 'js:function( event, ui ) {
					//window.location = "' . CHtml::normalizeUrl(array("gPerson/view", "id" => 3492)) . '";
					//window.location = "test"+ui.item.id;
					$("#searchForm").submit();
					return false;
					}',
    ),
    'htmlOptions' => array(
        'width' => '100%',
        'placeholder' => 'Search Name',
        'prepend' => '<i class="fa fa-search fa-fw"></i>',
    ),
));
?>


<?php echo CHtml::htmlButton('<i class="fa fa-search fa-fw"></i>', array('class' => 'btn', 'type' => 'submit')); ?>

<?php $this->endWidget(); ?>
