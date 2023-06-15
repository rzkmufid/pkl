<?php 
include "koneksi.php";
    $idMentor = $_GET['id_mentor'];
    $namaMentor= $_POST['mentorName'];
    $emailMentor = $_POST['mentorEmail'];
    $addressMentor = $_POST['mentorAddress'];
    $phoneMentor = $_POST['mentorPhone'];

       
     $query = "UPDATE tbl_mentor SET nama='".$namaMentor."',email='".$emailMentor."',address='".$addressMentor."' ,phone='".$phoneMentor."' WHERE id_mentor='".$idMentor."'"; 
    $sql= mysqli_query($connect, $query);
    if ($sql) {
        header("Location: mentor.php");
    }else {
        echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_ubah_package.php'>Kembali ke Form</a>";
    }

?>