<?php 

include "source/functions.php";

$rows = fetch_data("
SELECT data_project.*, link_download.*
FROM data_project
JOIN link_download
ON data_project.id_link_download = link_download.id_download
");

// Jika Tombol Pencarian Diklik
if ( isset($_POST["search"]) ) {

    $rows = searching($_POST["keyword"]);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <title>My Portfolio | Radea Surya</title>
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-left">
                <h1>Radea Surya</h1>
            </div>
            <div class="icon-bars"><span class="fa fa-bars"></span></div>
            <div class="nav-right">
                <ul>
                    <li>
                        <a href="#home" class="list-menu"><span class="fa fa-home"></span>Home</a>
                    </li>
                    <li>
                        <a href="#project" class="list-menu"><span class="fab fa-gripfire"></span>Projects</a>
                    </li>
                    <li>
                        <a href="#feedback" class="list-menu"><span class="fas fa-comments"></span>Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <div class="profile">
                <img class="img-rounded" src="source/file_gambar/foto_profile/myfoto.jpg" alt="" width="200" />
                <h1>Radea Surya Ramandhita</h1>
                <p>Noob Programmer</p>
            </div>
            <div class="get-started">
                <a class="btn-start" href="#project">Get Started</a>
            </div>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Myproject -->
    <section id="project">
        <div class="project">
            <div class="container">
                <div class="heading">
                    <h2>My Project</h2>
                </div>
                <!-- Search Box -->
                <div class="search-area">
                    <form action="" method="post">
                        <table class="table-search">
                            <td>
                                <input class="in-search" type="search" name="keyword" id=""
                                    placeholder="Search Projects..." />
                            </td>
                            <td>
                                <button class="btn-search" type="submit" name="search"
                                    onclick="document.location.href='index.php#project'">Search</button>
                            </td>
                        </table>
                    </form>
                </div>
                <!-- Akhir Search Box -->

                <!-- Jika Variabel $rows Mereturn 1 / Tidak Ada Data Maka Jalankan Script Dibawah -->
                <?php if( $rows === 1 ) : ?>
                <h1 style="color: red;">Tidak Ada Data Dalam Database</h1>
                <?php endif;?>

                <div class="contents">
                    <!-- Jika Ada Data Jalankan Script dibawah ini  -->
                    <?php foreach( $rows as $row ) : ?>
                    <div class="content-item">
                        <!-- Awal Card -->
                        <div class="card">
                            <img src="source/file_gambar/foto_project/<?= $row['gambar']; ?>" width="100%" />
                            <h1 class="card-title"><?= $row["judul"]; ?></h1>
                            <p class="desc">
                                <?= $row['deskripsi']; ?>
                            </p>
                            <a href="<?= $row['download_link']; ?>" class="btn btn-download"><span
                                    class="fas fa-download"></span>Source Code</a>
                            <a href="<?= $row['github_link']; ?>" class="btn btn-github"><span
                                    class="fab fa-github"></span>GitHub</a>
                            <a href="<?= $row['skema_link']; ?>" class="btn btn-skema"><span
                                    class="fas fa-image"></span>Skema</a>
                        </div>
                        <!-- Akhir Card -->
                    </div>
                    <?php endforeach;?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Myproject -->

    <!-- Feedback -->
    <section id="feedback">
        <div class="feedback">
            <div class="container">
                <div class="heading">
                    <h2>Feedback</h2>
                </div>

                <!-- Alert -->
                <div class="alert alert-success d-none">
                    <strong>Berhasil! </strong>Pesan anda sudah kami terima...
                </div>

                <div class="alert alert-error d-none">
                    <strong>Gagal... </strong>Pesan Anda Tidak Terkirim!!!
                </div>

                <!-- Area Input -->
                <div class="input-area">
                    <form action="" method="post" name="form-feedback">
                        <div class="row">
                            <label class="label-input" for="in-name">Nama</label>
                            <input class="form-input" type="text" name="nama" id="in-name" autocomplete="off"
                                required />
                        </div>
                        <div class="row">
                            <label class="label-input" for="in-email">Email</label>
                            <input class="form-input" type="email" name="email" id="in-email" autocomplete="off"
                                required />
                        </div>
                        <div class="row">
                            <label class="label-input" for="in-pesan">Pesan</label>
                            <textarea class="form-input" name="pesan" id="in-pesan" rows="5" required></textarea>
                        </div>
                        <div class="row">
                            <!-- Button Kirim -->
                            <button class="btn-kirim" type="submit">
                                Kirim <span class="fas fa-paper-plane"></span>
                            </button>
                            <!-- Button Loading -->
                            <button class="btn-loading d-none" type="submit" disabled>
                                Kirim
                                <div class="lds-dual-ring"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Feedback -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="sosmed">

                <a target="_blank" href="http://instagram.com/radea_surya">
                    <span class="fab fa-instagram-square"></span>
                </a>
                <a target="_blank" href="https://web.facebook.com/profile.php?id=100067904160250">
                    <span class="fab fa-facebook-square"></span>
                </a>
                <a href="https://twitter.com/RadeaSurya" target="_blank">
                    <span class="fab fa-twitter-square"></span>
                </a>
                <a href="#">
                    <span class="fab fa-whatsapp-square"></span>
                </a>

            </div>
            <div class="copyright">
                <p>©Copyright 2021 | BY RSRPROJECT</p>
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->
</body>

<script src="assets/js/script.js"></script>

</html>