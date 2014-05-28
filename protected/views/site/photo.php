<?php
$this->breadcrumbs = array(
    'Photo News' => array('/site/photo'),
);
?>


<?php
$dir = Yii::app()->basePath . "/../shareimages/photo";
$contents = scandir($dir, 1);
$counter = 1;

$dir2 = Yii::app()->basePath . "/../shareimages/photo2/";
$contents2 = scandir($dir2, 1);
?>

<div class="row">
    <div class="span9">

        <?php /*
          $dependency = new CDirectoryCacheDependency(Yii::app()->basePath.'/../shareimages/photo/');

          if (!Yii::app()->cache->get('photolist')) {
          $photoList=$this->renderPartial("_photoRender",array('contents'=>$contents,'dir'=>$dir,'counter'=>$counter),true);

          Yii::app()->cache->set('photolist'.Yii::app()->user->id,$photoList,86400,$dependency);
          } else
          $photoList=Yii::app()->cache->get('photolist');

          echo $photoList;
         */ ?>

        <?php
        $this->widget('ext.albumPhoto', array('dir' => Yii::app()->basePath . "/../shareimages/photo",
            'columns' => 3,
            'span' => 3,
            'limit' => 6,
        ));
        ?>

        <p>
            <strong><?php echo CHtml::link('All Photo >>', Yii::app()->createUrl('/site/photoAll')); ?></strong>				
        </p>
        <hr/>

        <h3><?php echo "Business Unit Activity Info" ?></h3>

        <p><?php echo "" ?></p>


        <?php
        $counter = 1;

        $dependency = new CDirectoryCacheDependency($dir);

        if (!Yii::app()->cache->get('photoalbumlist2' . $dir)) {

            $photoAlbumList = $this->renderPartial("_photoAlbumRender2", array('contents' => $contents2, 'dir2' => $dir2, 'counter' => $counter), true);

            //Yii::app()->cache->set('photoalbumlist'.$id,$photoAlbumList,86400,$dependency);
        } else
            $photoAlbumList = Yii::app()->cache->get('photoalbumlist2' . $dir);

        echo $photoAlbumList;
        ?>





    </div>
    <div class="span3">
        <?php $this->renderPartial("_category", array('category_id' => 1)) ?>
        <?php //$this->renderPartial("_category",array('category_id'=>2))  ?>
        <?php $this->renderPartial("_category", array('category_id' => 3)) ?>
    </div>

    <div class="pull-right">
        <p>
            <strong><?php echo CHtml::link('News Index', Yii::app()->createUrl('/sCompanyNews')); ?></strong>				
        </p>
    </div>

</div>


<?php $this->renderPartial("_tabSocNet", array()) ?>
