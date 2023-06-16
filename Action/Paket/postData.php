<?php
    include "../koneksi.php";

    // $idPaket= $_POST['idPaket'];
    $packagename = $_POST['namaPaket'];
    $duration = $_POST['durasi'];
    $level = $_POST['level'];
    
    
        $query = "INSERT INTO paket VALUES('', '".$packagename."' , '".$duration."' , '".$level."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("location:../../paket.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan_package.php'>Kembali ke Form</a>";
        }
   
?>