<?php
include "koneksi.php";
$id_class =$_GET["id_class"];


    $query = "DELETE FROM tbl_class WHERE id_class = '".$id_class."'";
    $sql = mysqli_query($connect,$query);
    
    if ($sql) {
        header("location: class.php");
    }
    else {
        echo "Data gagal dihapus. <a href='class.php'>Kembali</a>";
    }
?>