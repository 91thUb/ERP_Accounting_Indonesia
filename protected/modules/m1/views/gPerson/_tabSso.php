<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'id' => 'grid-sso',
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'activation_code',
            'visible' => (!isset($model->user)),
        ),
        array(
            'name' => 'activation_expire',
            'value' => date("d-m-Y h:i", $model->activation_expire),
            'visible' => (!isset($model->user)),
        ),
        array(
            'label' => 'Current Username',
            'value' => (isset($model->user)) ? $model->user->username : null,
        ),
    ),
));
?>
<p>
    <?php
    if (!isset($model->user)) {
        echo CHtml::link('Generate Code', Yii::app()->createUrl("/m1/gPerson/updateSso", array("id" => $model->id)), array('class' => 'btn btn-primary')
        );
    } else
        echo CHtml::link('Reset Password', Yii::app()->createUrl("/m1/gPerson/resetSso", array("id" => $model->id, "userid" => $model->userid)), array('class' => 'btn btn-primary')
        );


    /* 	echo CHtml::ajaxLink('Generate Code', CHtml::normalizeUrl(array('/m1/gPerson/updateSso','id'=>$model->id)), array(
      'success' => 'function(data){
      $.fn.yiiGridView.update("grid-sso", {
      data: $(this).serialize()
      });
      }',
      ),
      array(
      //'id' => 'ajaxSubmitBtn',
      //'name' => 'ajaxSubmitBtn',
      'class' => 'btn btn-primary',
      ));
     */
    ?>	
</p>



