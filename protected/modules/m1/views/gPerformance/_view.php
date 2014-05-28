<?php
/* @var $this GPerformanceController */
/* @var $data gPerformance */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
    <?php echo CHtml::encode($data->parent_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('individual_weight')); ?>:</b>
    <?php echo CHtml::encode($data->individual_weight); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('individual_target')); ?>:</b>
    <?php echo CHtml::encode($data->individual_target); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('individual_value')); ?>:</b>
    <?php echo CHtml::encode($data->individual_value); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('superior_value')); ?>:</b>
    <?php echo CHtml::encode($data->superior_value); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('superior_weight')); ?>:</b>
    <?php echo CHtml::encode($data->superior_weight); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
      <?php echo CHtml::encode($data->remark); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
      <?php echo CHtml::encode($data->created_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
      <?php echo CHtml::encode($data->created_by); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('updated_date')); ?>:</b>
      <?php echo CHtml::encode($data->updated_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
      <?php echo CHtml::encode($data->updated_by); ?>
      <br />

     */ ?>

</div>