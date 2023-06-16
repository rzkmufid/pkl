<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Koding Pro</title>
    <link href="assets/bootstap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/font.css" rel="stylesheet" />
    <link href="assets/css/pie chart.css" rel="stylesheet" />
</head>

<body>
    <div class="nigger login border-radius-lg">
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                  echo '<p class="alert alert-danger text-center">Login gagal! username dan password salah!</p>';
                }else if($_GET['pesan'] == "logout"){
                    echo '<p class="alert alert-success text-center">Anda Telah Berhasil Logout</p>';
                }else if($_GET['pesan'] == "belum_login"){
                    echo '<p class="alert alert-danger text-center">Anda Harus Login Terlebih Dahulu</p>';
                }
            }
	?>
        <h2 style="text-align: center; font-weight: 700;" class="mb-4">Login</h2>
        <form class="nigger" data-bs-theme="dark" method="POST" action="Action/Login/prosesLogin.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn tombolciy">Login</button>
        </form>
    </div>
</body>

</html>