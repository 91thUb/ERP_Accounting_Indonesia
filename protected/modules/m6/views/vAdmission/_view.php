<div class="row">
    <div class="span2">
        <?php
        echo $data->photoPath;
        ?>
    </div>
    <div class="span7">
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => array(
                'id' => 1,
                'student_name' => $data->student_name,
                'birth_place' => $data->birth_place,
                'birth_date' => $data->birth_date,
                'gender_id' => $data->gender_id,
                'address1' => $data->address1,
                'home_phone' => $data->home_phone,
                'handphone' => $data->handphone,
                'email' => $data->email,
                'faculty_id' => $data->faculty_id,
                'major_id' => $data->major_id,
                'high_school' => $data->high_school,
            ),
            'attributes' => array(
                'student_name',
                //'birth_place',
                //'birth_date',
                'gender_id',
                'address1',
                //'home_phone',
                'handphone',
                'email',
                'faculty_id',
                'major_id',
                'high_school',
            ),
        ));
        ?>
    </div>

</div>
