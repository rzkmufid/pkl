<?php
// Koneksi ke basis data
$koneksi = mysqli_connect("localhost", "root", "", "kodingpro");

// Mendapatkan data yang dikirimkan melalui permintaan AJAX
$id = $_POST['id'];
$name = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];

// Melakukan pengeditan data di dalam basis data
$query = "UPDATE mentor SET nama='$name', email='$email', alamat='$alamat', hp='$hp' WHERE idMentor='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
  // Jika pengeditan data berhasil
  echo "Data berhasil diubah";
} else {
  // Jika terjadi kesalahan dalam pengeditan data
  echo "Gagal mengubah data: " . mysqli_error($koneksi);
}

// Menutup koneksi ke basis data
mysqli_close($koneksi);
?>