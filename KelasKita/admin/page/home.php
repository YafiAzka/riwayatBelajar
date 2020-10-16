<?php 

    $admin = query('SELECT COUNT(*) jumlah FROM admin')[0];
    $siswa = query('SELECT COUNT(*) jumlah FROM siswa')[0];
    $artikel = query('SELECT COUNT(*) jumlah FROM artikel')[0];


?>

<marquee>Selamat Datang Admin</marquee>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-color-red">KelasKita Dashboard </h2>
            <h5>Selamat datang , Love to see you back. </h5>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-desktop"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?= $admin['jumlah']; ?> Admin</p>
                    <p class="text-muted">Admin</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?= $siswa['jumlah']; ?> <br> Siswa</p>
                    <p class="text-muted">Siswa</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-edit"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?= $artikel['jumlah']; ?> Artikel</p>
                    <p class="text-muted">Artikel</p>
                </div>
            </div>
        </div>
       
    </div>