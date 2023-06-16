<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kodingpro";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data yang dikirim melalui Ajax
$id= $_POST['id'];
$teamLeader= $_POST['teamLeader'];;
$email= $_POST['email'];
$whatsapp= $_POST['wa'];
$hari= $_POST['hari'];
$idPaket= $_POST['idPaket'];
$idMentor= $_POST['idMentor'];
$status= $_POST['status'];


// Query untuk memperbarui data dalam database berdasarkan ID
$sql = "UPDATE registrasi SET teamLeader = '$teamLeader', email = '$email', whatsapp = '$whatsapp', hari = '$hari' , idPaket = '$idPaket' , idMentor = '$idMentor' , status = '$status' WHERE idRegistrasi = $id";
if ($conn->query($sql) === TRUE) {
    echo "Perubahan berhasil disimpan";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();
?>