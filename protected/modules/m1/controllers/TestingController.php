<?php

class TestingController extends Controller {

    public $layout = '//layouts/column1';

    public function actionIndex() {
        $this->setPageTitle('jQuery Append | Home');
        $this->render('index');
    }

    public function actionAmbiltrigger() {
        $label = gBiPerson::model()->attributeLabels();
        foreach (gBiPerson::model()->tableSchema->columns as $val) {
            $strkey['strkey'] = $val->name;
            $strvalue['strvalue'] = $label[$val->name];
            $_listField[] = array_merge($strkey, $strvalue);
        }

        echo CJSON::encode($_listField);
    }

    public function actionAmbiltrigger1() {
        $label = gBiPerson::model()->attributeLabels();
        foreach (gBiPerson::model()->tableSchema->columns as $val) {
            $strkey['strkey'] = $val->name;
            $strvalue['strvalue'] = $label[$val->name];
            $_listField[] = array_merge($strkey, $strvalue);
        }

        echo CJSON::encode($_listField);
    }

    public function actionAmbiltipe() {
        $Datanya = $_POST['data'];

        $sql = "SELECT * FROM tbl_trigger WHERE strkey='" . $Datanya . "'";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        echo CJSON::encode($dataReader['id_tipe']);
    }

    public function actionAmbiltipe2() {
        $Datanya = $_POST['data'];

        $sql = "SELECT * FROM tbl_tipe WHERE id='" . $Datanya . "'";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        echo CJSON::encode($dataReader['tipe']);
    }

    public function actionAmbilID() {
        $Datanya = $_POST['data'];
        $sql = "SELECT id_parrent FROM tbl_trigger WHERE strkey='" . $Datanya . "'";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryRow();
        echo CJSON::encode($dataReader['id_parrent']);
    }

    public function actionAmbilDetail() {
        //$Datanya = $_POST['data'];
        $sql = "SELECT data FROM tbl_detail WHERE id_parrent='1'";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        echo CJSON::encode($dataReader);
    }

    public function actionProses() {
        $ParamSelect = "id,c_pathfoto," . $_POST['selVal'];
        $CheckLast = substr($ParamSelect, -1);
        if ($CheckLast == ",") {
            $SelectResult = substr_replace($ParamSelect, "", -1);
        } else {
            $SelectResult = $ParamSelect;
        }

        $SelectResultOrig = $SelectResult;
        $SelectResult = str_replace(",export", "", $SelectResult);
        $Query = "SELECT " . $SelectResult . " FROM g_bi_person";

        $strWhere = "";
        foreach ($_POST['rows'] as $key => $count) {
            $Data1 = $_POST['data1_' . $count];
            $Data2 = $_POST['data2_' . $count];
            $Data3 = $_POST['data3_' . $count];
            /* echo "Data 1 : ".$Data1."<br>";
              echo "Data 2 : ".$Data2."<br>";
              echo "Data 3 : ".$Data3."<br>";
              echo "<br>"; */
            if (trim($strWhere) == "") {
                $strWhere = $Data1 . " " . $Data3 . " '" . $Data2 . "'";
            } else {
                $strWhere .= " AND " . $Data1 . " " . $Data3 . " '" . $Data2 . "'";
            }
        }
        //echo $Query;
        //die;

        if (!isset($Data2)) {
            $rawData = Yii::app()->db->createCommand($Query)->queryAll();
        } else
            $rawData = Yii::app()->db->createCommand($Query . " WHERE " . $strWhere)->queryAll();

        $labels = gBiPerson::model()->attributeLabels();

        $SelectResult = str_replace("c_pathfoto,", "", $SelectResult);
        $marray = explode(",", $SelectResult);
        foreach ($marray as $key => $mgroup) {
            $fieldres['header'] = $labels[$mgroup];

            if ($labels[$mgroup] == "Employee Name") {
                $fieldres['type'] = 'raw';
                $fieldres['value'] = 'CHtml::link($data["' . $mgroup . '"],Yii::app()->createUrl("/m1/gPerson/view",array("id"=>$data["id"])),array("target"=>"_blank"))';
            } elseif ($labels[$mgroup] == "Education" || $labels[$mgroup] == "Experience") {
                $fieldres['type'] = 'raw';
                $fieldres['value'] = '$data["' . $mgroup . '"]';
            } else
                $fieldres['value'] = '$data["' . $mgroup . '"]';

            $fieldresult[] = $fieldres;
        }

        $fieldres['header'] = "Photo";
        $fieldres['type'] = 'raw';
        $fieldres['value'] = '($data["c_pathfoto"] != null) ? CHtml::image(Yii::app()->request->baseUrl . "/shareimages/hr/employee/thumb/" . $data["c_pathfoto"]) : ""';
        $html["width"] = "60px";
        $fieldres['htmlOptions'] = $html;
        $fieldresult[] = $fieldres;


        if (strpos($SelectResultOrig, 'export') == true) {
            $production = 'export';
        } else {
            $production = 'grid';
        }

        $dataProvider = new CArrayDataProvider($rawData, array(
            'id' => 'bi_person',
            'pagination' => false,
        ));

        $this->render('indexBertho', array(
            'dataProvider' => $dataProvider,
            'production' => $production,
            'field' => $fieldresult,
                //'sql' => $sql,
        ));
    }

}
