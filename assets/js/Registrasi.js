$(document).ready(function () {
  $.ajax({
    url: "Action/Registrasi/getData.php", // Nama file PHP yang menangani permintaan Ajax
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
      url: "Action/Registrasi/getData.php", // Ganti dengan URL atau file yang sesuai untuk mengambil data
      type: "POST",
      data: {
        id: id,
      },
      dataType: "json",
      success: function (data) {
        // Mengisi form dengan data yang diterima
        $('#editForm input[name="id"]').val(data.idRegistrasi);
        $('#editForm input[name="teamLeader"]').val(data.teamLeader);
        $('#editForm input[name="email"]').val(data.email);
        $('#editForm input[name="wa"]').val(data.whatsapp);
        $('#editForm option[value="' + data.hari + '"]').attr(
          "selected",
          "selected"
        );
        $('#editForm option[value="' + data.idPaket + '"]').attr(
          "selected",
          "selected"
        );
        $('#editForm option[value="' + data.idMentor + '"]').attr(
          "selected",
          "selected"
        );
        $('#editForm option[value="' + data.status + '"]').attr(
          "selected",
          "selected"
        );
        // $('#editForm input[name="status"]').val(data.status);

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
    var teamLeader = $('#editForm input[name="teamLeader"]').val();
    var email = $('#editForm input[name="email"]').val();
    var wa = $('#editForm input[name="wa"]').val();
    var hari = $('#editForm select[name="hari"]').val();
    var idPaket = $('#editForm select[name="idPaket"]').val();
    var idMentor = $('#editForm select[name="idMentor"]').val();
    var status = $('#editForm select[name="status"]').val();

    console.log(id);
    console.log(teamLeader);
    console.log(email);
    console.log(wa);
    console.log(hari);
    console.log(idPaket);
    console.log(idMentor);
    console.log(status);
    // Menggunakan Ajax untuk mengirim perubahan ke server
    $.ajax({
      url: "Action/Registrasi/updateData.php", // Ganti dengan URL atau file yang sesuai untuk menyimpan perubahan
      type: "POST",
      data: {
        id: id,
        teamLeader: teamLeader,
        email: email,
        wa: wa,
        hari: hari,
        idPaket: idPaket,
        idMentor: idMentor,
        status: status,
      },
      success: function (response) {
        // Menutup modal setelah berhasil menyimpan perubahan
        $("#editModal").modal("hide");

        // Refresh halaman atau lakukan tindakan lain yang diperlukan
        // location.reload();
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
        url: "Action/Registrasi/deleteData.php", // Ganti dengan URL atau file yang sesuai untuk menghapus data
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
