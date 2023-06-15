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

// Mendapatkan ID dari permintaan Ajax
$id = $_POST['id'];

// Query untuk menghapus data dari database berdasarkan ID
$sql = "DELETE FROM paket WHERE idPaket = $id";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();
?>