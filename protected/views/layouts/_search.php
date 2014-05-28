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
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model' => $model,
    'attribute' => 'employee_name',
    'source' => $this->createUrl('/m1/gPerson/personAutoComplete'),
    'options' => array(
        'minLength' => '2',
        'focus' => 'js:function( event, ui ) {
					$("#' . CHtml::activeId($model, 'employee_name') . '").val(ui.item.label);
					return false;
					}',
        'select' => 'js:function( event, ui ) {
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


<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => 'Search',
    'icon' => 'search'
));
?>

<?php $this->endWidget(); ?>
