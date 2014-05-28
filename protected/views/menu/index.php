<?php /*
  <?php $this->widget('ext.tooltipster.tooltipster'); ?>

  <a href="http://www.yiiframework.com" class="tooltipster" title="This is my link's tooltip message!">
  Link
  </a>

  <div class="tooltipster" title="This is my div's tooltip message!">
  <p>This div has a tooltip when you hover over it!</p>
  </div>
 */ ?>

<?php
//	$this->widget('ext.PNotify.PNotify',array( 
//		'message'=>'I am really a very simple notification')
//	);
//<script>
//$.notify("Hello World");    
//</script>



?>



<?php
$isExist = is_file(Yii::app()->basePath . "/views/site/theme.php");
if ($isExist) {
    $this->renderPartial('/site/theme');
}
?>

<div class="row">
    <div class="span8">
        <?php
        include(Yii::app()->basePath . '/config/personalizeContent.php');
        ?>
    </div>

    <div class="span4">
        <?php
        include(Yii::app()->basePath . '/config/personalizeSidebar.php');
        ?>
    </div>

</div>

