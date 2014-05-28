<?php

/** @var TbActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'method' => 'get',
    'id' => 'searchForm',
    //'action'=>Yii::app()->createUrl('/m1/gPerson/view',array("id"=>$_GET['name']),
    'htmlOptions' => array('class' => 'form-inline'),
        ));
?>

<?php echo $form->textField($model, 'name', array('class' => 'span3')); ?>
<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => 'Search',
    'icon' => 'search'
));
?>

<?php $this->endWidget(); ?>

