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
        Create Leave 
    </h1>
</div>

<p>
    Halaman ini menampilkan form untuk mengajukan cuti pegawai. Untuk mengajukan cuti, isi informasi perpanjangan cuti pada form tersebut, yang terdiri dari
<ul> 
    <li>Employee Name, nama pegawai yang mengajukan cuti. Untuk mencari pegawai, ketik sebagian nama pegawai tersebut, maka APHRIS akan menampilkan daftar pegawai yang namanya seperti nama yang dicari, kemudian pilih salah satu pegawai <img src="/images/man/autocomplete_name.jpg"></li>
    <li>Input Date, tanggal pengisian form. Tanggal ini tidak bisa diinput, karena sudah di set oleh APHRIS</li>
    <li>Start Date of Leave, tanggal mulai cuti. Untuk menginput, klik kotak isian, maka APHRIS akan menampiilkan datepicker untuk memilih tanggal <img src="/images/man/select_date.jpg"></li>
    <li>End Date of Leave, tanggal selesai cuti. Cara input sama dengan input Start Date of Leave</li>
    <li>Number of Days, jumlah hari cuti yang diajukan</li>
    <li>Work Date, tanggal mulai kembali bekerja. Cara input sama dengan input Start Date of Leave</li>
    <li>Reason, alasan pengajuan cuti</li>
    <li>Substitute, rekan pengganti. Pegawai lain yang akan mengerjakan tugas pegawai yang cuti</li>

</ul>
<p><img src="/images/man/m1_gLeave_create.jpg"></p>