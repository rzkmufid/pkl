<?php
    include "koneksi.php";

    $id_schedule= $_POST['id_schedule'];
    $schedule_name = $_POST['schedule_name'];
    $id_class = $_POST['id_class'];

        $query = "INSERT INTO tbl_schedule VALUES('".$id_schedule."', '".$schedule_name."' ,'".$id_class."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("Location:schedule.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan_registrasi.php'>Kembali ke Form</a>";
        }
   
?>