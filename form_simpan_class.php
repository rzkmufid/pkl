<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koding Pro</title>
</head>
<body>
    <h1>Tambah Data Paket Kelas</h1>
    <form method="post" action="proses_simpan_class.php" enctype="multipart/form-data">
        <table cellpadding="8">
            <tr>
                <td>ID class</td>
                <td><input type="text" name="id_class"></td>
            </tr>
            <tr>
                <td>No Registrasi</td>
                <td><input type="text" name="no_reg"></td>
            </tr>
           <tr>
                <td>Kelas</td>
                <td>
                    <input type="radio" name="kelas" value="PHP">PHP
                    <input type="radio" name="kelas" value="JAVA">JAVA

                </td>
            </tr>
            <tr>
                <td>Pertemuan</td>
                <td>
                    <input type="radio" name="pertemuan" value="8x">8x
                    <input type="radio" name="pertemuan" value="16x">16x

                </td>
            </tr>
            
            </tr>
        </table>
        <hr>
        <input type="submit" value="Simpan">
        <a href="class.php"><input type="button" value="Batal"></a>
        
    </form>
</body>
</html>
