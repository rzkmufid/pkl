<?php
            session_start();

            // Cek apakah pengguna sudah login, jika tidak redirect ke halaman login
            if (!isset($_SESSION['username'])) {
                header("Location: login.php?pesan=belum_login");
                exit();
            }

            // Ambil data pengguna dari session
            $username = $_SESSION['username'];
            include "Action/koneksi.php";
            
            //jumlah mentor
            $tbl_mentor = "SELECT * FROM mentor";
            $resultMentor = mysqli_query($connect, $tbl_mentor);
            $countMentor = mysqli_num_rows($resultMentor);

             //jumlah kelas
            $tbl_Kelas = "SELECT * FROM registrasi";
            $resultKelas = mysqli_query($connect, $tbl_Kelas);
            $countKelas = mysqli_num_rows($resultKelas);

            // jumlah progres
             $tbl_progres = "SELECT *, idRegistrasi, paket.namaPaket as namaPaket, registrasi.email as emailRegister, mentor.nama as namaMentor FROM registrasi
    INNER JOIN paket on registrasi.idPaket = paket.idPaket
    INNER JOIN mentor on registrasi.idMentor = mentor.idMentor
    WHERE status = 'Progres'";
            $resultProgres = mysqli_query($connect, $tbl_progres);
            $countProgres = mysqli_num_rows($resultProgres);

             // jumlah selesai
             $tbl_selesai = "SELECT *, idRegistrasi, paket.namaPaket as namaPaket, registrasi.email as emailRegister, mentor.nama as namaMentor FROM registrasi
    INNER JOIN paket on registrasi.idPaket = paket.idPaket
    INNER JOIN mentor on registrasi.idMentor = mentor.idMentor
    WHERE status = 'Selesai'";
            $resultSelesai = mysqli_query($connect, $tbl_selesai);
            $countSelesai = mysqli_num_rows($resultSelesai);

            // jumlah kelas
            // $tbl_Kelas = "SELECT * FROM kelas";
            // $resultKelas = mysqli_query($connect, $tbl_Kelas);
            // $countKelas = mysqli_num_rows($resultKelas);
        //    echo "Jumlah data dalam tabel: " . $count;
            
           
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Koding Pro</title>
    <link href="assets/bootstap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/font.css" rel="stylesheet" />
    <link href="assets/css/pie chart.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class=" container-fluid">
                <button class="btn btn-warning btn-sidebar" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <span class="navbar-text em-" style="color: white">
                        Administrator
                        <img src="assets/img/pp.jpg" alt="pp" width="42" height="42"
                            style="border-radius: 100%" /></span>
                </div>
            </div>
        </nav>

        <!-- offcanvas -->

        <div class="offcanvas-lg offcanvas-start sidebar-nav fixposisi text-white" tabindex="-1"
            id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" data-bs-scroll="true"
            style="background-color: #212130">
            <div class="offcanvas-header justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                    data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="sidebar mt-3">
                    <p style="font-size: 21px; font-weight: bold" class="mb-4">
                        Koding Pro
                    </p>

                    <div class="profile">
                        <img src="assets/img/pp.jpg" width="62" height="62" alt="Photo Profile Pengguna"
                            style="border-radius: 100%" />
                        <p>Administrator</p>
                    </div>
                    <div class="listnav">
                        <a href="" class="navbutton active">
                            <span>
                                <img src="assets/svg/icon/dark/grid/dashboard.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/grid/dashboard.svg" alt="" class="img-bottom">
                            </span>Dashboard</a>

                        <a href="mentor.php" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/Peoples/user.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Peoples/user.svg" alt="" class="img-bottom">
                            </span>
                            Mentor</a>
                        <a href="Paket.php" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/Clothes/backpack.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Clothes/backpack.svg" alt="" class="img-bottom">
                            </span>
                            Paket</a>
                        <a href="onProgress.php" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/Office/list-view.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Office/list-view.svg" alt="" class="img-bottom">
                            </span>On Progress</a>
                        <a href="selesai.php" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/Office/list-view.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Office/list-view.svg" alt="" class="img-bottom">
                            </span>Selesai</a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal"
                            class="navbutton unactive logout-button">
                            <span>
                                <img src="assets/svg/icon/dark/logout.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/logout.svg" alt="" class="img-bottom">
                            </span>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end offcanvas -->

        <!-- start main -->

        <main class="mt-6">
            <div class="container-fluid">
                <div class="welcome ">
                    <h1 class="bold">Welcome, Administrator !</h1>
                </div>
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="col">
                            <div class="col-4 col-sm-6 w-100 cardColor padding-44 border-radius">
                                <h2 class="bold" style="margin-bottom: 40px;">Rekap Data</h2>
                                <div class="rekapGroup">
                                    <div class="justify-content-between w-100">
                                        <table class="w-100  ">
                                            <tr>
                                                <td class="w-100 p-3">
                                                    <img src="assets/svg/icon/light/Peoples/user.svg" alt="">
                                                    Jumlah Mentor
                                                </td>
                                                <td><?= $countMentor?></td>
                                            </tr>
                                            <tr>
                                                <td class="p-3">
                                                    <img src="assets/svg/icon/light/Clothes/backpack.svg" alt="">
                                                    Jumlah Kelas
                                                </td>
                                                <td><?= $countKelas?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-sm-6 cardColor border-radius padding-44 mt-4 w-100">
                                <h2 class="bold">Statistik Kelas</h2>
                                <!-- startHere -->
                                <div class="statistikKelasGroup mt-5">
                                    <div class="chartjs-size-monitor"
                                        style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                        <div class="chartjs-size-monitor-expand"
                                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div
                                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                                            </div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink"
                                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                        </div>
                                    </div>
                                    <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor "
                                        style="display: block; width: 299px; height: 200px;">
                                    </canvas>
                                </div>
                            </div>
                        </div>
                        <!-- sampaiSini -->
                    </div>
                    <div class="col-sm-6 ">
                        <div class="cardColor border-radius padding-44 w-100">

                            <div class="headerKaryawan">
                                <h2 class="bold">Mentor</h2>
                                <a href="mentor.php" class="btn ">Add Mentor</a>
                            </div>
                            <div class="listKaryawan">
                                <?php
                                            
                                            $sql = mysqli_query($connect ,$tbl_mentor );
                                            
                                            while($data = mysqli_fetch_array($sql))
                                            {
                                                echo '<div class="karyawanCard border-radius">';
                                                echo "<div class='karyawandetails'>";
                                                echo "<div class='gambar'>";
                                                echo "<img src='assets/svg/icon/light/Peoples/user.svg'>";
                                                 echo "</div>";
                                                echo "<div class='detailKaryawan'>";
                                                echo "<h3>".$data['nama']."</h3>";
                                                echo "<p>".$data['email']."</p>";
                                                echo "</div>";
                                                echo "</div></div>";
                                        }
                                    ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>

    <!-- end main -->
    </div>

    <!-- modal logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true"
        data-bs-theme="dark">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Keluar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="Action/Login/prosesLogout.php" class="btn btn-danger">Yakin</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/bootstap/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Sedang Berjalan", "Sudah Selesai"],
                datasets: [{
                    data: [<?= $countProgres?>, <?= $countSelesai?>],
                    backgroundColor: ["#717171", "#3C2E67"]
                }]
            }
        });
    });
    </script>
</body>

</html>

<?php
    //   }   
?>