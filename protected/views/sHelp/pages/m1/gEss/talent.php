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
        Employee Performance
    </h1>
</div>

<p>
    Halaman ini menampilkan data kinerja pegawai. Halaman ini terdiri dari dua bagian, yaitu
<ul>
    <li>Bagian atas berisi nilai akhir penilaian kinerja yang terdiri dari
        <ul>
            <li>Work Result</li>
            <li>Core Competency</li>
            <li>Leadership Competency</li>
        </ul>

        dan link untuk memilih tahun penilaian kinerja
    </li>
    <li>Bagian bawah berisi detil penilaian kinerja pegawai pada tahun tertentu yang ditampilkan dalam 4 tab, yaitu
        <ul>
            <li>Work Result, berisi daftar aspek non manajerial yang dinilai yaitu Produktivitas,  Ketekunan dan ketangguhan, Motivasi Kerja, Inisiatif dan Kemauan Belajar, dan Kehadiran dan Kedisiplinan <img src="/images/man/m1_gEss_talent_work_result.jpg"></li>

            <li>Core Competency, berisi daftar aspek kompetensi utama yang dinilai yaitu Integritas, Berjuang Untuk Hasil Yang Terbaik, Kompeten, Fokus Pada Pelanggan, dan Kerjasama <img src="/images/man/m1_gEss_talent_core_competency.jpg"></li>

            <li>Leadership Competency, berisi daftar aspek kompetensi kepemimpinan yang dinilai yaitu Kepemimpinan, Visi, Pengelolaan Perubahan, Pengembangan Karyawan, dan Penyelesaian Tugas <img src="/images/man/m1_gEss_talent_leadership_competency.jpg">.
        </ul>
    </li>
</ul>