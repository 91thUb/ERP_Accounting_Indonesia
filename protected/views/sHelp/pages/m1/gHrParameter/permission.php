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
    Halaman ini terdiri dari dua bagian yaitu
<ul>
    <li>Daftar jenis ijin</li>
    <li>Form input jenis ijin</li> 
</ul>
<p><img src="/images/man/m1_gHrParameter_permission.jpg"></p>
<br><br>
</p> 

<p>Untuk menginput jenis ijin, lakukan langkah berikut</p>
<ul>
    <li>Isi form input, yang terdiri dari:
        <ul>
            <li>Sort, kode jenis ijin untuk memudahkan sorting/pengurutan</li>
            <li>Name, nama jenis ijin</li> 
            <li>Amount, jumlah hari/bulan ijin</li>           
        </ul>
    </li>
    <li>klik tombol Create, maka data jenis ijin akan tampil di daftar jenis ijin</li>
</ul> 

<p>Untuk mengubah jenis ijin, lakukan hal berikut</p>
<ul>
    <li>klik pada data yang ingin diubah, maka akan muncul tampilan seperti berikut<img src="/images/man/update_cell.jpg"></li>
    <li>lakukan perubahan data</li>
    <li>untuk mengubah klik tanda centang, untuk membatalkan perubahan klik tanda silang</li>

    <p>Untuk menghapus jenis ijin, lakukan langkah berikut</p>
    <ul>
        <li>klik icon <img src="/images/man/bin.jpg"> pada baris yang ingin dihapus. APHRIS akan meminta konfirmasi penghapusan data <img src="/images/man/konfirmasi_delete.jpg"></li>
        <li>klik button OK untuk menghapus data jenis ijin, atau button Cancel jika batal menghapus data jenis ijin</li>
    </ul>