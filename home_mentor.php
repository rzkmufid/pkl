<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_home_mentor.css">
    <title>Koding Pro</title>
</head>
<body>
    <div class="container">
<h2>Halaman Login Admin</h2>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="-group">
                <input type="submit" value="Login">
            </div>
            
            <?php
            if (isset($error_message)) {
                echo '<div class="error">' . $error_message . '</div>';
            }
            ?>
            <?php
            // Proses login
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Simulasikan pengecekan username dan password
                $username = "vin";
                $password = "123";
                
                $input_username = $_POST["username"];
                $input_password = $_POST["password"];
                
                if ($input_username == $username && $input_password == $password) {
                    // Redirect ke halaman utama jika berhasil login
                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error_message = "Username atau password salah.";
                }
            }
            ?>
        </form>
 
        </div>
</body>
</html>