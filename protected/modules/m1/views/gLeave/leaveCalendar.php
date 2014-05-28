<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu4 = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gLeave')),
    array('icon' => 'calendar', 'label' => 'Leave Calendar', 'url' => array('/m1/gLeave/leaveCalendar')),
);

$this->menu = array(
    array('icon' => 'cog', 'label' => 'Cancellation Leave', 'url' => array('/m1/gLeave/cancellation')),
    array('icon' => 'cog', 'label' => 'Extended Leave', 'url' => array('/m1/gLeave/extended')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

$this->menu1 = array(
    array('icon' => 'print', 'label' => 'Leave Reports', 'url' => array('/m1/gLeave/reportByDept')),
);

$this->menu5 = array('Leave');
?>


<div class="page-header">
    <h1>Leave Calendar</h1>
</div>

<?php
$this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    // 'lang'=>'pl',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    //'themeCssFile'=>'2jui-bootstrap/jquery-ui.css',
    // raw html tags
    'htmlOptions' => array(
        // you can scale it down as well, try 80%
        'style' => 'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options' => array(
        'header' => array(
            'left' => 'prev,next',
            //'left' => '',
            'center' => 'title',
            'right' => 'today'
        ),
        //'lazyFetching'=>true,
        'events' => Yii::app()->createUrl('/m1/gLeave/leaveCalendarAjax'), // action URL for dynamic events, or
    //'events'=>array() // pass array of events directly
    // event handling
    // mouseover for example
    //'eventMouseover'=>new CJavaScriptExpression("js:function(event, element) {
    //			element.qtip({
    //				content: event.title
    //			}); 
    //	 } "),
    )
));
?>


