<?php 

include "source/functions.php";

$rows = fetch_data("
SELECT data_project.*, link_download.*
FROM data_project
JOIN link_download
ON data_project.id_link_download = link_download.id_download
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <title>My Portfolio | Radea Surya</title>
</head>

<body id="home">
    <!-- Awal Navbar -->
    <nav class="navbar">
        <div class="nav-logo">Radea Surya</div>
        <div class="icon-bars"><span class="fa fa-bars"></span></div>
        <ul>
            <li>
                <a href="#home" class="list-menu active"><span class="fa fa-home"></span>Home</a>
            </li>
            <li>
                <a href="#project" class="list-menu"><span class="fab fa-gripfire"></span>Projects</a>
            </li>
            <li>
                <a href="#feedback" class="list-menu"><span class="fas fa-comments"></span>Feedback</a>
            </li>
        </ul>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Awal Jubotron -->
    <section id="jumbotron">
        <div class="jumbotron">
            <img src="source/file_gambar/foto_profile/myfoto.jpg" alt="Photo Profile" width="200" />
            <h1 class="profile-info">Radea Surya Ramandhita</h1>
            <p>Noob Programmer</p>
        </div>
    </section>
    <!-- Akhir Jubotron -->

    <!-- Awal Project -->
    <section id="project">
        <div class="myproject">
            <h1 class="section-title">My Projects</h1>
            <div class="contents">
                <!-- Jika Variabel $rows Mereturn 1 / Tidak Ada Data Maka Jalankan Script Dibawah -->
                <?php if( $rows === 1 ) : ?>
                <h1 style="color: red;">Tidak Ada Data Dalam Database</h1>
                <?php die;?>
                <?php endif;?>

                <!-- Jika Ada Data Jalankan Script dibawah ini  -->
                <?php foreach( $rows as $row ) : ?>
                <div class="content-items">
                    <!-- Awal Card -->
                    <div class="card">
                        <img src="source/file_gambar/foto_project/<?= $row['gambar']; ?>" width="330"
                            alt="Gambar Hasil Project" />
                        <h1 class="card-title"><?= $row["judul"]; ?></h1>
                        <p class="desc">
                            <?= $row['deskripsi']; ?>
                        </p>
                        <div class="button-link-area">

                            <a href="<?= $row['download_link']; ?>" class="btn btn-download"><span
                                    class="fas fa-download"></span>Download</a>
                            <a href="<?= $row['github_link']; ?>" class="btn btn-github"><span
                                    class="fab fa-github"></span>GitHub</a>
                            <a href="<?= $row['skema_link']; ?>" class="btn btn-skema"><span
                                    class="fas fa-image"></span>Skema</a>
                        </div>
                    </div>
                    <!-- Akhir Card -->
                </div>
                <?php endforeach;?>

            </div>
        </div>
    </section>
    <!-- Akhir Project -->

    <!-- Awal Feedback -->
    <section id="feedback">
        <div class="feedback">
            <h1 class="section-title">Feedback</h1>
            <div class="input-area">
                <form action="" method="post">
                    <label class="label-input" for="in-name">Nama Lengkap</label>
                    <input class="form-input" type="text" name="nama" id="in-name" required />
                    <label class="label-input" for="in-email">Gmail / Email</label>
                    <input class="form-input" type="text" name="email" id="in-email" required />
                    <label class="label-input" for="in-pesan">Pesan</label>
                    <textarea class="form-input" name="pesan" id="in-pesan" cols="30" rows="3" required>
            </textarea>
                    <button class="btn-kirim" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Akhir Feedback -->

    <!-- Awal Footer -->
    <footer>
        <p>
            Created with <span class="emote-love">❤</span> by
            <a target="_blank" href="https://instagram.com/radea_surya">Radea Surya</a>
        </p>
    </footer>
    <!-- Akhir Footer -->
</body>
<script>
const nav = document.querySelector(".navbar ul");
const btn = document.querySelector(".icon-bars");
btn.addEventListener("click", () => {
    nav.classList.toggle("menu-show");
});
</script>

</html>