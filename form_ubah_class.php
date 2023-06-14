<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Ubah data Kelas</h1> 
    <?php 
        include "koneksi.php";
        $id_class = $_GET["id_class"];
        
        $query = "SELECT * FROM tbl_classWHERE id_class = '".$id_class."'";
        $sql = mysqli_query($connect , $query);
        $data = mysqli_fetch_array($sql);
    ?>  

<form method="post" action="proses_ubah_package.php?id_class=<?php echo $id_class;?>" enctype="multipart/form-data">
    <table cellpadding="8">
    <tr>
        <td>Nomor Registrasi</td>
        <td><input type="text" name="packagename" value="<?php echo $data["no_reg"]; ?>" /></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td><input type="text" name="packagename" value="<?php echo $data["kelas"]; ?>" /></td>
    </tr>
    <tr>
        <td>Pertemuan</td>
        <td><input type="text" name="packagename" value="<?php echo $data["pertemuan"]; ?>" /></td>
    </tr>
    
    
    </table>
    <hr>
    <input type="submit" value="Ubah">
    <a href="class.php"><input type="button" value="Batal"></a>
</form>
</body>
</html>