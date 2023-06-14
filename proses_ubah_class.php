<?php 
include "koneksi.php";
    $id_class= $_GET['id_class'];
    $no_reg = $_POST['no_reg'];
    $kelas = $_POST['kelas'];
    $pertemuan = $_POST['pertemuan'];

       
     $query = "UPDATE tbl_class SET no_reg='".$no_reg."',kelas='".$kelas."',pertemuan='".$pertemuan."' WHERE id_class='".$id_class."'"; 
    $sql= mysqli_query($connect, $query);
    if ($sql) {
        header("Location: class.php");
    }else {
        echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_ubah_class.php'>Kembali ke Form</a>";
    }

?>