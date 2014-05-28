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
        Leave
    </h1>
</div>

<p>
    Halaman ini menampilkan data gaji semua pegawai pada bulan berejalan

    Tabel-tabel tersebut, memiliki kolom
<ul>
    <li>Name, nama pegawai, berupa link jika di klik menampilkan data gaji detil pegawai tersebut</li>
    <li>Department, nama departemen tempat bekerja pegawai</li>
    <li>Status, status kepegawaian</li>
    <li>Basic Salary, gaji pokok</li>
    <li>Benefit, tambahan gaji</li>
    <li>Deduction pengurang gaji</li>
    <li>Remark, catatan</li>
</ul>

Pada bagian atas terdapat dua link yaitu
<ul>
    <li>Dashboard, untuk melihat halaman dashboard payroll</li>
    <li>All Employee, untuk melihat payroll semua pegawai pada bulan berjalan</li>
</ul>
<p><img src="/images/man/m1_gPayroll_currentMonth.jpg"></p>