<?php
    include "koneksi.php";

    $namaMentor= $_POST['mentorName'];
    $emailMentor = $_POST['mentorEmail'];
    $addressMentor = $_POST['mentorAddress'];
    $phoneMentor = $_POST['mentorPhone'];
    
        $query = "INSERT INTO mentor VALUES('', '".$namaMentor."' , '".$emailMentor ."' , '". $addressMentor."',  '". $phoneMentor."')"; 
        $sql = mysqli_query($connect, $query);
        if ($sql) {
            header("location:mentor.php");
        }else {
            echo "maaf. Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='form_simpan_package.php'>Kembali ke Form</a>";
        }
   
?>