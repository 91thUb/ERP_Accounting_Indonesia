<?php

if (isset($modelPerformanceR)) {
    echo $this->renderPartial('_tabFinalRating', array("model" => $model, "modelPerformanceR" => $modelPerformanceR));
    echo $this->renderPartial('_formFinalRating', array('model' => $modelPerformanceR));
}