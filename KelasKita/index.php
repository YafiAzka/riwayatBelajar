<?php
session_start();
include 'config/functions.php';

$siswa = query("SELECT thumbnail, nis, nama, bio FROM siswa");
$artikel = query("SELECT *FROM artikel")


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Kelas Kita</title>
</head>

<body>

    <nav class="navbar   navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">Kelas kita</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#siswa">Daftar Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#artikel">Artikel</a>
                    </li>
                    <?php if (!isset($_SESSION['login'])) : ?>
                    <li class="nav-item">

                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/dashboard.php">Dashboard</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if (isset($_SESSION['login'])) : ?>
            <a class="nav-item btn btn-primary" href="logout.php">logout</a>
            <?php else : ?>
            <a class="nav-item btn btn-primary" href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </nav>


    <div class="bg-img">

        <div class="jumbotron " id="home">

            <div class="container">
                <div class="text-center">
                    <img src="assets/img/logo1.jpg" class="rounded-circle img-thumbnail">
                    <h1 class="display-4">Selamat Datang di Kelas XII - RPL 2</h1>
                    <!-- <h3 class="lead">Lecturer | Programmer | Youtuber</h3> -->
                </div>
            </div>

        </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2>Tentang Kelas kita</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error
                        ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio
                        ad quae possimus, debitis earum.</p>
                </div>
                <div class="col-md-5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error
                        ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio
                        ad quae possimus, debitis earum.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Siswa -->
    <section class="siswa bg-light" id="siswa">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Daftar Siswa</h2>
                </div>
            </div>

            <div class="row">

                <?php foreach ($siswa as $sis) : ?>
                <div class="col-md-6 mb-5">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <img src="admin/upload/img/<?= $sis['thumbnail']; ?>" height="220px" class="card-img"
                                    alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $sis['nama']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $sis['nis']; ?></h6>
                                    <p class="card-text"><?= $sis['bio']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


        </div>
    </section>



    <section class="kelasKita bg-light" id="artikel">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Artikel</h2>
                </div>
            </div>

            <div class="row">
                <?php foreach ($artikel as $arti) : ?>
                <div class="col-md-4 md-2 mt-4">
                    <div class="card">
                        <img src="admin/upload/img/<?= $arti['thumbnail']; ?>" height="280px" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $arti['judul']; ?></h5>
                            <p class="card-text"><?= $arti['konten']; ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated <?= $arti['tanggal']; ?></small>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

    </section>





    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>&copy; copyright 2020 | built with by. <a href="">Munawir</a>. My inspiration from Ahmad Saugi <a
                            href="https://github.com/zuramai/kelaskita">Kelaskita</a> & Sandhika Galih</p>
                </div>
            </div>
        </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="assets/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
</body>

</html>