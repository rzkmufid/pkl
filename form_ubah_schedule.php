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
        $id_schedule = $_GET["id_schedule"];
        
        $query = "SELECT * FROM tbl_schedule WHERE id_schedule= '".$id_schedule."'";
        $sql = mysqli_query($connect , $query);
        $data = mysqli_fetch_array($sql);
    ?>  

<form method="post" action="proses_ubah_schedule.php?id_schedule=<?php echo $id_schedule;?>" enctype="multipart/form-data">
    <table cellpadding="8">
    <tr>
        <!-- <td>Nama Team Leader</td> -->
        <td><input type="text" name="id_schedule" value="<?php echo $data["id_schedule"]; ?>" hidden /></td>
    </tr>
    
    <tr>
        <td>Hari</td>
        <td><input type="text" name="schedule_name" value="<?php echo $data["schedule_name"]; ?>" /></td>
    </tr>
    <tr>
        <td>ID Class</td>
        <td><input type="text" name="id_class" value="<?php echo $data["id_class"]; ?>" /></td>
    </tr>    
    </table>
    <hr>
    <input type="submit" value="Edit">
    <a href="schedule.php"><input type="button" value="Batal"></a>
</form>
</body>
</html>