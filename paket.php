<?php
// Menghubungkan ke database
    include 'Action/koneksi.php';
    // Memeriksa koneksi database
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }

    // Menjalankan query untuk mendapatkan data dari tabel
    $query = "SELECT * FROM paket";
    $result = mysqli_query($connect, $query);

    // Menyimpan hasil query dalam array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }


    // Mengirim data dalam format JSON
    // echo json_encode($data);

    // Menutup conn$connect database
    // mysqli_close($connect);
    
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
<style media="print">
/* Menyembunyikan elemen-elemen yang tidak ingin dicetak */
body * {
    /* visibility: hidden; */
    color: black;
}


.print-table {
    position: absolute;
    left: 0;
    top: 0;
}

.print {
    display: table-cell;
}

.print tr td {
    display: table-cell;
    /* border: 1px solid black; */
}

.no-print {
    display: none;
}
</style>

<body>
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg fixed-top no-print">
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
                        <li class="nav-item"></li>

                    </ul>
                    <span class="navbar-text em-" style="color: white">
                        Administrator
                        <img src="assets/img/pp.jpg" alt="pp" width="42" height="42"
                            style="border-radius: 100%" /></span>
                </div>
            </div>
        </nav>

        <!-- offcanvas -->

        <div class="offcanvas-lg offcanvas-start sidebar-nav fixposisi text-white no-print" tabindex="-1"
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
                        <a href="./" class="navbutton unactive">
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
                        <a href="paket.php" class="navbutton active">
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
                        <a href="" class="navbutton unactive logout-button" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">
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
                    <h1 class="bold">Paket</h1>
                    <p>Berikut Paket Pembelajaran yang ada di PT. Koding Pro Indonesia</p>
                </div>
                <div class="bar justify-content-between no-print">
                    <div id="menu" class="d-flex gap-3 no-print">
                        <input type="text" class="form-control" id="searchInput" placeholder="Cari..." />
                        <button id="printBtn" class="btn btn-success" onclick="window.print()">Cetak</button>
                    </div>
                    <button class="btn btn-primary " type="button" data-bs-toggle="modal"
                        data-bs-target="#tambahMentor">Tambah Data</button>
                    <!-- <a href="form_simpan_mentor.php" class="btn btn-primary">Tambah Data</a> -->
                </div>
                <table id="myTable" class="tabel mt-5 print">
                    <thead>
                        <tr>
                            <th scope="col" class="print">No</th>
                            <th scope="col" class="print">ID Paket</th>
                            <th scope="col" class="print">Nama Paket</th>
                            <th scope="col" class="print">Durasi</th>
                            <th scope="col" class="print">level</th>
                            <th scope="col" class="no-print">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
    </div>
    <div id=" dataContainer">
    </div>
    </main>

    <!-- end main -->
    </div>
    <!-- modal -->
    <div class="modal fade" data-bs-theme="dark" id="tambahMentor" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form mb-3 mt-3">
                        <h2 class="bold">Tambah Data Schedule</h2>
                        <form method="post" action="Action/Paket/postData.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="mentorName">Nama Paket</label>
                                <input type="text" class="form-control form-dark" name="namaPaket">
                            </div>
                            <div class="form-group mb-3">
                                <label for="durasi">Durasi</label>
                                <select class="form-select" id="durasi" name="durasi">
                                    <option value="8">8 Pertemuan</option>
                                    <option value="16">16 Pertemuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-select" id="level" name="level">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Expert">Expert</option>
                                </select>
                            </div>


                            </table>
                            <hr>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a href="schedule.php"><input type="button" value="Batal" class="btn btn-danger"></a>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Tombol Edit -->
    <!-- <button type="button" class="btn btn-primary edit-button" data-id="1">Edit</button> -->

    <!-- Modal Edit -->
    <div class="modal fade" data-bs-theme="dark" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- <span aria-hidden="true">&times;</span> -->
                    </button>
                </div>
                <div class="modal-body mb-3 mt-3">
                    <form id="editForm">
                        <div class="form-group mb-3">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="idEdit" name="id" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="namaPaket">Nama Paket</label>
                            <input type="text" class="form-control" id="namaPaketEdit" name="namaPaket">
                        </div>
                        <div class="form-group mb-3">
                            <label for="durasi">Durasi</label>
                            <select class="form-select" id="durasiEdit" name="durasi">
                                <option value="8">8 Pertemuan</option>
                                <option value="16">16 Pertemuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="level">Level</label>
                            <select class="form-select" id="levelEdit" name="level">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Expert">Expert</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" id="saveChanges">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- // modal hapus -->

    <div class="modal fade" id="deleteModal" data-bs-theme="dark" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
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
        var data = <?= json_encode($data)?>;

        var itemsPerPage = 5; // Jumlah item per halaman
        var currentPage = 1; // Halaman saat ini

        function displayTableData() {
            var startIndex = (currentPage - 1) * itemsPerPage;
            var endIndex = startIndex + itemsPerPage;
            var tableData = data.slice(startIndex, endIndex);

            // Menghapus data sebelumnya dari tabel
            $("#myTable tbody").empty();

            // Menambahkan data ke tabel
            let no = 1;
            $.each(tableData, function(index, item) {
                var row =
                    "<tr>" +
                    "<td class='print'>" +
                    no++ +
                    "</td>" +
                    "<td class='print'>" +
                    item.idPaket +
                    "</td>" +
                    "<td class='print'>" +
                    item.namaPaket +
                    "</td>" +
                    "<td class='print'>" +
                    item.durasi +
                    "</td>" +
                    "<td class='print'>" +
                    item.level +
                    "</td>" +
                    "<td class='print'>" +
                    "<div class='action-group  '>" +
                    '<button class="btn btn-warning edit-button no-print" data-id=' +
                    item.idPaket +
                    ">Edit</button>" +
                    '<button class="btn btn-danger delete-button no-print" data-id=' +
                    item.idPaket +
                    ">Delete</button></div</td>" +
                    "</tr>";
                $("#myTable tbody").append(row);
            });

            // Memperbarui navigasi halaman
            updatePagination();

            // Mengatur keadaan tombol "Previous" dan "Next" berdasarkan halaman saat ini

        }

        function updatePagination() {
            var totalPages = Math.ceil(data.length / itemsPerPage);

            // Menghapus navigasi halaman sebelumnya
            $("#myTable tfoot").empty();

            // Membuat navigasi halaman
            var pagination = "<tr rowspan='3'> <td><div class='d-flex gap-3'>";
            for (var i = 1; i <= totalPages; i++) {
                pagination +=
                    '<button class="btn btn-secondary page-btn no-print" data-page="' +
                    i +
                    '">' +
                    i +
                    "</button>";
            }
            pagination += "</div></td></tr>";

            $("#myTable tfoot").append(pagination);

            // Menambahkan kelas "active" pada tombol halaman saat ini
            $(
                '#myTable tfoot .page-btn[data-page="' + currentPage + '"]'
            ).addClass("active");
        }

        function printTable() {
            window.print();
        }




        // Memanggil fungsi untuk menampilkan data awal
        displayTableData();

        // Memanggil fungsi untuk menampilkan data ketika tombol halaman di klik
        $(document).on("click", "#myTable .page-btn", function() {
            currentPage = parseInt($(this).attr("data-page"));
            displayTableData();
        });

        // Memanggil fungsi pencarian saat pengguna memasukkan teks pada input pencarian
        // $(document).on("input", "#searchInput", function() {
        //     var keyword = $(this).val();
        //     searchTableData(keyword);
        // });

        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#myTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    })
    </script>
    <script src="assets/js/Paket.js"></script>

</body>

</html>