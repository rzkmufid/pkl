<?php
    include "../../koneksi.php";

    $teamLeader= $_POST['teamLeader'];
    $email = $_POST['email'];
    $wa = $_POST['whatsapp'];
    $hari = $_POST['hari'];
    $idPaket = $_POST['idPaket'];
    $idMentor = $_POST['idMentor'];
    $status = $_POST['status'];
    
        $query = "INSERT INTO registrasi VALUES('', '".$teamLeader."' , '".$email ."' , '". $wa."',  '". $hari."',  '". $idPaket."',  '". $idMentor."',  '". $status."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("location:../../onProgress.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan_package.php'>Kembali ke Form</a>";
        }
   
?>