<?php
include "koneksi.php";
$id_schedule=$_GET["id_schedule"];


    $query2 = "DELETE FROM tbl_schedule WHERE id_schedule = '".$id_schedule."'";

    $sql2 = mysqli_query($connect,$query2);
    
    if ($sql2) {
        header("location: schedule.php");
    }
    else {
        echo "Data gagal dihapus. <a href='registrasi.php'>Kembali</a>";
    }
?>