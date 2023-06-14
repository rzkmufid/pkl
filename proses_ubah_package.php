<?php 
include "koneksi.php";
    $id_package= $_GET['id_package'];
    $packagename = $_POST['packagename'];
    $duration = $_POST['duration'];
    $level = $_POST['level'];

       
     $query = "UPDATE tbl_package SET packagename='".$packagename."',duration='".$duration."',level='".$level."' WHERE id_package='".$id_package."'"; 
    $sql= mysqli_query($connect, $query);
    if ($sql) {
        header("Location: package.php");
    }else {
        echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_ubah_package.php'>Kembali ke Form</a>";
    }

?>