<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Quote of the Day</h4>
</div>

<div class="row">
    <div class="span5">
        <?php $this->renderPartial("//site/_quote"); ?>
    </div>
    <div class="span4">
        <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => false,
            'headerIcon' => 'fa fa-globe fa-fw',
            'htmlHeaderOptions' => array('style' => 'background:white'),
            'htmlContentOptions' => array('style' => 'background:white'),
        ));
        ?>
        <script type="text/javascript" src="http://www.brainyquote.com/link/quotebr.js"></script>
        <small><i><a href="http://www.brainyquote.com/quotes_of_the_day.html" target="_blank">Powered by Brainy Quotes</a></i></small>

        <?php $this->endWidget(); ?>

    </div>
</div>
