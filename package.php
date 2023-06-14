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
    <a href="form_simpan_package.php">Tambah Data Paket</a><br><br>
    <table border="1" width="100%">
        <tr>
            <th>No </th>
            <th>ID Package</th>
            <th>Package Name</th>
            <th>Duratioan</th>
            <th>Level</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no =1;
            $query = "SELECT * FROM tbl_package";
            $sql = mysqli_query($connect ,$query );

            while($data = mysqli_fetch_array($sql)){
                echo "<tr>";
              
                echo "<td>".$no++.'.'."</td>";
                echo "<td>".$data['id_package']."</td>";
                echo "<td>".$data['packagename']."</td>";
                echo "<td>".$data['duration']."</td>";
                echo "<td>".$data['level']."</td>";
               
                echo "<td><a href='form_ubah_package.php?id_package=".$data['id_package']."'>Ubah</a></td>";
                echo "<td><a href='proses_hapus_package.php?id_package=".$data['id_package']."'>Hapus</a></td>";
                echo "</tr>";
            }     
            
        ?>
        <a href="dashboard.php">Kembali ke dashboard</a>
    </table>
</body>
</html>