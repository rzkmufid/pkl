<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Silahkan Tambahkan Data</h1>
    <form method="post" action="proses_simpan_registrasi.php" enctype="multipart/form-data">
        <table cellpadding="8">
            <tr>
                <td>No Registrasi</td>
                <td><input type="text" name="no_reg"></td>
            </tr>
            <tr>
                <td>Team Leader</td>
                <td><input type="text" name="teamleader"></td>
            </tr>
           
            <tr>
                <td>ID package</td>
                <td><input type="text" name="id_package"></td>
            </tr>
            <tr>
                <td>ID schedule</td>
                <td><input type="text" name="id_schedule"></td>
            </tr>
           
            <tr>
                <td>Team Member</td>
                <td><input type="text" name="teammember"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>No Whatsapp</td>
                <td><input type="text" name="whatsapp"></td>
            </tr> 
        </table>
        <hr>
        <input type="submit" value="Simpan">
        <a href="registrasi.php"><input type="button" value="Batal"></a><br>
        
    </form>
</body>
</html>