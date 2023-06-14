<?php
    include "koneksi.php";

    $no_reg= $_POST['no_reg'];
    $teamleader = $_POST['teamleader'];
    $id_package = $_POST['id_package'];
    $id_schedule = $_POST['id_schedule'];
    $teammember = $_POST['teammember'];
    $email = $_POST['email'];
    $whatsapp= $_POST['whatsapp'];
    
        $query = "INSERT INTO tbl_registrasi VALUES('".$no_reg."', '".$teamleader."' ,'".$id_package."', '".$id_schedule."','".$teammember."', '".$email."', '".$whatsapp."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("location: registrasi.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan_registrasi.php'>Kembali ke Form</a>";
        }
   
?>