<?php
include "koneksi.php";
$id_package =$_GET["id_package"];


    $query = "DELETE FROM tbl_package WHERE id_package = '".$id_package."'";
    $sql = mysqli_query($connect,$query);
    
    if ($sql) {
        header("location: package.php");
    }
    else {
        echo "Data gagal dihapus. <a href='package.php'>Kembali</a>";
    }
?>