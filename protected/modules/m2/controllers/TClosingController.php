<?php

class TClosingController extends Controller {

    public $layout = '//layouts/column1';

    public function filters() {
        return array(
            'rights',
        );
    }

    public function actionIndex() {
        $this->render('/tPosting/closing', array(
        ));
    }

    public function actionClosingPeriodExecution() {

        $_curPeriod = Yii::app()->settings->get("System", "cCurrentPeriod");
        $_lastPeriod = peterFunc::cBeginDateBefore(Yii::app()->settings->get("System", "cCurrentPeriod"));

        $_nextPeriod = peterFunc::cBeginDateAfter(Yii::app()->settings->get("System", "cCurrentPeriod"));
        Yii::app()->settings->set("System", "cCurrentPeriod", $_nextPeriod, $toDatabase = true);

        Yii::app()->user->setFlash('success', '<strong>Great!</strong> Closing Period has been successful...');

        $this->redirect(array('index'));
        //return true;
    }

    public function actionClosingPeriodExecutionB() {

        $_curPeriod = Yii::app()->settings->get("System", "cCurrentPeriod");
        $_lastPeriod = peterFunc::cBeginDateBefore(Yii::app()->settings->get("System", "cCurrentPeriod"));

        $_nextPeriod = peterFunc::cBeginDateAfter(Yii::app()->settings->get("System", "cCurrentPeriod"));
        Yii::app()->settings->set("System", "cCurrentPeriod", $_lastPeriod, $toDatabase = true);

        Yii::app()->user->setFlash('success', '<strong>Great!</strong> Closing Period has been successful...');

        $this->redirect(array('index'));
        //return true;
    }

}
