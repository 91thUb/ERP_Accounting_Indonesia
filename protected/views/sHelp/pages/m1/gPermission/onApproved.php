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
    Halaman ini menampilkan data ijin yang disetujui. 
    Tabel ijin Approved Permission, memiliki kolom
<ul>
    <li>Foto, foto pegawai yang mengajukan ijin</li>
    <li>Name, nama pegawai yang mengajukan ijin</li>
    <li>Department, nama departemen tempat bekerja pegawai yang mengajukan ijin</li>
    <li>Start Date/Time, tanggal jam mulai ijin
    <li>End Date/Time, tanggal jam selesai ijin</li>
    <li>Number of Day, jumlah hari ijin yang diambil</li>
    <li>Status, status ijin</li>
</ul>
<p><img src="/images/man/m1_gPermission_onApproved.jpg"></p>
<p>Pada bagian atas daftar ijin, terdapat input untuk mencari nama pegawai yang mengajukan ijin. Data ijin dikelompokkan menjadi empat golongan yaitu
<ul>
    <li>Waiting for Approval, ijin yang menunggu persetujuan</li>
    <li>Approved Permission, ijin yang sudah disetujui</li>
    <li>Pending State, ijin yang dipending/tunda</li>
    <li>Employee on Permission, ijin yang sedang berjalan</li>
    <li>Recent Permission, ijin yang sudah selesai</li>
</ul>
