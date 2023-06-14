<?php
    include "koneksi.php";

    $id_class= $_POST['id_class'];
    $no_reg = $_POST['no_reg'];
    $kelas = $_POST['kelas'];
    $pertemuan = $_POST['pertemuan'];
    
        $query = "INSERT INTO tbl_class VALUES('".$id_class."','".$no_reg."','".$kelas."','".$pertemuan."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("location:class.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='class.php'>Kembali ke Form</a>";
        }
   
?>