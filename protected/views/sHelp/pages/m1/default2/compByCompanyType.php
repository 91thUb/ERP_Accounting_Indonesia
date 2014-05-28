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
        Comparison Based on Company Type
    </h1>
</div>

<p>
    Halaman ini menampilkan statistik komposisi jumlah pegawai dalam bentuk chart, yaitu
<ul>
    <li>Employee Composition (Holding), perbandingan jumlah gabungan pegawai dari semua perusahaan dalam Holding APL, yang bertipe Holding</li>
    <li>Employee Composition (Developer), perbandingan jumlah gabungan pegawai dari semua perusahaan dalam Holding APL, yang bertipe Developer</li>
    <li>Employee Composition (POM), perbandingan jumlah gabungan pegawai dari semua perusahaan dalam Holding APL, yang bertipe POM</li>
</ul>
<p><img src="/images/man/m1_default2_compCompanyType.jpg"></p>
<br><br>