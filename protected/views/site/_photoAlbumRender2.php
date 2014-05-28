<ul class="gallery">

    <?php
    foreach ($contents as $content) {
        if ($content != "." && $content != ".." && !is_dir($dir2 . "/" . $content) === true) {
            $filename = explode(".", $content);
            if ($filename[1] === "jpg" || $filename[1] === "JPG" || $filename[1] === "jpeg" || $filename[1] === "JPEG") {

                if ($counter == 1) {
                    ?>

                    <div class="row">
                        <ul class="thumbnails">
                        <?php } ?>

                        <div class="span2">
                            <li class="span2">
                                <div class="thumbnail">
                                    <?php
                                    if (!is_dir($dir2 . "/thumbs"))
                                        mkdir(Yii::getPathOfAlias('webroot') . '/shareimages/photo2/thumbs');

                                    if (!is_file($dir2 . "/thumbs/" . $content)) {
                                        Yii::import('ext.iwi.Iwi');
                                        ////$picture = new Iwi(Yii::app()->basePath . "/../shareimages/photo2/" . $content);
                                        ////$picture->resize(200, 200, Iwi::AUTO);
                                        ////$picture->save(Yii::app()->basePath . "/../shareimages/photo2/thumbs/" . $content, TRUE);
                                        //change permission
                                        ////chmod(Yii::getPathOfAlias('webroot') . "/shareimages/photo2/thumbs/" . $content, "0777");
                                    }

                                    if (is_file($dir2 . "/thumbs/" . $content)) {
                                        $photo = Yii::app()->request->baseUrl . "/shareimages/photo2/thumbs/" . $content;
                                    } else
                                        $photo = Yii::app()->request->baseUrl . "/shareimages/photo2/" . $content;
                                    //echo "<a href='" . Yii::app()->baseUrl . "/shareimages/photo2/" . $content . "' data-lightbox>" . CHtml::image($photo, 'image') . "</a>";
                                    echo CHtml::image($photo, 'image');
                                    ?>

                                    <?php
                                    $filename = explode(".", $content);
                                    if (is_file($dir2 . "/" . $filename[0] . ".xml")) {
                                        $xml = simplexml_load_file($dir2 . "/" . $filename[0] . ".xml");
                                        $_title = $xml->children()->title;
                                        $_desc = $xml->children()->description;
                                    }
                                    ?>

                                    <h5><? echo peterFunc::shorten_string($_title, 3) ?></h5>
                                    <p><? echo peterFunc::shorten_string($_desc, 10) ?></p>
                                </div>
                            </li>
                        </div>

                        <?php
                        $counter++;
                        if ($counter == 5) {
                            ?>
                        </ul>
                    </div>
                    <?php
                }

                if ($counter == 5)
                    $counter = 1;
            }
        }
        ?>
        <?php
    };
    ?>

    <?php if ($counter != 6) { ?>
    </ul>
    </div>
<?php } ?>

</ul>
