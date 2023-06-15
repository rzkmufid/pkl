<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>

<body>
    <h1>Menu paket</h1>
    <a href="form_simpan_mentor.php">Tambah Data Paket</a><br><br>
    <table border="1" width="100%">
        <tr>
            <th>No </th>
            <th>ID Mentor</th>
            <th>Nama Mentor</th>
            <th>Email Mentor</th>
            <th>Alamat Mentor</th>
            <th>Phone Mentor</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no =1;
            $query = "SELECT * FROM tbl_mentor";
            $sql = mysqli_query($connect ,$query );

            while($data = mysqli_fetch_array($sql)){
                echo "<tr>";
              
                echo "<td>".$no++.'.'."</td>";
                echo "<td>".$data['id_mentor']."</td>";
                echo "<td>".$data['nama']."</td>";
                echo "<td>".$data['email']."</td>";
                echo "<td>".$data['address']."</td>";
                echo "<td>".$data['phone']."</td>";
               
                echo "<td><a href='form_ubah_mentor.php?id_mentor=".$data['id_mentor']."'>Ubah</a></td>";
                echo "<td><a href='proses_hapus_mentor.php?id_mentor=".$data['id_mentor']."'>Hapus</a></td>";
                echo "</tr>";
            }     
            
        ?>
        <a href="dashboard.php">Kembali ke dashboard</a>
    </table>
</body>

</html>