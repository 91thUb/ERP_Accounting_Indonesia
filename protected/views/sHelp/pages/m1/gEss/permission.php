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
        Permission
    </h1>
</div>

<p>
    Halaman ini menampilkan data ijin Anda. Tabel ijin, menampilkan data
<ul>
    <li>Start Date/Time, tanggal dan jam mulai ijin</li>
    <li>End Date/Time, tanggal dan jam selesai ijin</li>
    <li>Number of Days, jumlah hari ijin yang diambil</li>
    <li>Permission Type, jenis ijin</li>
    <li>Permission Reason, alasan ijin</li>
    <li>Superior State, status persetujuan ijin dari atasan</li>
    <li>HR State, status ijin persetujuan ijin dari HR admin</li>
    <p><img src="/images/man/m1_gEss_permission.jpg"></p>
