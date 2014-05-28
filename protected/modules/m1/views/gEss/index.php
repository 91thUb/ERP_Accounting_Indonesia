<?php /*
  $cs=Yii::app()->clientScript;
  $cs->registerScriptFile(Yii::app()->baseUrl.'/css/snow-effect/snowfall.jquery.js',CClientScript::POS_END);

  Yii::app()->clientScript->registerScript('snow', "
  $(function() {
  $(document).snowfall(
  {
  flakeCount : 150,        // number
  flakeColor : '#fff', // string
  flakeIndex: 999999,     // number
  minSize : 2,            // number
  maxSize : 8,            // number
  minSpeed : 2,           // number
  maxSpeed : 6,           // number
  round : true,          // bool
  shadow : true          // bool
  }
  );


  });

  ");
 */
?>


<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>


<div class="page-header">
    <h1>
        <i class="fa fa-leaf fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>

<?php echo $this->renderPartial("_tabRequest", array(), true); ?>

<?php echo $this->renderPartial("_tabAnnouncement", array(), true); ?>

<?php echo $this->renderPartial("_tabAttendance", array('model' => $model), true); ?> 

<?php echo $this->renderPartial("_tabMailbox", array(), true); ?>

<?php //echo $this->renderPartial("_tabQuote", array(), true); ?>

<?php echo $this->renderPartial("_tabForum", array('threadsProvider' => $threadsProvider,), true); ?>

<br/>
<?php echo $this->renderPartial("_tabLearning", array(), true); ?>

