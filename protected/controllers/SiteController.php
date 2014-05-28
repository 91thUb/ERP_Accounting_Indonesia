<?php

class SiteController extends Controller {

    public $layout = '//layouts/column1';

    public function init() {
        //Yii::app()->language='id';
        //return parent::init();
        //Yii::import('ext.LanguagePicker.ELanguagePicker');
        //ELanguagePicker::setLanguage();
        //return parent::init();
        // register class paths for extension captcha extended
        Yii::$classMap = array_merge(Yii::$classMap, array(
            'CaptchaExtendedAction' => Yii::getPathOfAlias('ext.captchaExtended') . DIRECTORY_SEPARATOR . 'CaptchaExtendedAction.php',
            'CaptchaExtendedValidator' => Yii::getPathOfAlias('ext.captchaExtended') . DIRECTORY_SEPARATOR . 'CaptchaExtendedValidator.php'
        ));
        return parent::init();
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            //'class'=>'CaptchaExtendedAction',
            //'mode'=>CaptchaExtendedAction::MODE_MATH,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'link' => array(
                'class' => 'CViewAction',
            ),
            'get_tweets' => array(
                'class' => 'ext.new-tweet.TweetFetch'
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/column1';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionNotSupportedBrowser() {
        $b = new EWebBrowser;
        if ($b->browser != 'Internet Explorer')
            $this->redirect(array('/menu'));
        $this->layout = '//layouts/baseNotSupport';
        $this->render('notSupportedBrowser');
    }

    public function actionLogin() {
        $this->redirect(array('/site'));
    }

    /**
     * Displays the login page
     */
    public function actionIndex() {
        $b = new EWebBrowser;
        if ($b->browser == 'Internet Explorer')
            $this->redirect(array('notSupportedBrowser'));
        $model = new fLogin;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['fLogin'])) {
            $model->attributes = $_POST['fLogin'];
            if ($model->validate() && $model->login()) {
                sUser::model()->updateByPk((int) Yii::app()->user->id, array('last_login' => time()));
                if (Yii::app()->name == "APHRIS")
                    Notification::getUserHistory();

                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        if (Yii::app()->user->isGuest) {
            $this->render('login', array('model' => $model));
        } else {

            //Yii::app()->user->setFlash('info', '<strong>Info Penting!</strong>  Update CSS Framework Boostrap Twitter. Jika anda mengalami ada fungsi-fungsi tertentu
            //yang tidak dapat digunakan atau tampilan menjadi berantakan, silahkan mengisi thread baru bugs di forum yang sudah disediakan...');

            if (Yii::app()->user->name == "admin" || sUser::model()->rightCountM > 2 || !Yii::app()->user->checkAccess('HR ESS Staff')) {
                $this->redirect(array('/menu'));
            } else
                $this->redirect(array('/m1/gEss'));
        }
    }

    public function actionLogin2() {
        $model = new fLogin;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['fLogin'])) {
            $model->attributes = $_POST['fLogin'];
            if ($model->validate() && $model->login()) {
                sUser::model()->updateByPk((int) Yii::app()->user->id, array('last_login' => time()));
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        if (Yii::app()->user->isGuest) {
            $this->render('login2', array('model' => $model));
        } else {
            $this->redirect(array('/menu'));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        //$this->redirect(Yii::app()->homeUrl);
        $this->redirect(array('/site/login'));
    }

    public function actionPhoto() {
        //$this->layout='//layouts/column1breadcrumb';
        $this->render('/site/photo');
    }

    public function actionPhotoAll() {
        //$this->layout='//layouts/column1breadcrumb';
        $this->render('/site/photoAll');
    }

    public function actionPhotoAlbum($id) {
        //$this->layout='//layouts/column1breadcrumb';
        $this->render('/site/photoAlbum', array(
            "id" => $id,
        ));
    }

    public function actionLearning() {
        //$this->layout='//layouts/column2';
        $this->render('/site/learning');
    }

    public function actionCalendarEvents() {
        $criteria = new CDbCriteria;
        $criteria->with = array('getparent');
        $criteria->compare('year(schedule_date)', date("Y"));
        $criteria->together = true;
        $criteria->AddInCondition('getparent.type_id', array(1, 2));
        $models = iLearningSch::model()->findAll($criteria);
        $items = array();
        $detail = array();
        $input = array("#CC0000", "#0000CC", "#333333", "#663333", "#993333", "#CC3333", "#003366", "#663366", "#993366", "#CC3366", "#6633CC");
        foreach ($models as $model) {
            $detail['id'] = $model->id;
            $detail['title'] = $model->learning_status;
            $detail['start'] = date('Y') . '-' . date('m', strtotime($model->schedule_date)) . '-' . date('d', strtotime($model->schedule_date));
            //$detail['start']= $model->schedule_date;
            $detail['color'] = $input[rand(0, 10)];
            $detail['allDay'] = true;
            //$detail['url'] = Yii::app()->createUrl('site/viewDetail', array("id" => $model->id));
            $detail['url'] = '#';
            $items[] = $detail;
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }

    public function actionViewDetail($id) {

        if (@$_GET['asModal'] == true) {
            $this->renderPartial('viewDetail', array(
                'model' => $this->loadModelSchedule($id),
                    ), false, true);
        } else {
            $this->render('viewDetail', array(
                'model' => $this->loadModelSchedule($id),
            ));
        }
    }

    public function loadModelSchedule($id) {
        $model = iLearningSch::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 's-user-registration-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRegister() {
        $model = new sUser;
        $model->setScenario('registration');
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['sUser'])) {
            $model->attributes = $_POST['sUser'];
            $criteria = new CDbCriteria;
            $criteria->condition = 'activation_code = :code AND activation_expire >=' . time();
            $criteria->params = array(':code' => $_POST['sUser']['activation_code']);
            $cekValidationCode = gPerson::model()->find($criteria);
            if ($cekValidationCode != null)
                $model->default_group = $cekValidationCode->mCompanyId();
            $model->status_id = 1;
            if ($model->validate()) {
                $model->created_date = time();
                $model->created_by = 1;
                $model->full_name = $cekValidationCode->employee_name;
                $_mysalt = sUser::blowfishSalt();
                //$model->password = crypt($model->password, $_mysalt);
                $model->save(false);
                //sUser::model()->updateByPk((int) $model->id, array('password' => $_password, 'salt' => $_mysalt, 'hash_type' => 'crypt'));
                $connection = Yii::app()->db;
                $sql1 = "INSERT INTO `s_authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
				('Authenticated', " . $model->id . ", NULL, 'N;'),
				('HR ESS Staff', " . $model->id . ", NULL, 'N;');";
                $sql2 = "INSERT INTO `s_user_module` (`s_user_id`, `s_module_id`, `s_matrix_id`, `favourite_id`) VALUES
				(" . $model->id . ", 194, 5, 1),
				(" . $model->id . ", 248, 5, 1),
				(" . $model->id . ", 23, 5, 1),
				(" . $model->id . ", 24, 5, 1),
				(" . $model->id . ", 25, 5, 1),
				(" . $model->id . ", 26, 5, 1),
				(" . $model->id . ", 67, 5, 1),
				(" . $model->id . ", 259, 5, 1),
				(" . $model->id . ", 208, 5, 1);";
                $command1 = $connection->createCommand($sql1);
                $command1->execute();
                $command2 = $connection->createCommand($sql2);
                $command2->execute();

                $cekValidationCode->userid = $model->id;
                $cekValidationCode->activation_expire = time(); //set now and expire automatically
                $cekValidationCode->updated_by = $model->id;
                $cekValidationCode->updated_date = time();
                $cekValidationCode->save(false);

                $this->newInbox(array(
                    'recipient' => $cekValidationCode->userid,
                    'subject' => "Welcome To APHRIS",
                    'message' => "Dear " . $cekValidationCode->employee_name . ",<br/><br/> 
					Welcome to Agung Podomoro Human Resources Information System or simply we called it: APHRIS.  You can use this application to
					maintain your personal profile info and review your education background, work experience, etc. <br/><br/>
					Here, you can also apply your leave, permission and review your attendance information. APHRIS have Training Schedule Information, 
					on upcoming features is Talent and Performance Information.<br/><br/> 
					Thank You for joining... <br/><br/>"
                ));

                $modelS = new sNotification;
                $modelS->group_id = 1;
                $modelS->company_id = $cekValidationCode->mCompanyId();

                $modelS->link = 'sUser/viewAuthenticated/id/' . $model->id;
                $modelS->content = 'Employee Self Service. New ESS created for <read>' . $model->username . '</read>' . ' from ' . $model->organization->name;
                $modelS->save();

                Yii::app()->user->setFlash('success', '<strong>Your Registration process is succesfull. Please, login with your given username and password');
                $this->redirect(array('site/login2'));
            }
        }
        Yii::app()->user->setFlash('info', '<strong>IMPORTANT INFO!!</strong>
		This Page is dedicated FOR internal Employee !!!... 
		before you activate your username and password, 
			step #1, ask your ACTIVATION CODE to HR Manager at your business unit. Otherwise, you can\'t continue to register.');
        $this->render('register', array(
            'model' => $model,
        ));
    }

    public function actionApprovedByMe($mod = '', $code = 0, $decision = 2) {
        if ($mod == 'leave') {
            $criteria = new CDbCriteria;
            $criteria->condition = 'activation_code = :code AND superior_approved_id = 1 AND activation_expire >=' . time();
            $criteria->params = array(':code' => $code);
            $cekValidationCode = gLeave::model()->find($criteria);
            if ($cekValidationCode != null) {
                if ($decision == 2) {
                    $cekValidationCode->superior_approved_id = $decision;
                } else
                    $cekValidationCode->superior_approved_id = 3;

                $cekValidationCode->updated_date = time();
                $cekValidationCode->save(false);

                $this->newInbox(array(
                    'recipient' => $cekValidationCode->person->userid,
                    'subject' => "Superior Leave Approved. Your Leave has been approved by Your Superior",
                    'message' => "Dear " . $cekValidationCode->person->employee_name . ",<br/> 
					Your leave request on " . $cekValidationCode->start_date . " and will end at " . $cekValidationCode->end_date
                    . " for: \"" . $cekValidationCode->leave_reason . "\" has been approved by your superior via Email Link. <br/> 
					Thank You.. <br/><br/>"
                ));

                /* $this->newInbox(array(
                  'recipient'=>Yii::app()->user->id,
                  'subject'=>"Sub Ordinate Leave Approved. Leave of " . $model->employee_name . " has been approved by you",
                  'message'=>"Dear " . Yii::app()->user->name . ",<br/>
                  Leave request of your subordinate, " . $model->employee_name . " has been approved by you. <br/>
                  Thank You.. <br/><br/>"
                  )); */

                Yii::app()->user->setFlash('success', '
				<strong>Leave Approval process for ' . $cekValidationCode->person->employee_name . ' on ' . $cekValidationCode->start_date . ' for 
				' . $cekValidationCode->leave_reason . ' is succesfull. Thank You');
                $this->render('approved', array(
                ));
                Yii::app()->end();
            }
        } elseif ($mod == 'permission') {
            
        } else {
            
        }


        Yii::app()->user->setFlash('error', '<strong>Instant Approval Process is failed or might be has been processed earlier . Sorry...');
        $this->render('approved', array(
        ));
    }

    // Facebook log in
    /* public function actionFacebooklogin() {
      Yii::import('ext.facebook.*');
      $ui = new FacebookUserIdentity('74026521543', '7f2ffd4bcdfafd919e276006223b4fd4');
      if ($ui->authenticate()) {
      $user=Yii::app()->user;
      $user->login($ui);
      $this->redirect($user->returnUrl);
      } else {
      throw new CHttpException(401, $ui->error);
      }
      } */
}
