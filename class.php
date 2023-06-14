<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Menu class</h1>
   <a href="form_simpan_class.php">Tambah kelas</a><br><br> 
    <table border="1" width="100%">
        <tr>
            <th>No </th>
            <th>ID class</th>
            <th>No Registrasi</th>
            <th>Kelas</th>
            <th>Pertemuan</th>     
            <th colspan="2">Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no = 1;
            $query = "SELECT * FROM tbl_class";
            $sql = mysqli_query($connect ,$query );

            while($data = mysqli_fetch_array($sql)){
                echo "<tr>";
                
                echo "<td>".$no++.'.'."</td>";
                echo "<td>".$data['id_class']."</td>";
                echo "<td>".$data['no_reg']."</td>";
                echo "<td>".$data['kelas']."</td>";
                echo "<td>".$data['pertemuan']."</td>";
                
                echo "<td><a href='form_ubah_class.php?id_class=".$data['id_class']."'>Ubah</a></td>";
                echo "<td><a href='proses_hapus_class.php?id_class=".$data['id_class']."'>Hapus</a></td>";
                echo "</tr>";
            }   

        ?>
        <a href="dashboard.php">Kembali</a>
    </table>
</body>
</html>