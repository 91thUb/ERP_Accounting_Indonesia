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
        Leave Cancellation
    </h1>
</div>

<p>
    Halaman ini menampilkan form untuk membatalkan cuti pegawai. Untuk membatalkan cuti, isi informasi pembatalan cuti pada form tersebut, yang terdiri dari
<ul> 
    <li>Employee Name, nama pegawai yang mengajukan pembatalan cuti. Untuk mencari pegawai, ketik sebagian nama pegawai tersebut, maka APHRIS akan menampilkan daftar pegawai yang namanya seperti nama yang dicari, kemudian pilih salah satu pegawai <img src="/images/man/autocomplete_name.jpg"></li>
    <li>Input Date, tanggal pengisian form. Tanggal ini sudah di set oleh APHRIS, dan tidak dapat diubah</li>
    <li>Start Date of Leave, tanggal mulai pembatalan cuti. Untuk menginput, klik kotak isian, maka APHRIS akan menampiilkan datepicker untuk memilih tanggal <img src="/images/man/select_date.jpg"></li>
    <li>End Date of Leave, tanggal selesai pembatalan cuti. Cara input sama dengan input Start Date of Leave</li>
    <li>Number of Days, jumlah hari cuti yang dibatalkan</li>
    <li>Reason, alasan pembatalan cuti</li>
</ul>
<p><img src="/images/man/m1_gEss_cancellation.jpg"></p>