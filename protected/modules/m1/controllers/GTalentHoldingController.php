<?php

class GTalentHoldingController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2left';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id, $year = 0) {

        if ($year == 0)
            $year = date('Y');

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'year' => $year
        ));
    }

    public function newPayroll($id) {
        $model = new gPayroll;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gPayroll'])) {
            $model->attributes = $_POST['gPayroll'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id, 'tab' => 'Salary History'));
        }

        return $model;
    }

    public function newPayrollBenefit($id) {
        $model = new gPayrollBenefit;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gPayrollBenefit'])) {
            $model->attributes = $_POST['gPayrollBenefit'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id, 'tab' => 'Benefit'));
        }

        return $model;
    }

    public function newPayrollDeduction($id) {
        $model = new gPayrollDeduction;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gPayrollDeduction'])) {
            $model->attributes = $_POST['gPayrollDeduction'];
            $model->parent_id = $id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $id, 'tab' => 'Deduction'));
        }

        return $model;
    }

    public function actionIndex($periode = null) {
        $model = new gPerson('search');

        if ($periode == null)
            $periode = date("Ym");

        $this->render('index', array(
            'periode' => $periode,
            'model' => $model,
        ));
    }

    public function actionList() {
        $model = new gPerson('search');
        $model->unsetAttributes();

        $criteria = new CDbCriteria;
        $criteria1 = new CDbCriteria;

        if (isset($_GET['gPerson'])) {
            $model->attributes = $_GET['gPerson'];

            $criteria1->compare('employee_name', $_GET['gPerson']['employee_name'], true, 'OR');
            //$criteria1->compare('address1',$_GET['gPerson']['address1'],true,'OR');
        }

        $criteria->order = 'updated_date DESC';

        $criteria->mergeWith($criteria1);

        $dataProvider = new CActiveDataProvider('gPerson', array(
            'criteria' => $criteria,
                )
        );

        $this->render('/gPerson/index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionCurrentMonth() {
        $criteria = new CDbCriteria;

        //if (Yii::app()->user->name != "admin") {
        $criteria2 = new CDbCriteria;
        $criteria2->condition = '(select s.status_id from g_person_status s WHERE t.id=s.parent_id ORDER BY s.start_date DESC LIMIT 1) NOT IN 
			(' . implode(",", Yii::app()->getModule("m1")->PARAM_RESIGN_ARRAY) . ') AND ' .
                '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                implode(",", sUser::model()->myGroupArray) . ')';
        $criteria->mergeWith($criteria2);
        //}

        $criteria->order = 'updated_date DESC';

        $dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');

        $dataProvider = new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
            'criteria' => $criteria,
            'pagination' => false,
                )
        );

        $this->render('currentMonth', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return gPayroll the loaded model
     * @throws CHttpException
     */

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $criteria = new CDbCriteria;

        $model = gPerson::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param gPayroll $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'g-payroll-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionReport() {
        $model = new fBeginEndDate('performance');

        if (isset($_POST['fBeginEndDate'])) {
            $model->attributes = $_POST['fBeginEndDate'];
            if ($model->validate()) {

                $criteria = new CDbCriteria;
                $criteria->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                        implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                        ') ORDER BY c.start_date DESC LIMIT 1) = ' .
                        $model->company_id . ' 
						AND (select c.level_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                        implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                        ') ORDER BY c.start_date DESC LIMIT 1) = ' .
                        $model->level_id

                ;
                //$criteria->limit = 15;

                $dataProvider = new CActiveDataProvider('gPerson', array(
                    'criteria' => $criteria,
                    'pagination' => false,
                    'sort' => array(
                    //'defaultOrder'=>'year DESC',
                    )
                ));

                $title = $dataProvider->getData();

                spl_autoload_unregister(array('YiiBase', 'autoload'));
                Yii::import('ext.phpexcel.Classes.PHPExcel', true);
                spl_autoload_register(array('YiiBase', 'autoload'));


                $phpExcel = new PHPExcel();

                $styleBold = array(
                    'font' => array(
                        'bold' => true,
                    )
                );

                $styleBackground = array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'startcolor' => array(
                            'rgb' => 'D8D8D8',
                        ),
                    ),
                    'font' => array(
                        'name' => 'Arial',
                        'size' => 12,
                        'bold' => true,
                    ),
                );

                $foo = $phpExcel->getActiveSheet();

                $foo->setTitle("Performance");

                $foo->setCellValue("A1", "DATA PA KARYAWAN")->getStyle("A1:H1")->applyFromArray($styleBackground);
                $foo->mergeCells("A1:H1");
                $foo->getStyle("A1:H1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $foo->getRowDimension(1)->setRowHeight(22);
                $foo->getRowDimension(2)->setRowHeight(20);
                $foo->getColumnDimension("A")->setWidth(5);
                $foo->getColumnDimension("B")->setWidth(15);
                $foo->getColumnDimension("C")->setWidth(30);
                $foo->getColumnDimension("D")->setWidth(40);
                $foo->getColumnDimension("E")->setWidth(20);
                $foo->getColumnDimension("F")->setWidth(30);
                $foo->getColumnDimension("G")->setWidth(10);
                $foo->getColumnDimension("H")->setWidth(30);

                $foo->setCellValue("A2", "No")
                        ->setCellValue("B2", "Photo")
                        ->setCellValue("C2", "Basic Profile")
                        ->setCellValue("D2", "Education")
                        ->setCellValue("E2", "Work Experience")
                        ->setCellValue("G2", "Performance Appraisal")
                        ->getStyle("A2:H2")->applyFromArray($styleBold)
                ;

                $counter = 3;
                $current = 1;

                foreach ($dataProvider->getData() as $data) {
                    $n0 = $counter;
                    $n1 = $counter + 1;
                    $n2 = $counter + 2;
                    $n3 = $counter + 3;
                    $n4 = $counter + 4;
                    $n5 = $counter + 5;
                    $n6 = $counter + 6;
                    $n7 = $counter + 7;
                    $n8 = $counter + 8;
                    $n9 = $counter + 9;

                    //Basic Profile
                    $foo
                            ->setCellValue("A$n0", $current)
                            ->setCellValue("B$n0", $data->employee_name)
                            ->mergeCells("B$n0:C$n0")
                    ;

                    $foo->getRowDimension($n0)->setRowHeight(18);

                    $foo
                            ->getStyle("A$n0:H$n0")
                            ->applyFromArray($styleBackground)
                    ;

                    $foo
                            ->setCellValue("B$n1", "PHOTO")
                            ->setCellValue("C$n1", "Company: " . $data->mCompany())
                            ->setCellValue("C$n2", "Department: " . $data->mDepartment())
                            ->setCellValue("C$n3", "Job Title: " . $data->mJobTitle())
                            ->setCellValue("C$n4", "Level: " . $data->mLevel())
                            ->setCellValue("C$n5", "Status: " . ($data->countContract() != "") ? $data->mStatus() . " " . $data->countContract() : $data->mStatus())
                            ->setCellValue("C$n6", "Join Date: " . (isset($data->companyfirst)) ? $data->companyfirst->start_date . " " . $data->countJoinDate() : "")
                            ->setCellValue("C$n7", "Superior: " . $data->mSuperior())
                            ->setCellValue("C$n8", "Birth Date: " . $data->birth_date)
                            ->setCellValue("C$n9", "Length of Services: ")
                    ;

                    $objDrawing = new PHPExcel_Worksheet_Drawing();
                    $objDrawing->setName('test_img');
                    $objDrawing->setDescription('test_img');
                    $objDrawing->setPath($data->photoPathReal);
                    $objDrawing->setHeight(130);
                    $objDrawing->setCoordinates("B$n1");
                    $objDrawing->setWorksheet($foo);

                    //Education
                    foreach ($data->many_education as $key => $dataEdu) {
                        if ($dataEdu->level_id >= 8) {
                            $foo
                                    ->setCellValue("D$n1", $dataEdu->edulevel->name . " " . $dataEdu->interest)
                                    ->setCellValue("D$n2", $dataEdu->school_name . ", " . $dataEdu->graduate . ". GPA: " . $dataEdu->ipk)
                            ;
                        }
                    }

                    //Experience
                    foreach ($data->many_experience as $key => $dataExp) {
                        if ($key <= 5) {
                            $foo
                                    ->setCellValue("E$n1", $dataExp->start_date . " to " . $dataExp->end_date)
                                    ->setCellValue("F$n1", $dataExp->job_title . " at " . $dataExp->company_name)
                            ;
                        }
                    }
                    //Performance
                    foreach ($data->performance as $key => $perf) {
                        $foo
                                ->setCellValue("G$n1", "PA " . $perf->year . ' = ' . $perf->pa_value . ' , ' . $perf->potential)
                        ;
                    }

                    $counter = $n9 + 2;
                    $current++;
                }

                $phpExcel->setActiveSheetIndex(0);

                //Output the generated excel file so that the user can save or open the file.
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"performance_" . date('Ymd') . ".xls\"");

                header("Cache-Control: max-age=0");

                $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
                $objWriter->save("php://output");
                exit;
                ///
            }
        }

        $this->render('report', array('model' => $model));
    }

}
