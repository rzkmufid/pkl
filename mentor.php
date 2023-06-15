<?php
// Menghubungkan ke database
    include 'koneksi.php';
    // Memeriksa koneksi database
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }

    // Menjalankan query untuk mendapatkan data dari tabel
    $query = "SELECT * FROM mentor";
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
    visibility: hidden;
}

.print-table,
.print-table * {
    visibility: visible;
}

.print-table {
    position: absolute;
    left: 0;
    top: 0;
}
</style>

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
                        <li class="nav-item"></li>
                    </ul>
                    <span class="navbar-text em-" style="color: white">
                        Rizki Mufid
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
                        <p>Rizki Mufid</p>
                    </div>
                    <div class="listnav">
                        <a href="./" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/grid/dashboard.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/grid/dashboard.svg" alt="" class="img-bottom">
                            </span>Dashboard</a>

                        <a href="mentor.html" class="navbutton active">
                            <span>
                                <img src="assets/svg/icon/dark/Peoples/user.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Peoples/user.svg" alt="" class="img-bottom">
                            </span>
                            Mentor</a>
                        <a href="kelas.html" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/Clothes/backpack.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Clothes/backpack.svg" alt="" class="img-bottom">
                            </span>
                            Kelas</a>
                        <a href="jadwal.html" class="navbutton unactive">
                            <span>
                                <img src="assets/svg/icon/dark/Office/list-view.svg" alt="" class="img-top">
                                <img src="assets/svg/icon/light/Office/list-view.svg" alt="" class="img-bottom">
                            </span>Schedule</a>
                        <a href="" class="navbutton unactive logout-button">
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
                    <h1 class="bold">Mentor</h1>
                    <p>Berikut data mentor yang ada di PT. Koding Pro Indonesia</p>
                </div>
                <div class="bar justify-content-between">
                    <div id="menu">
                        <input type="text" id="searchInput" placeholder="Cari..." />
                        <button id="printBtn">Cetak</button>
                    </div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#tambahMentor">Tambah Data</button>
                    <!-- <a href="form_simpan_mentor.php" class="btn btn-primary">Tambah Data</a> -->
                </div>
                <table id="myTable" class="tabel mt-5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
    </div>
    <div id="dataContainer"></div>
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
                    <?php include 'form_simpan_mentor.php'?>
                </div>

            </div>
        </div>
    </div>

    ?>
    <div class="modal fade" data-bs-theme="dark" id="editMentor" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idMentor">Id Mentor</label>
                        <input type="text" class="form-control" id="editId" value="
                        <?php while($wir = mysqli_fetch_array($result)){
                        echo $wir['idMentor'];}?>" disabled />
                        <input type="text" name="idMentor" class="idmentor" value="" hidden />
                    </div>
                    </tr>
                    <div class="mb-3">
                        <label>Nama Mentor</label>
                        <input type="text" class="form-control" name="mentorName" value="" />
                    </div>
                    <div class="mb-3">
                        <label>Email Mentor</label>
                        <input type="email" class="form-control" name="mentorEmail" value="" />
                    </div>
                    <div class="mb-3">
                        <label>Alamat Mentor</label>
                        <input type="text" class="form-control" name="mentorAddress" value="" />
                    </div>
                    <div class="mb-3">
                        <label>Phone Mentor</label>
                        <input type="text" class="form-control" name="mentorPhone" value="" />
                    </div>
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
                    "<td>" +
                    no++ +
                    "</td>" +
                    "<td>" +
                    item.nama +
                    "</td>" +
                    "<td>" +
                    item.email +
                    "</td>" +
                    "<td>" +
                    item.alamat +
                    "</td>" +
                    "<td>" +
                    item.hp +
                    "</td>" +
                    "<td>" +
                    "<div class='action-group'>" +
                    '<button class="btn btn-primary edit-button" type="button" data-bs-toggle="modal" data-bs-target="#editMentor" data-id=' +
                    item.idMentor +
                    ">Tambah Data</button>" +
                    "<a href='' class='btn btn-danger'>Hapus</a></div></td>" +
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
            var pagination = "<tr rowspan='3'> <td>";
            for (var i = 1; i <= totalPages; i++) {
                pagination +=
                    '<button class="page-btn" data-page="' +
                    i +
                    '">' +
                    i +
                    "</button>";
            }
            pagination += "</td></tr>";

            $("#myTable tfoot").append(pagination);

            // Menambahkan kelas "active" pada tombol halaman saat ini
            $(
                '#myTable tfoot .page-btn[data-page="' + currentPage + '"]'
            ).addClass("active");
        }

        function searchTableData(keyword) {
            var filteredData = data.filter(function(item) {
                var no = item.no.toString();

                const nama = item.nama.toLowerCase();
                const email = item.nama.toLowerCase();
                const address = item.nama.toLowerCase();
                const phone = item.nama.toLowerCase();
                //   const aksi = item.nama.toLowerCase();


                return (
                    nama.includes(keyword.toLowerCase()) ||
                    email.includes(keyword.toLowerCase()) ||
                    address.includes(keyword.toLowerCase()) ||
                    phone.includes(keyword.toLowerCase())

                );
            });

            // Memperbarui data tabel dengan hasil pencarian
            data = filteredData;
            currentPage = 1;
            displayTableData();
        }

        function printTable() {
            // Salin tabel ke dalam elemen baru dengan kelas "print-table"
            var tfootOrigin = document.querySelector("#myTable tfoot").innerHTML;
            $("#myTable tfoot").empty();
            var $printTable = $("#myTable").clone().addClass("print-table");

            // Buat jendela cetakan baru dan masukkan tabel ke dalamnya
            var $printWindow = window.open("", "_blank");
            $printWindow.document.open();
            $printWindow.document.write(
                "<html><head><title>Tabel Cetak</title></head><body></body></html>"
            );
            $printWindow.document.body.appendChild($printTable[0]);
            $printWindow.document.close();

            $("#myTable tfoot").append(tfootOrigin);

            // Cetak jendela cetakan baru
            $printWindow.print();
        }

        // Memanggil fungsi untuk menampilkan data awal
        displayTableData();

        // Memanggil fungsi untuk menampilkan data ketika tombol halaman di klik
        $(document).on("click", "#myTable .page-btn", function() {
            currentPage = parseInt($(this).attr("data-page"));
            displayTableData();
        });

        // Memanggil fungsi pencarian saat pengguna memasukkan teks pada input pencarian
        $(document).on("input", "#searchInput", function() {
            var keyword = $(this).val();
            searchTableData(keyword);
        });

        // Memanggil fungsi pencetakan saat tombol cetak diklik
        $(document).on("click", "#printBtn", function() {
            printTable();
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "get_data.php", // Nama file PHP yang menangani permintaan Ajax
            dataType: "json", // Tipe data yang akan diterima dari server
            success: function(data) {
                // Callback yang akan dijalankan ketika permintaan Ajax berhasil
                // Memproses data yang diterima dan menampilkannya di halaman
                var container = $("#dataContainer");

                // Iterasi melalui data dan menambahkan konten ke dalam container
                $.each(data, function(index, item) {
                    var row = "<p>" + item.field1 + " - " + item.field2 + "</p>";
                    container.append(row);
                });
            },
            error: function(xhr, status, error) {
                // Callback yang akan dijalankan ketika permintaan Ajax gagal
                console.log("Terjadi kesalahan: " + status + " - " + error);
            }
        });
    });

    // ================================ edit data

    $(document).ready(function() {
        $('.edit-button').click(function() {
            var id = $(this).data('id');

            // Menggunakan Ajax untuk mengambil data dari database berdasarkan ID
            $.ajax({
                url: 'get_data.php', // Ganti dengan URL atau file yang sesuai untuk mengambil data
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    // Mengisi form dengan data yang diterima
                    $('#editMentor input[name="name"]').val(data.name);
                    $('#editMentor input[name="email"]').val(data.email);
                    // Mengisi input fields lainnya sesuai kebutuhan

                    // Menampilkan modal
                    $('#editMentor').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan: ' + status + ' - ' + error);
                }
            });
        });

        // Handler untuk menyimpan perubahan saat tombol "Save changes" diklik
        $('#saveChanges').click(function() {
            // Mengambil nilai input dari form
            var name = $('#editForm input[name="idMentor"]').val();
            // var email = $('#editForm input[name="email"]').val();
            // Mengambil input fields lainnya sesuai kebutuhan

            // Menggunakan Ajax untuk mengirim perubahan ke server
            $.ajax({
                url: 'update_data.php', // Ganti dengan URL atau file yang sesuai untuk menyimpan perubahan
                type: 'POST',
                data: {
                    id: id,
                    name: name,
                    email: email
                }, // Ganti dengan data yang sesuai dengan kolom-kolom di tabel
                success: function(response) {
                    // Menutup modal setelah berhasil menyimpan perubahan
                    $('#editModal').modal('hide');

                    // Refresh halaman atau lakukan tindakan lain yang diperlukan
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan: ' + status + ' - ' + error);
                }
            });
        });
    });
    </script>

</body>

</html>