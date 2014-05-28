<?php
$this->breadcrumbs = array(
    'G people',
);

$this->menu4 = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gPermission')),
    array('icon' => 'calendar', 'label' => 'Permission Calendar', 'url' => array('/m1/gPermission/permissionCalendar')),
);

$this->menu1 = array(
    array('icon' => 'print', 'label' => 'Permission Reports ', 'url' => array('/m1/gPermission/reportByDept')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);


$this->menu5 = array('Leave');
?>


<div class="page-header">
    <h1>Permission Calendar</h1>
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
        'events' => Yii::app()->createUrl('/m1/gPermission/permissionCalendarAjax'), // action URL for dynamic events, or
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


