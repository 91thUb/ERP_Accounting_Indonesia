<?php
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    'SQL Statement',
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-flask fa-fw"></i>
        SQL Statement</h1>
</div>



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm'); ?>

<?php echo $form->textAreaRow($model, 'sql', array('rows' => 8, 'class' => 'span12')); ?>

<div class="form-actions">
    <?php //echo CHtml::htmlButton($model->isNewRecord ? '<i class="fa fa-ok fa-fw"></i>Create':'<i class="fa fa-ok fa-fw"></i>Save', array('class'=>'btn', 'type'=>'submit'));  ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Execute',
    ));
    ?>

</div>

<?php $this->endWidget(); ?>


