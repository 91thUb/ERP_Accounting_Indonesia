<?php
/* @var $this SCompanyNewsController */
/* @var $model SCompanyNews */

$this->breadcrumbs = array(
    'Company News' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/sCompanyNewsUnit')),
    array('label' => 'Update', 'icon' => 'pencil', 'url' => array('/m1/sCompanyNewsUnit/update', "id" => $model->id)),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

//$this->menu1 = sCompanyNews::getTopUpdated();
//$this->menu2 = sCompanyNews::getTopCreated();
?>

<div class="page-header">
    <h1>
        <i class="iconic-article"></i>
        <?php echo $model->title; ?>
    </h1>
</div>

<?php
echo "Posted By: " . $model->created->username;
echo "<br/>";
echo "Posted Date: " . date('d-m-Y', $model->created_date);
echo "<br/>";

echo "<br/>";

$this->beginWidget('CMarkdown', array('purifyOutput' => true));
echo $model->content;
$this->endWidget();
?>

