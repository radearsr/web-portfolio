<?php 

// Memanggil Fungsi 
include "functions.php";

$tambah = add_data($_POST, $_FILES);

if ( $tambah > 0 ) {

   echo "<script>alert('Berhasil Mengupload!!');document.location.href='admin.php'</script>";

}

echo "<script>alert('Gagal Mengupload??');document.location.href='admin.php'</script>";

?>