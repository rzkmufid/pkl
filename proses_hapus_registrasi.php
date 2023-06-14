<?php
include "koneksi.php";
$noreg=$_GET["no_reg"];


    $query2 = "DELETE FROM tbl_registrasi WHERE no_reg = '".$noreg."'";

    $sql2 = mysqli_query($connect,$query2);
    
    if ($sql2) {
        header("location: registrasi.php");
    }
    else {
        echo "Data gagal dihapus. <a href='registrasi.php'>Kembali</a>";
    }
?>