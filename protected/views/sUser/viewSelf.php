<?php
$this->breadcrumbs = array(
    $model->username,
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        <?php echo CHtml::encode($model->username); ?>
    </h1>
</div>

<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked' => false, // whether this is a stacked menu
    'items' => array(
        array('label' => 'Update User Name', 'url' => Yii::app()->createUrl('/sUser/updateUsernameAuthenticated', array("id" => $model->id))),
        array('label' => 'Update Password', 'url' => Yii::app()->createUrl('/sUser/updatePasswordAuthenticated', array("id" => $model->id))),
    ),
    'htmlOptions' => array(
        'style' => 'padding:0',
    )
));
?>

<?php echo $this->renderPartial('_userDetail', array('model' => $model)); ?>

<ul class="nav nav-list">
    <li class="nav-header"><i class="fa fa-bars fa-fw"></i>Personal Folder
    </li>
</ul>
<?php
// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
    'connectorRoute' => 'sCompanyDocuments/connectorPersonalDocuments',
        )
);
?>
