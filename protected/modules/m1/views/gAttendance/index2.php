<?php
$this->breadcrumbs = array(
    'Person',
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/m1/gAttendance')),
    array('label' => 'Home II', 'icon' => 'home', 'url' => array('/m1/gAttendance/index')),
    array('label' => 'Schedule Upload', 'icon' => 'calendar', 'url' => array('timeBlock')),
    array('label' => 'Attendant Upload', 'icon' => 'user', 'url' => array('attendBlock')),
    //array('label' => 'Change Shift List', 'icon' => 'info-sign', 'url' => array('listchange')),
    array('label' => 'Parameter Time Block', 'icon' => 'wrench', 'url' => array('paramTimeblock')),
    array('label' => 'Rekap by Dept', 'icon' => 'print', 'url' => array('/m1/gAttendance/reportByDept')),
    array('label' => 'Help', 'icon' => 'bullhorn', 'url' => array('/sHelp/page/to/' . $this->module->id . '.' . $this->id . '/' . $this->action->id), 'linkOptions' => array('target' => '_blank')),
);

$this->menu5 = array('Person');

//$this->menu7=array(
//		array('label'=>'All','icon'=>'list','url'=>array('/m1/gPerson')),
//		array('label'=>'Sample Dept','icon'=>'list','url'=>'#'),
//);

$this->menu7 = aOrganization::compDeptPersonFilter();

$this->menu9 = array('model' => $model, 'action' => Yii::app()->createUrl('m1/gAttendance/index'));
?>

<div class="row">
    <div class="span9">

        <div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
            <ul class="nav nav-list">
                <li class="nav-header"><i class="fa fa-bars fa-fw"></i>Change Shift List
                </li>
            </ul>
        </div>

        <?php
        echo $this->renderPartial('_listChange', array());
        ?>

    </div>
</div>

<div class="row">
    <div class="span9">

        <div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
            <ul class="nav nav-list">
                <li class="nav-header"><i class="fa fa-bars fa-fw"></i>20 Most Late In List
                </li>
            </ul>
        </div>

        <?php
        echo $this->renderPartial('_listLate', array());
        ?>

    </div>
</div>		

<div class="row">
    <div class="span8">
        <div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
            <ul class="nav nav-list">
                <li class="nav-header"><i class="fa fa-bars fa-fw"></i>Recently Added
                </li>
            </ul>
        </div>


        <?php
        $criteria = new CDbCriteria;
        $criteria->limit = 10;
        $criteria->with = array('person');
        $criteria->group = 'employee_name';
        $criteria->order = "t.created_date DESC";
        if (Yii::app()->user->name != "admin") {
            $criteria1 = new CDbCriteria;
            $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.parent_id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria1);
        }

        $models = gAttendance::model()->findAll($criteria);
        ?>

        <div class="row">
            <?php foreach ($models as $key => $data): ?>

                <div class="span4">

                    <div class="detail" style="margin-bottom:10px;">
                        <div class="row">
                            <div class="span1">
                                <?php echo $data->person->photoPath; ?>
                            </div>
                            <div class="span3">
                                <?php echo $data->person->gAttendanceLink; ?>
                                <div style="font-size:10px;">
                                    <?php echo $data->person->mDepartment(); ?>
                                    <?php //echo (isset($data->company)) ? $data->company->department->name : ''; ?>
                                    <br/>
                                    <?php echo $data->person->mJobTitle(); ?>
                                    <br/>
                                    <?php echo $data->person->mLevel(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (($key + 1) % 2 == 0)
                    echo '</div><div class="row">';

            endforeach;

            //if (($key+2) % 2 == 0) 
            echo '</div>';
            ?>


        </div>
    </div>
    <div class="row">
        <div class="span8">

            <div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
                <ul class="nav nav-list">
                    <li class="nav-header"><i class="fa fa-bars fa-fw"></i>Recently Updated
                    </li>
                </ul>
            </div>

            <?php
            $criteria = new CDbCriteria;
            $criteria->limit = 10;
            $criteria->with = array('person');
            $criteria->group = 'employee_name';
            $criteria->order = "t.updated_date DESC";
            if (Yii::app()->user->name != "admin") {
                $criteria1 = new CDbCriteria;
                $criteria1->condition = '(select c.company_id from g_person_career c WHERE t.parent_id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) IN (' . implode(",", sUser::model()->myGroupArray) . ')';
                $criteria->mergeWith($criteria1);
            }

            $models = gAttendance::model()->findAll($criteria);
            ?>

            <div class="row">
                <?php foreach ($models as $key => $data): ?>

                    <div class="span4">
                        <div class="detail" style="margin-bottom:10px;">
                            <div class="row">
                                <div class="span1">
                                    <?php echo $data->person->gPersonPhoto; ?>
                                </div>
                                <div class="span3">
                                    <?php echo $data->person->gPersonLink; ?>
                                    <br/>
                                    <div style="font-size:10px;">
                                        <?php echo $data->person->mDepartment(); ?>
                                        <?php //echo (isset($data->company)) ? $data->company->department->name : ''; ?>
                                        <br/>
                                        <?php echo $data->person->mJobTitle(); ?>
                                        <br/>
                                        <?php echo $data->person->mLevel(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (($key + 1) % 2 == 0)
                        echo '</div><div class="row">';

                endforeach;

                //if (($key+2) % 2 == 0) 
                echo '</div>';
                ?>

            </div>
        </div>
