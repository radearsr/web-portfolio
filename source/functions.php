<?php 

// Memanggil Koneksi Database
include "config.php";


// Fungsi Tambah Data ke Database
function add_data($data, $file){

    global $conn;

    // Dapatkan Data dari Inputan
    $download    = $data["link_download"];
    $github      = $data["link_github"];
    $skema       = $data["link_skema"];

    // Tambah Data ke Database link_download
    $query = "INSERT INTO link_download 
                    VALUES 
            (NULL,'$download', '$github', '$skema', NULL, NULL)
    ";
    mysqli_query($conn, $query);

    if ( mysqli_affected_rows($conn) < 1 ) {

        return mysqli_error($conn);
        
    }

    // Dapatkan Id yang Baru saja diinput ke Database
    $id_download = mysqli_insert_id($conn);

    

    // Dapatkan Data Dari Inputan
    $judul       = $data["judul"];
    $deskripsi   = $data["deskripsi"];
    $gambar      = upload_file($file, "gambar_project");
    $date        = date('Y-m-d');
    
    // Tambah Data ke Database data_project
    $query = "INSERT INTO data_project
                VALUES 
            (NULL, '$judul', '$deskripsi', '$gambar', '$date',  '$id_download') 
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function upload_file($files, $input_name){


    $Nmfile = $files[$input_name]['name'];
    $tmp    = $files[$input_name]['tmp_name'];
    $error  = $files[$input_name]['error'];

    $ekstensiFile = explode('.', $Nmfile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    $NewFileName = uniqid();
    $NewFileName .= '.';
    $NewFileName .= $ekstensiFile;


    if ( move_uploaded_file($tmp, "file_gambar/foto_project/".$NewFileName) ) {
        
        return $NewFileName;
        
    }


}

function fetch_data($query){

    global $conn;

    $result = mysqli_query($conn, $query);

    $data_null = 1;

    if ( mysqli_num_rows($result) > 0  ) {
        
        $rows = [];

        while ( $data = mysqli_fetch_assoc($result) ) {
            $rows [] = $data;
        }

        return $rows;

    }

    return $data_null;

}

function searching($keyword){
    $query = "SELECT data_project.*, link_download.*
            FROM data_project
            JOIN link_download
            ON data_project.id_link_download = link_download.id_download
            WHERE data_project.judul LIKE '%$keyword%' OR
            data_project.deskripsi LIKE '%$keyword%'
    ";

   return fetch_data($query);

}

?>