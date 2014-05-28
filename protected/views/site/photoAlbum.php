<?php
$this->breadcrumbs = array(
    'Photo News' => array('/site/photo'),
    $id,
);

Yii::app()->getClientScript()
        ->registerScriptFile(Yii::app()->baseUrl . "/css/bootstrap-lightbox/jquery.bootstrap.simple.lightbox.js")
        ->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-lightbox/jquery.simple.lightbox.css');

Yii::app()->clientScript->registerScript('lightbox', "
		$('[data-lightbox]').simpleLightbox();		
		
		");
?>

<?php
$dir = Yii::app()->basePath . "/../shareimages/photo/" . $id;
$dir2 = Yii::app()->basePath . "/../shareimages/photo/";
$contents = scandir($dir, 1);
$contents2 = scandir($dir2, 1);
$counter = 1;
?>


<div class="row">
    <div class="span2">

        <?php
        $this->widget('ext.albumPhoto', array('dir' => $dir2,
            'columns' => 1,
            'span' => 2,
            'limit' => 10,
            'header' => 5,
            'descLimit' => 10
        ));
        ?>


    </div>
    <div class="span10">
        <?php
        if (is_file($dir2 . "/" . $id . ".xml"))
            $xml2 = simplexml_load_file($dir2 . "/" . $id . ".xml");
        ?>

        <div class="page-header">
            <h4><?php echo (isset($xml2)) ? $xml2->children()->title : "" ?></h4>
        </div>

        <p><?php echo (isset($xml2)) ? $xml2->children()->description : "" ?></p>


        <?php
        $counter = 1;

        $dependency = new CDirectoryCacheDependency($dir);

        if (!Yii::app()->cache->get('photoalbumlist' . $dir)) {

            $photoAlbumList = $this->renderPartial("_photoAlbumRender", array('contents' => $contents, 'dir' => $dir, 'dir2' => $dir2, 'counter' => $counter, 'id' => $id), true);

            //Yii::app()->cache->set('photoalbumlist'.$id,$photoAlbumList,86400,$dependency);
        } else
            $photoAlbumList = Yii::app()->cache->get('photoalbumlist' . $dir);

        echo $photoAlbumList;
        ?>

    </div>
</div>

