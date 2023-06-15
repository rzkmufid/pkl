$(document).ready(function () {
  $.ajax({
    url: "Action/Mentor/getData.php", // Nama file PHP yang menangani permintaan Ajax
    dataType: "json", // Tipe data yang akan diterima dari server
    success: function (data) {
      // Callback yang akan dijalankan ketika permintaan Ajax berhasil
      // Memproses data yang diterima dan menampilkannya di halaman
      var container = $("#dataContainer");

      // Iterasi melalui data dan menambahkan konten ke dalam container
      $.each(data, function (index, item) {
        var row = "<p>" + item.field1 + " - " + item.field2 + "</p>";
        container.append(row);
      });
    },
    error: function (xhr, status, error) {
      // Callback yang akan dijalankan ketika permintaan Ajax gagal
      console.log("Terjadi kesalahan: " + status + " - " + error);
    },
  });
});

// ================================ edit data
$(document).ready(function () {
  $(".edit-button").click(function () {
    var id = $(this).data("id");

    // Menggunakan Ajax untuk mengambil data dari database berdasarkan ID
    $.ajax({
      url: "Action/Mentor/getData.php", // Ganti dengan URL atau file yang sesuai untuk mengambil data
      type: "POST",
      data: {
        id: id,
      },
      dataType: "json",
      success: function (data) {
        // Mengisi form dengan data yang diterima
        $('#editForm input[name="id"]').val(data.idMentor);
        $('#editForm input[name="nama"]').val(data.nama);
        $('#editForm input[name="email"]').val(data.email);
        $('#editForm input[name="alamat"]').val(data.alamat);
        $('#editForm input[name="hp"]').val(data.hp);

        // Menampilkan modal
        $("#editModal").modal("show");
      },
      error: function (xhr, status, error) {
        console.log("Terjadi kesalahan: " + status + " - " + error);
      },
    });
  });

  $("#saveChanges").click(function () {
    // var id = $(this).data('id');
    var id = $('#editForm input[name="id"]').val();
    var nama = $('#editForm input[name="nama"]').val();
    var email = $('#editForm input[name="email"]').val();
    var alamat = $('#editForm input[name="alamat"]').val();
    var hp = $('#editForm input[name="hp"]').val();
    // Menggunakan Ajax untuk mengirim perubahan ke server
    $.ajax({
      url: "Action/Mentor/updateData.php", // Ganti dengan URL atau file yang sesuai untuk menyimpan perubahan
      type: "POST",
      data: {
        id: id,
        nama: nama,
        email: email,
        alamat: alamat,
        hp: hp,
      },
      success: function (response) {
        // Menutup modal setelah berhasil menyimpan perubahan
        $("#editModal").modal("hide");

        // Refresh halaman atau lakukan tindakan lain yang diperlukan
        location.reload();
      },
      error: function (xhr, status, error) {
        console.log("Terjadi kesalahan: " + status + " - " + error);
      },
    });
  });
});

// HAPUSSSSSSSSSSSSSSSSSSSS ==================

$(document).ready(function () {
  $(".delete-button").click(function () {
    var id = $(this).data("id");

    // Menampilkan modal konfirmasi hapus
    $("#deleteModal").modal("show");

    // Menangani klik tombol Hapus pada modal konfirmasi
    $("#confirmDelete").click(function () {
      // Menggunakan Ajax untuk menghapus data dari database
      $.ajax({
        url: "Action/Mentor/deleteData.php", // Ganti dengan URL atau file yang sesuai untuk menghapus data
        type: "POST",
        data: {
          id: id,
        },
        success: function (response) {
          // Menutup modal setelah berhasil menghapus data
          $("#deleteModal").modal("hide");

          // Refresh halaman atau lakukan tindakan lain yang diperlukan
          location.reload();
        },
        error: function (xhr, status, error) {
          console.log("Terjadi kesalahan: " + status + " - " + error);
        },
      });
    });
  });
});
