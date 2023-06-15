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