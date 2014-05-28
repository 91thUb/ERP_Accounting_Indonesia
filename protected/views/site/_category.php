<?php
$models = sCompanyNews::getCategory($category_id);

if ($models) {
    ?>

    <?php
    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => $models[0]->category->category_name,
        'headerIcon' => 'fa fa-globe fa-fw',
        'htmlHeaderOptions' => array('style' => 'border-radius:4px;padding: 0 10px;'),
        'htmlContentOptions' => array('style' => 'border:none;padding:20px 0'),
    ));
    ?>



    <?php foreach ($models as $model) { ?>
        <div class="media">
            <a class="pull-left" href="#">
                <?php echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logoAlt3.jpg", 'logo', array("class" => "media-object")); ?>
            </a>
            <div class="media-body">

                <h5 class="media-heading">
                    <?php echo CHtml::link(CHtml::encode($model->title), Yii::app()->createUrl('/sCompanyNews/view', array("id" => $model->id))); ?>
                </h5>

                <strong><?php echo date('d-m-Y', strtotime($model->publish_date)); ?>: </strong>

                <?php echo peterFunc::shorten_string(strip_tags($model->content), 40); ?>
            </div>
        </div>

    <?php } ?>


    <?php $this->endWidget(); ?>

    <?php
}
