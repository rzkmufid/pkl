<?php
    include "koneksi.php";

    $id_package= $_POST['id_package'];
    $packagename = $_POST['packagename'];
    $duration = $_POST['duration'];
    $level = $_POST['level'];
    
        $query = "INSERT INTO tbl_package VALUES('".$id_package."', '".$packagename."' , '".$duration."' , '".$level."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("location:package.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan_package.php'>Kembali ke Form</a>";
        }
   
?>