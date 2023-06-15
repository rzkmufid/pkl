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

// Query untuk mengambil data dari database berdasarkan ID
$sql = "SELECT * FROM paket WHERE idPaket = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Mengirim data kembali dalam format JSON
    echo json_encode($row);
} else {
    echo "Data tidak ditemukan";
}

$conn->close();
?>