<div id="form">

    <?php
    $this->widget('ext.EChosen.EChosen', array(
        'target' => 'select',
    ));
    ?>

    <?php
    $form = $this->beginWidget('TbActiveForm', array(
        'id' => 'matrix-user-module-formAdd',
        //'type'=>'horizontal',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model, 's_module_id', sModule::itemsAll(), array('class' => 'span4', 'multiple' => 'multiple')); ?>

    <?php //echo $form->dropDownListRow($model,'s_matrix_id', sMatrix::items('sMatrix'),array('class'=>'span3'));  ?>
    <?php echo $form->dropDownListRow($model, 's_matrix_id', array("5" => "admin"), array('class' => 'span3')); ?>

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