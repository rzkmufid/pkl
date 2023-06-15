<?php
include 'koneksi.php';
    // Memeriksa koneksi database
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }

    // Menjalankan query untuk mendapatkan data dari tabel
    $query = "SELECT * FROM mentor";
    $result = mysqli_query($connect, $query);

    // Menyimpan hasil query dalam array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }

    // Mengirim data dalam format JSON
    echo json_encode($data);

    // Menutup koneksi database
    mysqli_close($koneksi);
?>