<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>

<div class="row">
    <div class="span2">
        <?php echo $this->renderPartial('_menuNavigation'); ?>
    </div>

    <div class="span10">
        <div class="page-header">
            <h1>Employee In / Out <small>Last Updated: <?php echo date('d-m-Y') ?></small></h1>
        </div>


        <?php
        $this->widget('ext.bootstrap.widgets.TbGridView', array(
            'id' => 'abudget-grid',
            'dataProvider' => gPerson::getUncomplete(),
            'itemsCssClass' => 'table table-striped table-bordered',
            'template' => '{items}{pager}',
            //'filter'=>$model,
            'columns' => array(
                array(
                    'header' => 'Components',
                    'value' => '$data["components"]',
                ),
                array(
                    'header' => 'Completion (%)',
                    'value' => 'number_format($data["t_total"] / $data["t_count"] * 100,2)',
                ),
                array(
                    'class' => 'ext.TbProgressColumn',
                    //'name' => 'percentage',
                    //'value'=>'$data->amount',
                    'percent' => 100,
                    'value' => 'number_format($data["t_total"] / $data["t_count"] * 100,2)',
                    'htmlOptions' => array('style' => 'width: 200px;'),
                ),
            ),
        ));
        ?>





        <h3>List of Uncomplete Data</h3>
        <?php /*

          <?php $this->widget('bootstrap.widgets.TbGridView',array(
          'id'=>'g-karir-grid',
          'dataProvider'=>gPerson2::model()->uncompleteList(),
          //'filter'=>$model,
          'template'=>'{items}{pager}',
          'columns'=>array(
          array(
          'name'=>'employee_name',
          'type'=>'raw',
          'value'=>'CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id)),array("target"=>"_blank"))',
          ),
          array(
          'class' => 'bootstrap.widgets.TbEditableColumn',
          'name' => 'birth_place',
          'sortable'=>false,
          'editable' => array(
          'url'     => $this->createUrl('/m1/gPerson/updatePersonAjax'),
          //'placement' => 'right',
          'inputclass' => 'span2'
          )),
          'birth_date',
          array(
          'class' => 'bootstrap.widgets.TbEditableColumn',
          'name' => 'address1',
          'sortable'=>false,
          'editable' => array(
          'type'=>'textarea',
          'url'     => $this->createUrl('/m1/gPerson/updatePersonAjax'),
          //'placement' => 'right',
          'inputclass' => 'span3'
          )),
          array(
          'class' => 'bootstrap.widgets.TbEditableColumn',
          'name' => 'identity_number',
          'sortable'=>false,
          'editable' => array(
          'url'     => $this->createUrl('/m1/gPerson/updatePersonAjax'),
          //'placement' => 'right',
          'inputclass' => 'span3'
          )),
          'identity_valid',
          array(
          'class' => 'bootstrap.widgets.TbEditableColumn',
          'name' => 'identity_address1',
          'sortable'=>false,
          'editable' => array(
          'type'=>'textarea',
          'url'     => $this->createUrl('/m1/gPerson/updatePersonAjax'),
          //'placement' => 'right',
          'inputclass' => 'span3'
          )),
          //'handphone',
          //'c_pathfoto',
          //'account_number',
          //'bank_name',
          //'account_name',
          ),
          )); ?>

         */ ?>
        <p>A = Birth Place | B = Birth Date | C = Address | D = Identity Number |
            E = Identity Valid | F = Identity Address | G = Photo | H = Acc. Number | I = Acc. Name
            J = Bank Name | K = Blood | L = Email | M = Handphone 
        </p>

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'g-karir-grid',
            'dataProvider' => gPerson::model()->uncompleteList(),
            //'filter'=>$model,
            'template' => '{items}{pager}',
            'columns' => array(
                array(
                    'name' => 'employee_name',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->employee_name,Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data->id)),array("target"=>"_blank"))',
                ),
                array(
                    'header' => 'Department',
                    'value' => '$data->mDepartment()',
                ),
                array(
                    'header' => 'Job Title',
                    'value' => '$data->mJobTitle()',
                ),
                array(
                    'header' => 'A',
                    'type' => 'raw',
                    'value' => '(isset($data->birth_place)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'B',
                    'type' => 'raw',
                    'value' => '(isset($data->birth_date)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'C',
                    'type' => 'raw',
                    'value' => '(isset($data->address1)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'D',
                    'type' => 'raw',
                    'value' => '(isset($data->identity_number)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'E',
                    'type' => 'raw',
                    'value' => '(isset($data->identity_valid)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'F',
                    'type' => 'raw',
                    'value' => '(isset($data->identity_address1)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'G',
                    'type' => 'raw',
                    'value' => '(isset($data->c_pathfoto)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'H',
                    'type' => 'raw',
                    'value' => '(isset($data->account_number)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'I',
                    'type' => 'raw',
                    'value' => '(isset($data->account_name)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'J',
                    'type' => 'raw',
                    'value' => '(isset($data->bank_name)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'K',
                    'type' => 'raw',
                    'value' => '(isset($data->blood_id)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'L',
                    'type' => 'raw',
                    'value' => '(isset($data->email)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'M',
                    'type' => 'raw',
                    'value' => '(isset($data->handphone)) ? "&#10003;":""',
                ),
                array(
                    'header' => 'Edu',
                    'type' => 'raw',
                    //'value' => '((int)$data->many_educationC != 0) ? "&#10003;" ; ""',
                    'value' => '$data->many_educationC',
                ),
                array(
                    'header' => 'Fam',
                    'type' => 'raw',
                    //'value' => '(isset($data->many_familyC)) ? "&#10003;";""  ',
                    'value' => '$data->many_familyC',
                ),
                array(
                    'header' => 'Exp',
                    'type' => 'raw',
                    //'value' => '(isset($data->many_experienceC))  ? "&#10003;";""  ',
                    'value' => '$data->many_experienceC',
                ),
            /*
              array(
              'header' => 'Education Non Formal',
              'value' => 'if (count($data->many_educationnf) != 0 ? "";"X"  ',
              ),
              array(
              'header' => 'Education Other',
              'value' => 'if (count($data->many_other) != 0 ? "";"X"  ',
              ),
             */
            ),
        ));
        ?>
    </div>
</div>



