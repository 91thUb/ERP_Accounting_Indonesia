<?php

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'method' => 'get',
    'id' => 'searchForm',
    'htmlOptions' => array('class' => 'form-inline'),
        ));
?>

<?php echo $form->textField($model, 'subject', array('class' => 'span7', 'maxlength' => 100)); ?>

<?php

$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => 'Search',
    'icon' => 'search'
));
?>

<?php $this->endWidget(); ?>

