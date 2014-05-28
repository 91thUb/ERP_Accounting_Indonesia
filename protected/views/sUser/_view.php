<?php
/* @var $this SUserSController */
/* @var $data sUser */
?>

<div class="row">
    <?php /*
      <div class="span1 well">
      <?php
      echo $data->photoPath;
      ?>
      </div>
     */ ?>
    <div class="span5">
        <h4><?php echo CHtml::link($data->username, Yii::app()->createUrl('/sUser/view', array('id' => $data->id))); ?>
            | <?php echo CHtml::link('rights', Yii::app()->createUrl('/rights/assignment/user', array('id' => $data->id))); ?>
            <small><?php echo waktu::nicetime($data->last_login); ?></small>
        </h4>
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => array(
                'id' => 1,
                'full_name' => $data->full_name,
                'sso' => CHtml::link($data->sso(), Yii::app()->createUrl('m1/gPerson/view', array('id' => $data->ssoId()))),
                'module' => implode(" | ", $data->moduleMember),
                'right' => implode(" | ", $data->rightMember),
                'groupmember' => implode(" | ", $data->myGroupMember),
                'status' => $data->status->name,
            ),
            'attributes' => array(
                array('name' => 'full_name', 'label' => 'Full Name'),
                array('name' => 'sso', 'type' => 'raw', 'label' => 'SSO'),
                array('name' => 'module', 'label' => 'Module List ' . CHtml::tag("span", array('class' => 'badge badge-info'), $data->moduleCount)),
                array('name' => 'right', 'label' => 'Right List ' . CHtml::tag("span", array('class' => 'badge badge-info'), $data->rightCount)),
                array('name' => 'groupmember', 'label' => 'Group Member ' . CHtml::tag("span", array('class' => 'badge badge-info'), $data->groupCount + 1)),
                array('name' => 'status', 'label' => 'Status'),
            ),
        ));
        ?>
    </div>
</div>

