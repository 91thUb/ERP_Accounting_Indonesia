<?php
/* @var $this SCompanyNewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Company News',
);

$this->menu = array(
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

//$this->menu1 = sCompanyNews::getTopUpdated();
//$this->menu2 = sCompanyNews::getTopCreated();
$this->menu5 = array('Business Unit News');
?>

<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

Yii::app()->clientScript->registerScript('datepicker2', "
		$(function() {
		$( \"#" . CHtml::activeId($model2, 'datetime') . "\" ).datepicker({
			'dateFormat' : 'dd-mm-yy',
		});
                            
                });

		");
?>

<div class="page-header">
    <h1>
        <i class="iconic-article"></i>
        Business Unit News
    </h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'companynews-grid',
    'dataProvider' => $model->searchNewsUnit(),
    'filter' => $model,
    'itemsCssClass' => 'table table-striped',
    'template' => '{items}{pager}',
    'columns' => array(
        array(
            'name' => 'created_date',
            'value' => 'date("d-m-Y H:i",$data->created_date)',
            'filter' => false,
        ),
        array(
            'name' => 'publish_date',
            'value' => 'waktu::nicetime(strtotime($data->publish_date))',
            'filter' => false,
        ),
        array(
            'header' => 'Author',
            'name' => 'created.username',
        ),
        'category.category_name',
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link($data->title,Yii::app()->createUrl("/m1/sCompanyNewsUnit/view",array("id"=>$data->id)))',
        ),
        array(
            'class' => 'TbButtonColumn',
            'template' => '{update}{delete}',
        ),
        array(
            'header' => 'Priority',
            'name' => 'priority.name',
        ),
        array(
            'header' => 'Approved Status',
            'name' => 'approved.name',
        ),
        array(
            'name' => 'expire_date',
            'value' => 'waktu::nicetime(strtotime($data->expire_date))',
            'filter' => false,
        ),
    ),
));
?>

<hr/>

<h3>Business Unit Activity Photo</h3>
<div class="row">
    <div class="span9">

        <?php
        $form = $this->beginWidget('TbActiveForm', array(
            'id' => 'module-matrix-form',
            'type' => 'horizontal',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>

        <p class="note">Photo that you upload here, will show on Business Unit Activity Info outside before login...</p>

        <?php echo $form->errorSummary($model2); ?>

        <?php echo $form->textFieldRow($model2, 'datetime', array('class' => 'span2')); ?>

        <?php echo $form->textFieldRow($model2, 'title', array('class' => 'span5')); ?>

        <?php echo $form->textAreaRow($model2, 'description', array('class' => 'span7', 'rows' => 3, 'hint' => 'Maximum 5000 characters')); ?>
        <?php
        //echo $form->html5EditorRow($model, 'description', array(
        //	'class' => 'span7', 'rows' => 5, 'height' => '200', 'options' => array('color' => true)));
        ?>

        <?php echo $form->fileFieldRow($model2, 'images'); ?>

        <?php /*
          <div class="control-group">
          <label class="control-label required">Upload Files</label>
          <div class="controls">
          <?php
          $this->widget('CMultiFileUpload', array(
          'model' => $model2,
          'attribute' => 'images',
          'accept' => 'jpg',
          'options' => array(
          ),
          ));
          ?>
          </div>
          </div>
         */ ?>

        <?php /*
          <?php $this->widget('bootstrap.widgets.TbFileUpload', array(
          'url' => $this->createUrl("sPhotoNewsAdmin/upload"),
          'model' => $model,
          'attribute' => 'images', // see the attribute?
          'multiple' => true,
          'options' => array(
          'maxFileSize' => 2000000,
          'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
          ))); ?>

         */ ?>


        <div class="form-actions">
            <?php echo CHtml::htmlButton('<i class="fa fa-ok fa-fw"></i>Upload', array('class' => 'btn', 'type' => 'submit')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div>
