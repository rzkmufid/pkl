<?php 
include "koneksi.php";

$id_schedule = $_GET['id_schedule'];
$schedule_name = $_POST['schedule_name'];
$id_class = $_POST['id_class'];

    // $query = "UPDATE tbl_registrasi SET teamleader='".$teamleader."',id_package='".$id_package."',id_schedule='".$id_schedule."',teammember='".$teammember."',email='".$email."',whatsapp='".$whatsapp."' WHERE no_reg='".$no_reg."'"; 
    $query = "UPDATE tbl_schedule SET schedule_name='$schedule_name', id_class='$id_class' WHERE id_schedule='$id_schedule'"; 
    $sql= mysqli_query($connect, $query);
    if ($sql) {
        header("Location: schedule.php");
    }else {
        echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='schedule.php'>Kembali ke Form</a>";
    }

?>