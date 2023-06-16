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
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];

// var_dump($id);
// var_dump($nama);
// var_dump($alamat);
// var_dump($hp);

// Query untuk memperbarui data dalam database berdasarkan ID
$sql = "UPDATE paket SET namaPaket = '$nama', durasi = '$durasi', level = '$level' WHERE idPaket = $id";
if ($conn->query($sql) === TRUE) {
    echo "Perubahan berhasil disimpan";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();
?>