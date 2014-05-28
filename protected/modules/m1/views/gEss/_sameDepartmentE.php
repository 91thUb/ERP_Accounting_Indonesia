<?php if (isset($model->company->department_id) && in_array($model->mCompanyId(), sUser::model()->getMyGroupArray())): ?>

    <h4>Same Department </h4>
    <?php $dataProvider = gPerson::model()->sameDepartment($model->mDepartmentId()); ?>

    <?php foreach ($dataProvider->getData() as $key => $data): ?>
        <?php
        if (($key + 3) % 3 == 0) {
            echo "<div class='row' style='margin-bottom:10px;'>";
        }
        ?>

        <div class="span3">
            <div class="row">
                <div class="span1">
                    <?php echo $data->PhotoPath; ?>
                </div>
                <div class="span2">
                    <?php echo CHtml::tag('div', array('style' => 'font-weight: bold'), $data->employee_name) ?>
                    <?php echo CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data->handphone . ' ' . $data->email); ?>
                </div>
            </div>
        </div>

        <?php
        if (($key + 4) % 3 == 0) {
            echo "</div>";
            //echo ($key);
        }
        $endkey = $key;

    endforeach;

    if (isset($endkey) && ($endkey == 0 || ($endkey + 4) % 3 != 0 )) {
        echo "</div>";
        //echo $key;
    }
    ?>



    <?php

 endif;

