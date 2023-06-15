<?php
include "koneksi.php";
$id_mentor =$_GET["id_mentor"];


    $query = "DELETE FROM tbl_mentor WHERE id_mentor = '".$id_mentor."'";
    $sql = mysqli_query($connect,$query);
    
    if ($sql) {
        header("location: mentor.php");
    }
    else {
        echo "Data gagal dihapus. <a href='package.php'>Kembali</a>";
    }
?>