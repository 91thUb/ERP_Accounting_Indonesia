<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<div class="row">
    <div class="span12">
        <div class="page-header">
            <h1>
                <i class="fa fa-user fa-fw"></i>
                Employee List: Request Transfer to Employee 
            </h1>
        </div>

        <?php foreach (hApplicant::model()->employeeTransferRequest()->getData() as $key => $data): ?>
            <?php
            if (($key + 2) % 2 == 0) {
                echo "<div class='row' style='margin-bottom:10px;'>";
            }
            ?>

            <div class="span6">
                <div class="row">
                    <div class="span1">
                        <?php echo CHtml::link($data->PhotoPath, Yii::app()->createUrl("$this->route", array("id" => $data->id,))); ?>
                    </div>
                    <div class="span5">
                        <?php
                        echo CHtml::link($data->applicant_name, Yii::app()->createUrl('/m1/hApplicant/view', array('id' => $data->id)))
                        . CHtml::tag('div', array(), $data->birth_date)
                        . CHtml::tag('div', array(), $data->address1)
                        . CHtml::tag('div', array('style' => 'color: #999; font-size: 11px'), $data->handphone);
                        ?>
                        <?php
                        echo CHtml::tag('div', array('style' => 'font-weight: bold'), CHtml::link('Transfer', Yii::app()->createUrl('/m1/gPerson/createTransfer', array('id' => $data->id)), array('class' => 'btn btn-primary btn-mini'))
                        )
                        ?>
                    </div>
                </div>
            </div>

            <?php
            if (($key + 3) % 2 == 0) {
                echo "</div>";
                echo "<br/>";
                //echo ($key);
            }
            $endkey = $key;

        endforeach;

        if (isset($endkey) && ($endkey == 0 || ($endkey + 2) % 2 != 0 )) {
            echo "</div>";
            echo "<br/>";
            //echo $key;
        }
        ?>



    </div>
</div>





