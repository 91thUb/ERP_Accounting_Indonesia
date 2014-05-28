
<div class="row">
    <div class="span8">


        <div class="row">
            <div class="span1">
                <?php echo $data->applicant->photoPath; ?>
                <?php echo CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), waktu::nicetime($data->created_date)); ?>
            </div>
            <div class="span5">

                <?php if (isset($data->applicant) && $data->applicant->vacancyLocked == 0) { ?>
                    <div class="btn-toolbar pull-left">
                        <?php
                        $this->widget('bootstrap.widgets.TbButtonGroup', array(
                            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                            'size' => 'mini',
                            'buttons' => array(
                                array('label' => 'Action', 'items' => array(
                                        array('label' => 'Pre Screened', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 2))),
                                        array('label' => 'Candidate Pool', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 3))),
                                        '---',
                                        array('label' => 'Interview', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 4))),
                                        '---',
                                        array('label' => 'Rejected', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 5))),
                                        array('label' => 'Blacklisted', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 6))),
                                        '---',
                                        array('label' => 'Hired', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 7))),
                                        '---',
                                        array('label' => 'Other', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 8))),
                                        array('label' => 'Withdraw', 'url' => Yii::app()->createUrl('/m1/hVacancy/process', array('id' => $data->id, 'act' => 9))),
                                    )),
                            ),
                        ));
                        ?>
                    </div>
                    <?php
                } else
                    echo "LOCKED";
                ?>


                <h4>
                    <?php echo CHtml::link($data->applicant->applicant_name, Yii::app()->createUrl('/m1/hApplicant/view', array('id' => $data->applicant_id)), array('style' => 'margin-left:10px')); ?>
                </h4>

                <?php
                //echo CHtml::AjaxLink($data->applicant->applicant_name,Yii::app()->createUrl('/m1/hVacancy/detailApplicant',array('id'=>$data->applicant_id)),
                //	array('update'=>'#detail'));				
                //echo CHtml::tag('strong',array(),$data->applicant->applicant_name);				
                //echo CHtml::link($data->applicant->applicant_name,Yii::app()->createUrl('/m1/hApplicant/view',array('id'=>$data->applicant_id)));				
                echo CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data->applicant->birth_date);
                echo CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data->applicant->sex->name . ' ( ' . $data->applicant->maritalStatus() . ' )');
                echo CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data->applicant->religion->name);
                echo CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data->applicant->handphone);
                ?>
            </div>
        </div>

        <br/>

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'g-education-grid' . $data->applicant_id,
            'dataProvider' => hApplicantEducation::model()->search($data->applicant_id),
            //'filter'=>$model,
            'enableSorting' => false,
            'template' => '{items}',
            'htmlOptions' => array(
                'style' => 'padding-top:0',
            ),
            'type' => 'striped condensed',
            'columns' => array(
                array(
                    'header' => 'Level',
                    'value' => '$data->edulevel->name',
                ),
                'school_name',
                'city',
                'interest',
                'graduate',
                //'country',
                //'institution',
                'ipk',
            ),
        ));
        ?>

        <?php
        $this->widget('TbGridView', array(
            'id' => 'g-person-experience-grid' . $data->applicant_id,
            'dataProvider' => hApplicantExperience::model()->search($data->applicant_id),
            'enableSorting' => false,
            'template' => '{items}',
            'htmlOptions' => array(
                'style' => 'padding-top:0',
            ),
            'type' => 'striped condensed',
            'columns' => array(
                'company_name',
                'industries',
                'start_date',
                'end_date',
                'job_title',
            ),
        ));
        ?>


    </div>
</div>

<hr/>
