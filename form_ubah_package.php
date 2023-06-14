<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Ubah data Paket</h1> 
    <?php 
        include "koneksi.php";
        $id_package = $_GET["id_package"];
        
        $query = "SELECT * FROM tbl_package WHERE id_package = '".$id_package."'";
        $sql = mysqli_query($connect , $query);
        $data = mysqli_fetch_array($sql);
    ?>  

<form method="post" action="proses_ubah_package.php?id_package=<?php echo $id_package;?>" enctype="multipart/form-data">
    <table cellpadding="8">
    <tr>
        <td>Nama Paket</td>
        <td><input type="text" name="packagename" value="<?php echo $data["packagename"]; ?>" /></td>
    </tr>
    <tr>
        <td>Duration</td>
        <td>
            <?php
            if ($data['duration'] == 8) {
                echo "<input type = 'radio' name='duration' value='8x' checked = 'checked'> 8x";
                echo "<input type = 'radio' name='duration' value='16x'> 16x";
            
            }
            else if($data['duration'] == 16) {
                echo "<input type = 'radio' name='duration' value='8x'> 8x";
                echo "<input type = 'radio' name='duration' value='16x'checked = 'checked'> 16x";
                
            }
           
             ?>
        </td>
    </tr>
    <tr>
        <td>Level</td>
        <td>
            <?php
            if ($data['level'] == "Begginer") {
                echo "<input type = 'radio' name='level' value='Begginer' checked = 'checked'> Begginer";
                echo "<input type = 'radio' name='level' value='Profesional'> Profesional";
            
            }
            else if($data['level'] == "Profesional") {
                echo "<input type = 'radio' name='level' value='Begginer'> Begginer";
                echo "<input type = 'radio' name='level' value='Profesional'checked = 'checked'> Profesional";
                
            }
           
             ?>
        </td>
    </tr>
    
    </table>
    <hr>
    <input type="submit" value="Ubah">
    <a href="package.php"><input type="button" value="Batal"></a>
</form>
</body>
</html>