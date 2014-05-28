<?php

$this->breadcrumbs = array(
    'Cash and Bank' => array('/m2/uCashbank'),
    'Update',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m2/uCashbank')),
);

$this->menu1 = tJournal::getTopUpdated(2);
$this->menu2 = tJournal::getTopCreated(2);
?>


<?php

if ($model->journal_type_id == null) {
    $this->widget('bootstrap.widgets.TbTabs', array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array('label' => 'Expense', 'content' => $this->renderPartial("_tabCreateExpense", array("model" => $model), true), 'active' => true),
            array('label' => 'Income', 'content' => $this->renderPartial("_tabCreateIncome", array("model" => $model), true)),
        ),
    ));
} elseif ($model->journal_type_id == 2) {
    $this->renderPartial("_tabCreateIncome", array("model" => $model));
} else {
    $this->renderPartial("_tabCreateExpense", array("model" => $model));
}
?>
