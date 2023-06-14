<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Menu Registrasi</h1>
    <a href="form_simpan_registrasi.php">Tambahkan Member Baru</a><br><br> 
    <table border="1" width="100%">
        <tr>
            <th>No </th>
            <th>No Registrasi</th>
            <th>Team Leader</th>
            <th>ID Package</th>
            <th>ID Schedule</th>
            <th>Team Member</th>
            <th>Email</th>
            <th>No WhatsApp</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $no = 1;
            $query = "SELECT * FROM tbl_registrasi ";
            $sql = mysqli_query($connect ,$query );

            while($data = mysqli_fetch_array($sql)){
                echo "<tr>";

                echo "<td>".$no++.'.'."</td>";
                echo "<td>".$data['no_reg']."</td>";
                echo "<td>".$data['teamleader']."</td>";
                echo "<td>".$data['id_package']."</td>";
                echo "<td>".$data['id_schedule']."</td>";
                echo "<td>".$data['teammember']."</td>";
                echo "<td>".$data['email']."</td>";
                echo "<td>".$data['whatsapp']."</td>";
                
                echo "<td><a href='form_ubah_registrasi.php?no_reg=".$data['no_reg']."'>Ubah</a></td>";
                echo "<td><a href='proses_hapus_registrasi.php?no_reg=".$data['no_reg']."'>Hapus</a></td>";
                echo "</tr>";
            }   

        ?>
        <a href="dashboard.php">Kembali</a>
    </table>
</body>
</html>