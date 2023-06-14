<?php 
include "koneksi.php";

$no_reg = $_GET['no_reg'];
$teamleader = $_POST['teamleader'];
$id_package = $_POST['id_package'];
$id_schedule = $_POST['id_schedule'];
$teammember = $_POST['teammember'];
$email = $_POST['email'];
$whatsapp= $_POST['whatsapp'];


    $query = "UPDATE tbl_registrasi SET teamleader='".$teamleader."',id_package='".$id_package."',id_schedule='".$id_schedule."',teammember='".$teammember."',email='".$email."',whatsapp='".$whatsapp."' WHERE no_reg='".$no_reg."'"; 
    // $query = "UPDATE tbl_registrasi SET teamleader='$teamleader', id_package='$id_package', id_schedule='$id_schedule', teammember='$teammember', email='$email',whatsapp='$whatsapp' WHERE no_reg='$no_reg'"; 
    $sql= mysqli_query($connect, $query);
    if ($sql) {
        header("Location: registrasi.php");
    }else {
        echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='registrasi.php'>Kembali ke Form</a>";
    }

?>