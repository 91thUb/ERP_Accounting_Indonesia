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
    Halaman ini menampilkan data cuti Anda. Pada bagian atas daftar cuti, terdapat informasi yang menyatakan tanggal bergabung dengan perusahaan dan sisa cuti. Jika sisa cuti negatif, berarti Anda telah mengambil cuti lebih banyak daripada jatah yang diberikan. 
    Tabel cuti, menampilkan data
<ul>
    <li>Start Date of Leave, tanggal mulai cuti</li>
    <li>End Date of Leave, tanggal selesai cuti</li>
    <li>Number of Days, jumlah hari cuti yang diambil</li>
    <li>Reason, alasan cuti</li>
    <li>Balance, sisa jatah cuti</li>
    <li>Superior State, status persetujuan cuti dari atasan</li>
    <li>HR State, status cuti persetujuan cuti dari HR admin</li>
</ul>
<p><img src="/images/man/m1_gEss_leave.jpg"></p>
