<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Ubah data Registrasi</h1> 
    <?php 
        include "koneksi.php";
        $no_reg = $_GET["no_reg"];
        
        $query = "SELECT * FROM tbl_registrasi WHERE no_reg = '".$no_reg."'";
        $sql = mysqli_query($connect , $query);
        $data = mysqli_fetch_array($sql);
    ?>  

<form method="post" action="proses_ubah_registrasi.php?no_reg=<?php echo $no_reg;?>" enctype="multipart/form-data">
    <table cellpadding="8">
   
    <tr>
        <td>Nama Team Leader</td>
        <td><input type="text" name="teamleader" value="<?php echo $data["teamleader"]; ?>" /></td>
    </tr>
    <tr>
        <td>ID Package</td>
        <td><input type="text" name="id_package" value="<?php echo $data["id_package"]; ?>" /></td>
    </tr>
    <tr>
        <td>ID Schedule</td>
        <td><input type="text" name="id_schedule" value="<?php echo $data["id_schedule"]; ?>" /></td>
    </tr>
    <tr>
        <td>Team Member</td>
        <td><input type="text" name="teammember" value="<?php echo $data["teammember"]; ?>" /></td>
    </tr>
    <tr>
        <td>email</td>
        <td><input type="text" name="email" value="<?php echo $data["email"]; ?>" /></td>
    </tr>
    <tr>
        <td>whatsapp</td>
        <td><input type="text" name="whatsapp" value="<?php echo $data["whatsapp"]; ?>" /></td>
    </tr>
    
    
    </table>
    <hr>
    <input type="submit" value="Edit">
    <a href="registrasi.php"><input type="button" value="Batal"></a>
</form>
</body>
</html>