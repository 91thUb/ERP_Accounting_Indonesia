<?php

class GAttendanceController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $defaultAction = 'index2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights',
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id, $month = 0) {
        $modelAttendance = $this->newattendance($id, $month);

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'month' => $month,
            'modelAttendance' => $modelAttendance,
        ));
    }

    public function actionReset($id) {
        $model = $this->loadmodelAttendance($id);
        $model->in = date('H:i', strtotime($model->realpattern->in));
        $model->out = date('H:i', strtotime($model->realpattern->out));
        $model->save(false);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function newAttendance($id, $month) {
        $model = new gAttendance;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gAttendance'])) {
            $model->attributes = $_POST['gAttendance'];
            $model->parent_id = $id;
            $model->save();
            $this->refresh();
        }

        return $model;
    }

    public function actionListChange() {
        $this->render('listChange', array(
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->layout = '//layouts/column3filter';

        $model = new gPerson('search');
        $model->unsetAttributes();

        $criteria = new CDbCriteria;

        if (Yii::app()->user->name != "admin") {
            $criteria2 = new CDbCriteria;
            $criteria2->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                    implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                    ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') OR ' .
                    '(select c2.company_id from g_person_career2 c2 WHERE t.id=c2.parent_id AND c2.company_id IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') ORDER BY c2.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria2);
        }

        if (isset($_GET['pid']) && ($_GET['pid'] != null)) {
            $criteria->condition = '(select c.department_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) = ' . $_GET['pid'];
        }

        if (isset($_GET['gPerson'])) {
            $model->attributes = $_GET['gPerson'];

            $criteria1 = new CDbCriteria;
            $criteria1->compare('employee_name', $_GET['gPerson']['employee_name'], true, 'OR');
            //$criteria1->compare('address1',$_GET['gPerson']['address1'],true,'OR');
            $criteria->mergeWith($criteria1);
        }

        $criteria->order = 'updated_date DESC';

        $dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');

        //$dataProvider=new CActiveDataProvider('gPerson', array(
        $dataProvider = new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
            'criteria' => $criteria,
                )
        );

        //Yii::app()->user->setFlash('info','<strong>Upload Photo!</strong> Upload Photo yang tadinya bermasalah sekarang sudah bisa digunakan.. ');

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionIndex2() {
        $this->layout = '//layouts/column2';

        $model = new gPerson('search');
        $model->unsetAttributes();

        $criteria = new CDbCriteria;

        if (Yii::app()->user->name != "admin") {
            $criteria2 = new CDbCriteria;
            $criteria2->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                    implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                    ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') OR ' .
                    '(select c2.company_id from g_person_career2 c2 WHERE t.id=c2.parent_id AND c2.company_id IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') ORDER BY c2.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ')';
            $criteria->mergeWith($criteria2);
        }

        if (isset($_GET['pid']) && ($_GET['pid'] != null)) {
            $criteria->condition = '(select c.department_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' . implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) . ') ORDER BY c.start_date DESC LIMIT 1) = ' . $_GET['pid'];
        }

        if (isset($_GET['gPerson'])) {
            $model->attributes = $_GET['gPerson'];

            $criteria1 = new CDbCriteria;
            $criteria1->compare('employee_name', $_GET['gPerson']['employee_name'], true, 'OR');
            //$criteria1->compare('address1',$_GET['gPerson']['address1'],true,'OR');
            $criteria->mergeWith($criteria1);
        }

        $criteria->order = 'updated_date DESC';

        $dependency = new CDbCacheDependency('SELECT MAX(id) FROM g_person');

        //$dataProvider=new CActiveDataProvider('gPerson', array(
        $dataProvider = new CActiveDataProvider(gPerson::model()->cache(3600, $dependency, 2), array(
            'criteria' => $criteria,
                )
        );

        //Yii::app()->user->setFlash('info','<strong>Upload Photo!</strong> Upload Photo yang tadinya bermasalah sekarang sudah bisa digunakan.. ');

        $this->render('index2', array(
            'dataProvider' => $dataProvider,
            'model' => $model,
        ));
    }

    public function actionApproved($id, $pid) {
        $model = $this->loadmodelAttendance($id);
        $modelPerson = gPerson::model()->findByPk($pid);

        $modelAttendance = gAttendance::model()->findByPk((int) $id);

        gAttendance::model()->updateByPk((int) $id, array(
            'approved_id' => 2, //aproved
            'superior_approved_id' => 2, //approved
            'realpattern_id' => $modelAttendance->changepattern_id,
        ));

        $this->newInbox(array(
            'recipient' => $modelPerson->userid,
            'subject' => "Schedule-change Approved. Your Request to Change Shift has been approved by HR Admin",
            'message' => "Dear " . $model->person->employee_name . ",<br/> <br/>
			Your request to Change Shift on " . $model->cdate . " for: " . $model->remark . " has been approved by HR Admin. <br/> 
			Thank You.. <br/><br/>"
        ));
    }

    public function actionRejected($id, $pid) {
        $model = $this->loadmodelAttendance($id);
        $modelPerson = gPerson::model()->findByPk($pid);

        $modelAttendance = gAttendance::model()->findByPk((int) $id);

        gAttendance::model()->updateByPk((int) $id, array(
            'approved_id' => 3, //rejected
            'superior_approved_id' => 3, //rejected
        ));

        $this->newInbox(array(
            'recipient' => $modelPerson->userid,
            'subject' => "Schedule-change Rejected. Your Request to Change Shift has been rejected by HR Admin",
            'message' => "Dear " . $model->person->employee_name . ",<br/> <br/>
			Your request to Change Shift on " . $model->cdate . " for: " . $model->remark . " has been rejected by HR Admin. <br/> 
			Thank You.. <br/><br/>"
        ));
    }

    public function actionEmptied($id, $pid) {
        $model = $this->loadmodelAttendance($id);
        $modelPerson = gPerson::model()->findByPk($pid);

        $modelAttendance = gAttendance::model()->findByPk((int) $id);

        gAttendance::model()->updateByPk((int) $id, array(
            'approved_id' => 0, //rejected
            'superior_approved_id' => 0, //rejected
            'changepattern_id' => 0, //
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdateAttendance($id) {
        $model = $this->loadmodelAttendance($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gAttendance'])) {
            $model->attributes = $_POST['gAttendance'];
            if ($model->save())
                EQuickDlgs::checkDialogJsScript();
        }

        EQuickDlgs::render('_formAttendance', array('model' => $model));
    }

    public function actionDeleteAttendance($id) {
        $model = $this->loadmodelAttendance($id);
        $model->delete();
    }

    public function actionSetLembur($id) {
        $model = $this->loadmodelAttendance($id);
        $model->daystatus3_id = 400;
        //$model->overtime_out=strtotime($model->out) - strtotime($model->realpattern->out);
        $model->overtime_out = 120;
        $model->save(false);
    }

    public function actionSetClear($id) {
        $model = $this->loadmodelAttendance($id);
        $model->daystatus1_id = null;
        $model->daystatus2_id = null;
        $model->daystatus3_id = null;
        $model->save(false);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $criteria = new CDbCriteria;

        if (Yii::app()->user->name != "admin") {
            $criteria->condition = '(select c.company_id from g_person_career c WHERE t.id=c.parent_id AND c.status_id IN (' .
                    implode(',', Yii::app()->getModule("m1")->PARAM_COMPANY_ARRAY) .
                    ') ORDER BY c.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') OR ' .
                    '(select c2.company_id from g_person_career2 c2 WHERE t.id=c2.parent_id AND c2.company_id IN (' .
                    implode(",", sUser::model()->myGroupArray) . ') ORDER BY c2.start_date DESC LIMIT 1) IN (' .
                    implode(",", sUser::model()->myGroupArray) . ')';
        }

        $model = gPerson::model()->findByPk((int) $id, $criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadmodelAttendance($id) {
        $criteria = new CDbCriteria;

        $model = gAttendance::model()->findByPk((int) $id, $criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'g-attendance-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionPrintDetail($id, $month) {
        $pdf = new attendanceDetail('P', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $criteria = new CDbCriteria;

        $criteria->compare('parent_id', $id);
        $criteria->addBetweenCondition('cdate', date("Y-m-d", strtotime(date("Y-m", strtotime($month . " month")) . "-01")), date("Y-m-d", strtotime("-1 day", strtotime(date("Y-m", strtotime($month + 1 . " month")) . "-01"))));
        //$criteria->compare('cdate',$this->cdate,true);
        //$criteria->compare('realpattern_id',$this->realpattern_id);
        //$criteria->compare('daystatus1_id',$this->daystatus1_id);
        //$criteria->compare('in',$this->in,true);
        //$criteria->compare('out',$this->out,true);
        $criteria->order = 'cdate';
        $criteria->with = 'realpattern';
        $criteria->select = 'CASE WHEN TIME(realpattern.in) < TIME(t.in) THEN "Late In" ELSE "" END as lateIn,
		CASE WHEN TIME(realpattern.out) > TIME(t.out) THEN "Early Out" ELSE "" END as earlyOut, *';

        $models = gAttendance::model()->findAll($criteria);
        if ($models == null)
            throw new CHttpException(404, 'The requested page does not exist.');

        $pdf->report($models);

        $pdf->Output();
    }

    public function actionTimeblock($flash = "off") {

        $this->createFolder();

        $model = new fImage;

        if (isset($_POST['fImage'])) {
            $model->attributes = $_POST['fImage'];
            $model->picture = CUploadedFile::getInstance($model, 'picture');
            if ($model->validate() && $model->picture->name == "schedule.xls") {
                $folder = Yii::app()->basePath . '/../sharedocs/temporarydocuments/' . sUser::getMyGroup() . '/';  // folder for uploaded files
                $model->picture->saveAs($folder . $model->picture->name);

                Yii::app()->user->setFlash('success', '<strong>Success!</strong> Upload Schedule has been set succesfully...');
            } else
                Yii::app()->user->setFlash('error', '<strong>Error!</strong> Error Upload Schedule...');
        }

        Yii::import('ext.phpexcelreader.JPhpExcelReader');
        $folder = '/sharedocs/temporarydocuments/' . sUser::getMyGroup();  // folder for uploaded files
        $file = Yii::getPathOfAlias('webroot') . $folder . '/schedule.xls';

        if (is_file($file)) {
            $this->layout = '//layouts/column1';

            $reader = new JPhpExcelReader($file);

            foreach ($reader->sheets as $k => $data) {
                if ($k == 0) {
                    foreach ($data['cells'] as $r => $row) {
                        if ($r == 1) {
                            $h = array('parent_id', 'begin_date', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10',
                                'c11', 'c12', 'c13', 'c14', 'c15', 'c16', 'c17', 'c18', 'c19', 'c20', 'c21', 'c22', 'c23', 'c24', 'c25', 'c26', 'c27',
                                'c28', 'c29', 'c30', 'c31');
                            foreach ($row as $cell) {
                                if (in_array($cell, $h)) {
                                    $headers[] = $cell;
                                }
                            }
                        } else {
                            if ($headers != null) {
                                foreach ($headers as $i => $header) {
                                    if ($header == "parent_id") {
                                        $model = gPerson::model()->findByPk($row[$i + 1]);
                                        if ($model != null) {
                                            $inside[$header] = $model->employee_name . " (" . $row[$i + 1] . ")";
                                        } else
                                            $inside[$header] = $row[$i + 1];
                                    } elseif (substr($header, 0, 1) == "c") {
                                        $mod = gParamTimeblock::model()->findByPk($row[$i + 1]);
                                        if ($mod != null) {
                                            $inside[$header] = $row[$i + 1];
                                        } else
                                            $inside[$header] = "??";
                                    } else {
                                        $inside[$header] = $row[$i + 1];
                                    }
                                }
                                $all[] = $inside;
                            }
                        }
                    }
                }
            }

            if ($headers != null) {
                $gridDataProvider = new CArrayDataProvider($all, array('pagination' => false));
                $this->render('timeblock', array(
                    'headers' => $headers,
                    'gridDataProvider' => $gridDataProvider,
                ));
            } //else
            //    Yii::app()->user->setFlash('error', '<strong>Error!</strong> Invalid schedule.xls format');
            //    $this->deleteFile();
            //	$this->render('timeblock', array(
            //    ));
        } else {
            if ($flash == "on")
                Yii::app()->user->setFlash('success', '<strong>Great!</strong> Migration Data from Excel to Schedule Tabel finished..');

            $this->render('timeblock', array('model' => $model));
        }
    }

    public function actionTimeblockUpload() {
        $this->createFolder();

        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = 'sharedocs/temporarydocuments/' . sUser::getMyGroup() . '/';  // folder for uploaded files

        $allowedExtensions = array("xls");  //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 5 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME

        echo $return; // it's array
    }

    public function actionTimeblockSave() {

        $this->createFolder();

        Yii::import('ext.phpexcelreader.JPhpExcelReader');
        $folder = '/sharedocs/temporarydocuments/' . sUser::getMyGroup();  // folder for uploaded files
        $file = Yii::getPathOfAlias('webroot') . $folder . '/schedule.xls';
        if (!is_file($file)) {
            $this->redirect('timeBlock');
        }

        $reader = new JPhpExcelReader($file);

        foreach ($reader->sheets as $k => $data)
            if ($k == 0) { {
                    foreach ($data['cells'] as $r => $row) {
                        if ($r == 1) {
                            $h = array('parent_id', 'begin_date', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10',
                                'c11', 'c12', 'c13', 'c14', 'c15', 'c16', 'c17', 'c18', 'c19', 'c20', 'c21', 'c22', 'c23', 'c24', 'c25', 'c26', 'c27',
                                'c28', 'c29', 'c30', 'c31');
                            foreach ($row as $cell) {
                                if (in_array($cell, $h)) {
                                    $headers[] = $cell;
                                }
                            }
                        } else {
                            $model = new gAttendanceTimeblock;
                            foreach ($headers as $i => $header) {
                                if (substr($header, 0, 1) == "c") {
                                    $mod = gParamTimeblock::model()->findByPk($row[$i + 1]);
                                    if ($mod != null) {
                                        $model->$header = $row[$i + 1];
                                    } else
                                        $model->$header = 91; //91 Code Not Found
                                } else
                                    $model->$header = $row[$i + 1];
                            }

                            $modelG = gAttendanceTimeblock::model()->find(array('condition' => 'parent_id = ' . $model->parent_id . ' AND begin_date = ' . $model->begin_date));
                            if ($modelG == null)
                                $model->save(false);

                            if ($modelG != null) {
                                $i = 1;
                                while ($i <= 31) {
                                    $modelAttendanceNew = new gAttendance;
                                    $modelAttendanceNew->parent_id = $model->parent_id;
                                    $modelAttendanceNew->cdate = str_pad($i, 2, "0", STR_PAD_LEFT) . '-' . substr($model->begin_date, 4, 2) . '-' . substr($model->begin_date, 0, 4);
                                    $r = "c" . $i;
                                    $modelAttendanceNew->realpattern_id = $model->$r;

                                    $cr = new CDbCriteria;
                                    $cr->compare('parent_id', $modelAttendanceNew->parent_id);
                                    $cr->compare('cdate', date('Y-m-d', strtotime($modelAttendanceNew->cdate)));
                                    $checkAttendance = gAttendance::model()->find($cr);
                                    if ($checkAttendance == null)
                                        $modelAttendanceNew->save();

                                    $i++;
                                }
                            }
                        }
                    }
                }
            }


        $this->deleteFile();
        $this->redirect(array('timeBlock', 'flash' => 'on'));
    }

    public function actionDeleteTempFile($flash = "off") {
        $this->deleteFile();
        $this->redirect(array('timeBlock'));
    }

    public function createFolder() {

        $folder = '/sharedocs/temporarydocuments/' . sUser::getMyGroup();  // folder for uploaded files
        if (!is_dir(Yii::getPathOfAlias('webroot') . $folder))
            mkdir(Yii::getPathOfAlias('webroot') . '/sharedocs/temporarydocuments/' . sUser::getMyGroup());
    }

    private function deleteFile() {
        $folder = '/sharedocs/temporarydocuments/' . sUser::getMyGroup();  // folder for uploaded files
        $file = Yii::getPathOfAlias('webroot') . $folder . '/schedule.xls';
        if (is_file($file))
            unlink($file);
    }

    private function deleteFileAttendant() {
        $folder = '/sharedocs/temporarydocuments/' . sUser::getMyGroup();  // folder for uploaded files
        $file = Yii::getPathOfAlias('webroot') . $folder . '/attendant.xls';
        if (is_file($file))
            unlink($file);
    }

    public function actionAttendBlock() {
        $model = new fImage;

        if (isset($_POST['fImage'])) {
            $model->attributes = $_POST['fImage'];
            $model->picture = CUploadedFile::getInstance($model, 'picture');
            if ($model->validate() && $model->picture->name == "attendant.xls") {
                $folder = Yii::app()->basePath . '/../sharedocs/temporarydocuments/' . sUser::getMyGroup() . '/';  // folder for uploaded files
                $model->picture->saveAs($folder . $model->picture->name);
                // redirect to success page
                $this->actionAttendblockUpload();
                Yii::app()->user->setFlash('success', '<strong>Success!</strong> Upload Attendant has been set succesfully...');
            } else
                Yii::app()->user->setFlash('error', '<strong>Error!</strong> Error Upload Attendant...');
        } else
            $this->deleteFileAttendant();


        $this->render('attendblock', array('model' => $model));
    }

    public function actionAttendblockUpload() {

        $this->createFolder();
        //$this->deleteFileAttendant();

        /* Yii::import("ext.EAjaxUpload.qqFileUploader");

          $folder = 'sharedocs/temporarydocuments/'.sUser::getMyGroup().'/';  // folder for uploaded files

          $allowedExtensions = array("xls");  //array("jpg","jpeg","gif","exe","mov" and etc...
          $sizeLimit = 5 * 1024 * 1024; // maximum file size in bytes
          $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
          $result = $uploader->handleUpload($folder);
          $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

          $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
          $fileName = $result['filename']; //GETTING FILE NAME
         */
        $folder = 'sharedocs/temporarydocuments/' . sUser::getMyGroup() . '/';  // folder for uploaded files
        $file = Yii::getPathOfAlias('webroot') . '/' . $folder . 'attendant.xls';

        Yii::import('ext.phpexcelreader.JPhpExcelReader');
        $reader = new JPhpExcelReader($file);

        foreach ($reader->sheets as $k => $data) {
            if ($k == 0) {
                foreach ($data['cells'] as $r => $row) {
                    if ($r == 1) {
                        //do nothing
                    } else {
                        //$model = array();
                        $criteria = new CDbCriteria;
                        if (isset($row[1])) {
                            $criteria->compare('parent_id', (int) $row[1]);
                        } else
                            $criteria->compare('parent_id', 'empty'); //force N.A.

                        if (isset($row[2]))
                            $criteria->compare('cdate', date("Y-m-d", strtotime($row[2])));

                        $model = gAttendance::model()->find($criteria);

                        //IF NULL Do Transfer
                        if ($model == null) {
                            $criteriaG = new CDbCriteria;
                            $criteriaG->compare('parent_id', (int) $row[1]);
                            $criteriaG->compare('begin_date', date("Ym", strtotime($row[2])));

                            $modelG = gAttendanceTimeblock::model()->find($criteriaG);

                            if ($modelG != null) {
                                $i = 1;
                                while ($i <= 31) {
                                    $criteriaAttendance = new CDbCriteria;
                                    $criteriaAttendance->compare('parent_id', $row[1]);

                                    $criteriaAttendance->compare('cdate', date("Y-m-", strtotime($row[2])) . str_pad($i, 2, "0", STR_PAD_LEFT));
                                    $modelAttendance = gAttendance::model()->find($criteriaAttendance);

                                    //if ($modelAttendance == null) {
                                    $modelAttendanceNew = new gAttendance;
                                    $modelAttendanceNew->parent_id = $row[1];
                                    $modelAttendanceNew->cdate = str_pad($i, 2, "0", STR_PAD_LEFT) . date("-m-Y", strtotime(date("Y-m", strtotime($row[2])) . "-01"));
                                    $r = "c" . $i;
                                    $modelAttendanceNew->realpattern_id = $modelG->$r;
                                    $modelAttendanceNew->save(false);
                                    //}
                                    $i++;
                                }
                            }
                        }

                        //IF NOT NULL or Do Read again
                        $modelN = gAttendance::model()->find($criteria);
                        if ($modelN != null) {
                            if (peterFunc::checkTime($row[3])) {
                                $modelN->in = date("d-m-Y", strtotime($row[2])) . " " . $row[3];
                                $modelN->updated_date = time();
                                $modelN->updated_by = Yii::app()->user->id;
                            }

                            if (peterFunc::checkTime($row[4]) && $row[3] != $row[4])
                                if (strtotime(date("d-m-Y", strtotime($row[2])) . " " . $row[3]) < strtotime(date("d-m-Y", strtotime($row[2])) . " " . $row[4])) {
                                    $modelN->out = date("d-m-Y", strtotime($row[2])) . " " . $row[4];
                                } else
                                    $modelN->out = date("d-m-Y", strtotime($row[2] . " +1 day")) . " " . $row[4];

                            $modelN->save(false);
                        }
                    }
                }
            }
        }
        //$this->deleteFileAttendant();

        echo $return; // it's array
    }

    public function actionShow() {

        Yii::import('ext.phpexcelreader.JPhpExcelReader');
        $folder = '/sharedocs/temporarydocuments/' . sUser::getMyGroup();  // folder for uploaded files
        $file = Yii::getPathOfAlias('webroot') . $folder . '/attendant.xls';
        if (!is_file($file)) {
            $this->redirect('attendBlock');
        }

        $reader = new JPhpExcelReader($file);

        foreach ($reader->sheets as $k => $data)
            if ($k == 0) { {
                    foreach ($data['cells'] as $r => $row) {
                        //if ($r == 8) {
                        echo $row[2];
                        //echo $row[1]." | ".date("d-m-Y",strtotime($row[2]))." ".$row[3]." | ".date("d-m-Y",strtotime($row[2]))." ".$row[4];
                        //echo print_r($row);
                        echo "<br/>";
                        //}
                    }
                }
            }
    }

    public function actionTransferAttendance($id, $month) {
        $criteria = new CDbCriteria;
        $criteria->compare('parent_id', $id);
        $criteria->compare('begin_date', date("Ym", strtotime(date("Y-m", strtotime($month . " month")) . "-01")));
        //$criteria->compare('begin_date','201211');

        $model = gAttendanceTimeblock::model()->find($criteria);

        if ($model != null) {
            $i = 1;
            while ($i <= 31) {
                $criteriaAttendance = new CDbCriteria;
                $criteriaAttendance->compare('parent_id', $id);
                $criteriaAttendance->compare('cdate', date("Y-m-", strtotime(date("Y-m", strtotime($month . " month")) . "-01")) . str_pad($i, 2, "0", STR_PAD_LEFT));
                $modelAttendance = gAttendance::model()->find($criteriaAttendance);

                if ($modelAttendance == null) {
                    $modelAttendanceNew = new gAttendance;
                    $modelAttendanceNew->parent_id = $id;
                    $modelAttendanceNew->cdate = str_pad($i, 2, "0", STR_PAD_LEFT) . date("-m-Y", strtotime(date("Y-m", strtotime($month . " month")) . "-01"));
                    $r = "c" . $i;
                    $modelAttendanceNew->realpattern_id = $model->$r;
                    $modelAttendanceNew->save();
                }
                $i++;
            }
        }


        $modelAttendance = $this->newAttendance($id, $month);

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'month' => $month,
            'modelAttendance' => $modelAttendance,
        ));
    }

    public function actionParamTimeblock() {
        $model = new gParamTimeblock;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gParamTimeblock'])) {
            $model->attributes = $_POST['gParamTimeblock'];
            $model->company_id = sUser::model()->myGroup;

            if ($model->save())
                $this->refresh();
        }

        $this->render('paramtimeblock', array(
            'model' => $model,
        ));
    }

    public function loadModelParamTimeblock($id) {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $id);

        if (Yii::app()->user->name != "admin") {
            $criteria->addInCondition('company_id', sUser::model()->myGroupArray);
        }
        $model = gParamTimeblock::model()->find($criteria);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionUpdateParamTimeblock($id) {
        $model = $this->loadModelParamTimeblock($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['gParamTimeblock'])) {
            $model->attributes = $_POST['gParamTimeblock'];
            echo print_r($_POST['gParamTimeblock']);

            if ($model->save())
                EQuickDlgs::checkDialogJsScript();
        }

        EQuickDlgs::render('_formParamTimeblock', array('model' => $model));
    }

    public function actionDeleteParamTimeblock($id) {
        $this->loadModelParamTimeblock($id)->delete();
    }

    public function actionUpdateParamTimeblockAjax() {
        $model->attributes = $_POST;
        $model = $this->loadModelParamTimeblock($_POST['pk']);
        $model->$_POST['name'] = $_POST['value'];
        if ($model->save()) {
            return true;
        } else
            return false;
    }

    public function actionReportByDept() {
        $model = new fBeginEndDate('attendance');
        //if (!isset($model->begindate)) 
        //    $model->begindate = date('Yd');

        if (isset($_POST['fBeginEndDate'])) {
            $model->attributes = $_POST['fBeginEndDate'];
            if ($model->validate()) {

                if ($model->report_id == 1) {  //Detail
                    $pdf = new attendanceSummaryByDept('L', 'mm', 'A4');
                    $pdf->AliasNbPages();
                    $pdf->AddPage();
                    $pdf->SetFont('Arial', '', 12);

                    $connection = Yii::app()->db;
                    $sql = "SELECT a.employee_name, a.department, a.level, a.join_date, a.job_title,

							(select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . $model->period . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2) 
							as cuti,

							((select count(id) from g_attendance 
							where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . $model->period . " 
								and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' 
								and realpattern_id NOT IN (90,89)  and `out` is null and `in` is null) 
								-
							(ifnull((select sum(number_of_day) from g_leave where parent_id = a.id and CONCAT(year(start_date),lpad(month(start_date),2,'0')) = " . $model->period . " and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "' and approved_id = 2),0)) 
							-
							(ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . $model->period . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0))
								) 
							-
							(ifnull((select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . $model->period . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "'),0)) 

								  as alpha,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(subtime(g.`out`,'01:00:00'),g.`in` )))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . $model->period . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89))
								as workhour,

							(select count(g.id) from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . $model->period . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
								as lateIn,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(g.`in`, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')))))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . $model->period . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.in,'%H:%i:59')),g.`in`) < 0) 
								as lateInCount,

							(select count(g.id) from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . $model->period . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
								as earlyOut,

							(select date_format(sec_to_time(sum(time_to_sec(TIMEDIFF(CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00')),g.out)))),'%H.%i.%s') from g_attendance g 
								inner join g_param_timeblock t on t.id = g.realpattern_id
								where g.parent_id = a.id and CONCAT(year(g.cdate), lpad(month(g.cdate),2,'0')) = " . $model->period . " and g.cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and g.realpattern_id NOT IN (90,89)
								and TIMEDIFF(g.out, CONCAT(date_format(g.in,'%Y-%m-%d'),' ', date_format(t.out,'%H:%i:00'))) < 0) 
								as earlyOutCount,


							(select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . $model->period . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is not null and `in` is null) 
							as tad,
							(select count(id) from g_attendance where parent_id = a.id and CONCAT(year(cdate),lpad(month(cdate),2,'0')) = " . $model->period . " and cdate <= '" . date('Y-m-d', strtotime('yesterday')) . "' and realpattern_id NOT IN (90,89) and `out` is null and `in` is not null) 
							as tap,

							(select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id = 10 and concat(year(start_date), lpad(month(start_date),2,'0')) = " . $model->period . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
							as sakit,
							
							(select sum(datediff(end_date,start_date)+1) from g_permission 
							where parent_id = a.id and permission_type_id IN (1,2,3,4,5,6,7,8,9,15,19) and concat(year(start_date), lpad(month(start_date),2,'0')) = " . $model->period . " 
								and start_date <= '" . date('Y-m-d', strtotime('yesterday')) . "') 
							as special

						FROM g_bi_person a
						WHERE company_id = " . sUser::model()->myGroup . " AND employee_status NOT IN ('Resign','End of Contract','Black List','Termination')
						ORDER by a.department, 

(select c.level_id from g_person_career c WHERE a.id=c.parent_id AND c.status_id IN (" .
                            implode(',', Yii::app()->getModule('m1')->PARAM_COMPANY_ARRAY) .
                            ") ORDER BY c.start_date DESC LIMIT 1), a.job_title,
a.employee_name";

                    $command = $connection->createCommand($sql);
                    $rows = $command->queryAll();

                    //if(!isset($rows)
                    //	throw new CHttpException(404,'Record not found.');

                    $pdf->report($rows, $model);
                } //elseif {

                $pdf->Output();
            }
        }

        $this->render('reportByDept', array('model' => $model));
    }

    public function actionUpload() {
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) &&
                (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
        $data = array();

        $model = new fImage;
        $model->picture = CUploadedFile::getInstance($model, 'picture');
        //if ($model->picture !== null  && $model->validate(array('picture'))) {
        $model->picture->saveAs(
                //Yii::getPathOfAlias('webroot.sharedocs.temporarydocuments').'/'.$model->picture->name);
                Yii::app()->basePath . '/../sharedocs/temporarydocuments/' . $model->picture->name);
        //$model->file_name = $model->picture->name;
        // save picture name
        $model->save();
        /* if( $model->save())
          {
          // return data to the fileuploader
          $data[] = array(
          'name' => $model->picture->name,
          'type' => $model->picture->type,
          'size' => $model->picture->size,
          // we need to return the place where our image has been saved
          'url' => $model->getImageUrl(), // Should we add a helper method?
          // we need to provide a thumbnail url to display on the list
          // after upload. Again, the helper method now getting thumbnail.
          'thumbnail_url' => $model->getImageUrl(MyModel::IMG_THUMBNAIL),
          // we need to include the action that is going to delete the picture
          // if we want to after loading
          'delete_url' => $this->createUrl('my/delete',
          array('id' => $model->id, 'method' => 'uploader')),
          'delete_type' => 'POST');
          } else {
          $data[] = array('error' => 'Unable to save model after saving picture');
          } */
        //} else {
        //	if ($model->hasErrors('picture'))
        //	{
        //			$data[] = array('error', $model->getErrors('picture'));
        //		} else {
        //			throw new CHttpException(500, "Could not upload file ".     CHtml::errorSummary($model));
        //		}
        //	}
        // JQuery File Upload expects JSON data
        echo json_encode($data);
    }

}
