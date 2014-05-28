<div class="row">
    <div class="span2">
        <?php
        echo $data->photoPath;
        ?>
        <p>
        <ul class="unstyled">
            <li style="font-size:11px">Data Completeness <span class="pull-right strong"><?php echo number_format($data->completion, 0) ?>%</span>
                <?php
                $this->widget('bootstrap.widgets.TbProgress', array(
                    'type' => 'success', // 'info', 'success' or 'danger'
                    'percent' => $data->completion,
                    'htmlOptions' => array(
                        'style' => 'height:7px',
                    )
                ));
                ?>
            </li>
        </ul>		
        </p>
    </div>
    <div class="span5">
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => array(
                'id' => 1,
                'employee_id' => $data->employeeShortId,
                'company' => $data->mCompany(),
                'department' => $data->mDepartment(),
                'job_title' => $data->mJobTitle(),
                'level' => $data->mLevel(),
                'status' => ($data->countContract() != "") ? $data->mStatus() . " " . CHtml::tag('span', array('class' => 'badge badge-warning'), $data->countContract()) : $data->mStatus(),
                'join_date' => (isset($data->companyfirst)) ? $data->companyfirst->start_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $data->countJoinDate()) : "",
                'join_dateG' => (isset($data->companyfirstG)) ? $data->companyfirstG->start_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $data->countJoinDateG()) : "",
                'join_dateB' => ($data->mJoinTypeId() == 2) ? $data->companycurrent->start_date . " " . CHtml::tag('span', array('class' => 'badge badge-info'), $data->countJoinDateB()) : "",
                'superior' => ($this->id == "gEss") ? $data->mSuperior() : $data->mSuperiorLink(),
                'handphone' => $data->handphone,
                'email' => $data->cloakEmail . ' ' . $data->isValidEmail,
            ),
            'attributes' => array(
                array('name' => 'employee_id', 'label' => 'Employee ID'),
                array('name' => 'company', 'label' => 'Company'),
                array('name' => 'department', 'label' => 'Department'),
                array('name' => 'job_title', 'label' => 'Job Title'),
                array('name' => 'level', 'label' => 'Level'),
                array('name' => 'status', 'type' => 'raw', 'label' => 'Status'),
                array('name' => 'join_date', 'type' => 'raw', 'label' => 'Join Date'),
                array('name' => 'join_dateB', 'type' => 'raw', 'label' => 'Join Date Biz Unit', 'visible' => ($data->mJoinTypeId() == 2)),
                array('name' => 'join_dateG', 'type' => 'raw', 'label' => 'Join Date APG', 'visible' => (isset($data->companyfirstG))),
                array('name' => 'superior', 'type' => 'raw', 'label' => 'Superior'),
                array('name' => 'handphone', 'label' => 'Handphone'),
                array('name' => 'email', 'type' => 'raw', 'label' => 'Email'),
            ),
        ));
        ?>
    </div>

    <div style="font-size:11px;color:grey;" class="pull-right">
        <p>
            <?php echo isset($data->updated) ? "Last Updated by: " . $data->updated->username : "" ?>
            <br/>
            <?php echo isset($data->user) ? "ESS Last Login: " . waktu::nicetime($data->user->last_login) : "Never Login" ?>
        </p>
    </div>
</div>
<?php /*
EQuickDlgs::ajaxIcon(
		Yii::app()->baseUrl .'images/view.png',
		array(
				'controllerRoute' => '/m1/gPerson/view', //'member/view'
				'actionParams' => array('id'=>$data->id), //array('id'=>$data->member->id),
				'dialogTitle' => 'Detailview',
				'dialogWidth' => 800,
				'dialogHeight' => 600,
				'openButtonText' => 'View record',
				'closeButtonText' => 'Close',
		)
);
		*/
	