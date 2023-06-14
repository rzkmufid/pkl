<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Tambah Data Package</h1>
    <form method="post" action="proses_simpan_package.php" enctype="multipart/form-data">
        <table cellpadding="8">
            <tr>
                <td>ID Package</td>
                <td><input type="text" name="id_package"></td>
            </tr>
            <tr>
                <td>Nama Package</td>
                <td><input type="text" name="packagename"></td>
            </tr>
            <tr>
                <td>Duration</td>
                <td>
                    <input type="radio" name="duration" value="8">8x
                    <input type="radio" name="duration" value="16">16x

                </td>
            </tr>
            
            <tr>
                <td>Level</td>
                <td>
                    <input type="radio" name="level" value="Begginer">Begginer
                    <input type="radio" name="level" value="Profesional">Profesional
                </td>
            </tr>
            
        </table>
        <hr>
        <input type="submit" value="Simpan">
        <a href="package.php"><input type="button" value="Batal"></a>
        
    </form>
</body>
</html>