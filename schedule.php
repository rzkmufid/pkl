<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Menu Schedule</h1>
    <a href="form_simpan_schedule.php">Tambahkan jadwal</a><br><br> 
    <table border="1" width="100%">
        <tr>
        <th>No </th>
            <th>ID Schedule</th>
            <th>Hari</th>
            <th>ID Class</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no = 1;
            $query = "SELECT * FROM tbl_schedule";
            $sql = mysqli_query($connect ,$query );

            while($data = mysqli_fetch_array($sql)){
                echo "<tr>";
                
                echo "<td>".$no++.'.'."</td>";
                echo "<td>".$data['id_schedule']."</td>";
                echo "<td>".$data['schedule_name']."</td>";
                echo "<td>".$data['id_class']."</td>";
               
                echo "<td><a href='form_ubah_schedule.php?id_schedule=".$data['id_schedule']."'>Ubah</a></td>";
                echo "<td><a href='proses_hapus_schedule.php?id_schedule=".$data['id_schedule']."'>Hapus</a></td>";
                echo "</tr>";
            }   
        ?>
        <a href="dashboard.php">Kembali</a>
    </table>
</body>
</html>