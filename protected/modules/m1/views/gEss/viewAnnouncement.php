<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs = array(
    'Company News' => array('/sCompanyNews'),
    $model->title,
);

$this->menu = array(
    //array('label' => 'Home', 'icon' => 'home', 'url' => array('/sCompanyNews')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

//$this->menu1 = sCompanyNews::getTopUpdated();
//$this->menu2 = sCompanyNews::getTopCreated();
?>

<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>

<div class="row">
    <div class="span6">
        <div class="page-header">
            <h1>
                <i class="iconic-article"></i>
                <?php echo $model->title; ?>
            </h1>
        </div>

        <?php
        echo "Posted By: " . $model->created->fullName2;
        echo "<br/>";
        echo "Posted Date: " . $model->publish_date;
        echo "<br/>";

        echo "<br/>";

        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        //echo strip_tags($model->content,"<a> <p>");
        echo $model->content;
        $this->endWidget();
        ?>

        <br/>
        <h6>Related Story:</h6>
    </div>
    <div class="span3">
        <?php
        $models = sCompanyNews::BusinessUnitNews();
        ?>

        <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => 'News Archived',
            'headerIcon' => 'fa fa-globe fa-fw',
            'htmlHeaderOptions' => array('style' => 'border-radius:4px'),
            'htmlContentOptions' => array('style' => 'border:none;padding:20px 0'),
        ));
        ?>



        <?php foreach ($models as $model) { ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <?php //echo CHtml::image(Yii::app()->request->baseUrl . "/shareimages/company/logoAlt3.jpg", 'logo', array("class" => "media-object"));  ?>
                </a>
                <div class="media-body">

                    <h5 class="media-heading">
                        <?php echo CHtml::link(CHtml::encode($model->title), Yii::app()->createUrl('/m1/gEss/viewAnnouncement', array("id" => $model->id))); ?>
                    </h5>

                    <strong><?php echo date('d-m-Y', strtotime($model->publish_date)); ?>: </strong>

                    <?php echo peterFunc::shorten_string(strip_tags($model->content), 12); ?>
                </div>
            </div>

        <?php } ?>


        <?php $this->endWidget(); ?>


    </div>
</div>

