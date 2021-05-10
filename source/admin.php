<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css_admin/style.css" />
    <title>Admin Page</title>
</head>

<body>
    <h1 class="title">Admin Page</h1>
    <div class="input-area">
        <form action="tambah.php" method="post" enctype="multipart/form-data">
            <label class="label-input" for="judul">Judul Project</label>
            <input class="form-input" type="text" name="judul" id="judul" />
            <label class="label-input" for="deskripsi">Deskripsi Project</label>
            <input class="form-input" type="text" name="deskripsi" id="deskripsi" />
            <label class="label-input" for="gambar">Gambar Project</label>
            <input class="form-input" type="file" name="gambar_project" id="gambar" />
            <label class="label-input" for="link1">Link Download</label>
            <input class="form-input" type="url" name="link_download" id="link1" />
            <label class="label-input" for="link2">Link Github</label>
            <input class="form-input" type="url" name="link_github" id="link2" />
            <label class="label-input" for="link3">Link Skema</label>
            <input class="form-input" type="url" name="link_skema" id="link3" />
            <button class="btn btn-warna" type="submit">Upload</button>
        </form>
    </div>
</body>

</html>