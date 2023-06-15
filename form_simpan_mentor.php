<div class="form mb-3 mt-3">
    <h2 class="bold">Tambah Data Schedule</h2>
    <form method="post" action="proses_simpan_mentor.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="mentorName">Nama Mentor</label>
            <input type="text" class="form-control form-dark" name="mentorName">
        </div>
        <div class="mb-3">
            <label for="mentorEmail">Email Mentor</label>
            <input type="email" class="form-control" name="mentorEmail">
        </div>
        <div class="mb-3">
            <label for="mentoraddress">Address</label>
            <input type="text" class="form-control" name="mentorAddress">
        </div>
        <div class="mb-3">
            <label for="mentorPhone">No Ponsel</label>
            <input type="text" class="form-control" name="mentorPhone">
        </div>


        </table>
        <hr>
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="schedule.php"><input type="button" value="Batal" class="btn btn-danger"></a>

    </form>
</div>