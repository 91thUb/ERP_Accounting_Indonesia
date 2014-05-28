<style>
    tr.highlight {
        background: #EAEFFF;
        font-weight:bold;
    }
    tr.white {
        background: #FFFFFF;
    }
    td.green {
        color:#0A7C00;
    }

</style>

<?php
$this->renderPartial('_menuEss', array('model' => $model, 'month' => $month, 'year' => $year));
?>


<div class="page-header">
    <h1>
        <i class="fa fa-plane fa-fw"></i>
        <?php echo $model->employee_name; ?>
    </h1>
</div>


<div class="row">
    <div class="span9">

        <?php
        echo $this->renderPartial("/gLeave/_LeaveBalance", array("model" => $model), true);
        ?>
    </div>
</div>

<div class="row">
    <div class="span9">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'g-person-grid',
            'dataProvider' => gLeave::model()->search($model->id),
            //'filter'=>$model,
            'template' => '{items}',
            //'rowCssClassExpression' => '$data->cssReason()',
            'rowCssClassExpression' => '
        		( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
        		( ($data->leave_reason == "Auto Generated Leave") ? " highlight" : " white" )
    		',
            'columns' => array(
                array(
                    'name' => 'start_date',
                    'htmlOptions' => array(
                        'style' => 'width:85px',
                    )
                ),
                array(
                    'name' => 'end_date',
                    'htmlOptions' => array(
                        'style' => 'width:85px',
                    )
                ),
                'number_of_day',
                //'work_date',
                array(
                    'name' => 'leave_reason',
                    'htmlOptions' => array(
                    //'style'=>'width:250px',
                    )
                ),
                //'leave_reason',
                //'mass_leave',
                //'person_leave',
                'balance',
                //'replacement',
                array(
                    'header' => 'Superior State',
                    'value' => '$data->superior_approved->name',
                    'htmlOptions' => array(
                        'style' => 'width:150px',
                    ),
                    'cssClassExpression' => '
						( ($data->superior_approved_id == 2) ? "green" : "white" )
					',
                ),
                array(
                    'header' => 'HR State',
                    'value' => '$data->approved->name',
                    'htmlOptions' => array(
                        'style' => 'width:150px;',
                    ),
                    'cssClassExpression' => '
						( ($data->approved_id == 2) ? "green" : "white" )
					',
                ),
                array(
                    'class' => 'TbButtonColumn',
                    'template' => '{mydelete}',
                    'buttons' => array
                        (
                        'mydelete' => array
                            (
                            'label' => 'Delete',
                            //'icon'=>'fa fa-delete',
                            'url' => 'Yii::app()->createUrl("/m1/gEss/deleteLeave",array("id"=>$data->id))',
                            'visible' => '$data->balance == null && strtotime($data->start_date) > time()',
                            'options' => array(
                                'class' => 'btn btn-mini',
                            ),
                        ),
                    ),
                ),
                array(
                    'class' => 'TbButtonColumn',
                    'template' => '{cupdate}{cupdatecancel}',
                    'buttons' => array
                        (
                        'cupdate' => array
                            (
                            'label' => 'Update',
                            'url' => 'Yii::app()->createUrl("/m1/gEss/updateLeave",array("id"=>$data->id))',
                            'visible' => '$data->approved_id ==1 && strtotime($data->start_date) > time()',
                            'options' => array(
                                'class' => 'btn btn-mini',
                            ),
                        ),
                        'cupdatecancel' => array
                            (
                            'label' => 'Update',
                            'url' => 'Yii::app()->createUrl("/m1/gEss/updateCancellationLeave",array("id"=>$data->id))',
                            'visible' => '$data->approved_id ==8 && $data->balance ==null && strtotime($data->start_date) > time()',
                            'options' => array(
                                'class' => 'btn btn-mini',
                            ),
                        ),
                    ),
                ),
                array(
                    'class' => 'TbButtonColumn',
                    'template' => '{print}{printcancel}{printextended}',
                    'buttons' => array
                        (
                        'print' => array
                            (
                            'label' => 'Print',
                            'url' => 'Yii::app()->createUrl("/m1/gEss/printLeave",array("id"=>$data->id))',
                            'visible' => '$data->approved_id ==1',
                            'options' => array(
                                'class' => 'btn btn-mini',
                                'target' => '_blank',
                            ),
                        ),
                        'printcancel' => array
                            (
                            'label' => 'Print',
                            'url' => 'Yii::app()->createUrl("/m1/gEss/printCancellationLeave",array("id"=>$data->id))',
                            'visible' => '$data->approved_id ==8 AND $data->balance ==null',
                            'options' => array(
                                'class' => 'btn btn-mini',
                                'target' => '_blank',
                            ),
                        ),
                        'printextended' => array
                            (
                            'label' => 'Print',
                            'url' => 'Yii::app()->createUrl("/m1/gEss/printExtendedLeave",array("id"=>$data->id))',
                            'visible' => '$data->approved_id ==5',
                            'options' => array(
                                'class' => 'btn btn-mini',
                                'target' => '_blank',
                            ),
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>

<section id="leaveDept">
    <div class="row">
        <div class="span9">

            <div class="page-header">
                <h3>Department Leave Calendar</h3>
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
                    'events' => Yii::app()->createUrl('/m1/gEss/departmentCalendarAjax', array('id' => $model->mDepartmentId())), // action URL for dynamic events, or
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
        </div>
    </div>
</section>


