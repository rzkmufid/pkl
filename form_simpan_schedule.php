<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Tambah Data Schedule</h1>
    <form method="post" action="proses_simpan_schedule.php" enctype="multipart/form-data">
        <table cellpadding="8">
            <tr>
                <td>ID Schedule</td>
                <td><input type="text" name="id_schedule"></td>
            </tr>
            <tr>
                <td>Nama Schedule</td>
                <td><input type="text" name="schedule_name"></td>
            </tr>
            <tr>
                <td>ID Class</td>
                <td><input type="text" name="id_class"></td>
            </tr>
            
            
        </table>
        <hr>
        <input type="submit" value="Simpan">
        <a href="schedule.php"><input type="button" value="Batal"></a>
        
    </form>
</body>
</html>