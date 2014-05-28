<?php
$this->breadcrumbs = array(
    'Help' => array('/m1/help'),
);

$this->menu = array(
    array('label' => 'Home', 'icon' => 'home', 'url' => array('/help')),
);
?>

<div class="page-header">
    <h1>
        <i class="fa fa-user fa-fw"></i>
        Report
    </h1>
</div>	

<p>
    Halaman ini menampilkan daftar report training, yaitu
<ul>
    <li>Training by Employee: daftar pegawai dan training yang pernah diikuti.
        <img src="/images/man/m1_iLearning_report_by_employee.jpg">	
    </li>
    <li>Training by Month (tahun berjalan): daftar peserta semua topik training yang diadakan pada tahun berjalan dikelompokkan per bulan
        <img src="/images/man/m1_iLearning_report_by_month.jpg">
    </li>
</ul>