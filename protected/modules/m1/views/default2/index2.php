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
            <h1>Dashboard Detail</h1>
        </div>

        <div class="row">
            <div class="span10">
                <?php
                $this->Widget('ext.highcharts.HighchartsWidget', array(
                    'options' => array(
                        'chart' => array('defaultSeriesType' => 'line'),
                        'title' => array('text' => 'Total Employee per Month by Age (' . date("Y") . ')'),
                        'xAxis' => array(
                            'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des')
                        ),
                        'theme' => 'dark-blue',
                        'yAxis' => array(
                            'title' => array('text' => 'Total')
                        ),
                        'series' => gPerson2::compEmployeePerMonthAllAge(),
                        'plotOptions' => array(
                            'column' => array(
                                'dataLabels' => array(
                                    'enabled' => true,
                                    'color' => 'colors[0]',
                                    'style' => array(
                                        'fontWeight' => 'bold'
                                    ),
                                )
                            )
                        ),
                    )
                ));
                ?>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="span10">
                <?php
                $this->Widget('ext.highcharts.HighchartsWidget', array(
                    'options' => array(
                        'chart' => array('defaultSeriesType' => 'line'),
                        'title' => array('text' => 'Total Employee per Month by Gender (' . date("Y") . ')'),
                        'xAxis' => array(
                            'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des')
                        ),
                        'theme' => 'dark-blue',
                        'yAxis' => array(
                            'title' => array('text' => 'Total')
                        ),
                        'series' => gPerson2::compEmployeePerMonthAllGender(),
                        'plotOptions' => array(
                            'column' => array(
                                'dataLabels' => array(
                                    'enabled' => true,
                                    'color' => 'colors[0]',
                                    'style' => array(
                                        'fontWeight' => 'bold'
                                    ),
                                )
                            )
                        ),
                    )
                ));
                ?>

            </div>
        </div>

        <br/>

        <div class="row">
            <div class="span10">
                <?php
                $this->Widget('ext.highcharts.HighchartsWidget', array(
                    'options' => array(
                        'chart' => array('defaultSeriesType' => 'line'),
                        'title' => array('text' => 'Total Employee per Month by Religion (' . date("Y") . ')'),
                        'xAxis' => array(
                            'categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des')
                        ),
                        'theme' => 'dark-blue',
                        'yAxis' => array(
                            'title' => array('text' => 'Total')
                        ),
                        'series' => gPerson2::compEmployeePerMonthAllReligion(),
                        'plotOptions' => array(
                            'column' => array(
                                'dataLabels' => array(
                                    'enabled' => true,
                                    'color' => 'colors[0]',
                                    'style' => array(
                                        'fontWeight' => 'bold'
                                    ),
                                )
                            )
                        ),
                    )
                ));
                ?>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="span10">
                .
            </div>
        </div>

        <br/>

    </div>
</div>

