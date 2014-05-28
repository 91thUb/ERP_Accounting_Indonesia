<?php

if (sCompanyNews::model()->Quote) {

    $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => false,
        'headerIcon' => 'fa fa-globe fa-fw',
        'htmlHeaderOptions' => array('style' => 'background:white'),
        'htmlContentOptions' => array('style' => 'background:#cbcbcb'),
    ));

    echo CHtml::tag("h4", array(), "<i class='fa fa-quote-right fa-fw'></i>Word of The Day");
    echo "<hr/>";
    echo CHtml::tag("div", array('style' => 'font-size:18px;'), CHtml::decode(sCompanyNews::model()->Quote->content));

    $this->endWidget();
}
?>
