<div class="row">
    <div class="span2">
        <?php
        echo $model->photoPath;
        ?>
    </div>
    <div class="span7">
        <?php
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => false,
            'headerIcon' => 'fa fa-globe fa-fw',
            'htmlHeaderOptions' => array('style' => 'background:white'),
                //'htmlContentOptions'=>array('style'=>'background:#FFA573'),
        ));
        ?>

        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => array(
                'id' => 1,
                'employee_id' => $model->employeeShortId,
                'company' => $model->mCompany(),
                'department' => $model->mDepartment(),
                'job_title' => $model->mJobTitle(),
                'level' => $model->mLevel(),
                'status' => ($model->countContract() != "") ? $model->mStatus() . " " . CHtml::tag('span', array('class' => 'badge badge-warning'), $model->countContract()) : $model->mStatus(),
                'join_date' => (isset($model->companyfirst)) ? $model->companyfirst->start_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $model->countJoinDate()) : "",
                'join_dateG' => (isset($model->companyfirstG)) ? $model->companyfirstG->start_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $model->countJoinDateG()) : "",
                'join_dateB' => ($model->mJoinTypeId() == 2) ? $model->companycurrent->start_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $model->countJoinDateB()) : "",
                'superior' => ($this->id == "gEss") ? $model->mSuperior() : $model->mSuperiorLink(),
            ),
            'attributes' => array(
                array('name' => 'employee_id', 'label' => 'Employee ID'),
                array('name' => 'company', 'label' => 'Company'),
                array('name' => 'department', 'label' => 'Department'),
                array('name' => 'job_title', 'label' => 'Job Title'),
                array('name' => 'level', 'label' => 'Level'),
                array('name' => 'status', 'type' => 'raw', 'label' => 'Status'),
                array('name' => 'join_date', 'type' => 'raw', 'label' => 'Join Date'),
                array('name' => 'join_dateB', 'type' => 'raw', 'label' => 'Join Date Biz Unit', 'visible' => ($model->mJoinTypeId() == 2)),
                array('name' => 'join_dateG', 'type' => 'raw', 'label' => 'Join Date APG', 'visible' => (isset($model->companyfirstG))),
                array('name' => 'superior', 'type' => 'raw', 'label' => 'Superior'),
            ),
        ));
        ?>

        <?php
        $this->endWidget();
        ?>

    </div>
</div>
