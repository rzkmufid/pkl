<h1>Ubah data Paket</h1>
<?php 
        // include "koneksi.php";
        // // $id_mentor = $_GET["id_mentor"];
        // $id_mentor = 1;
        
        // $query = "SELECT * FROM mentor WHERE idMentor = '".$id_mentor."'";
        // $sql = mysqli_query($connect , $query);
        // $data = mysqli_fetch_array($sql);
    ?>

<form method="post" action="proses_ubah_mentor.php?id_mentor=<?php echo $idMentor;?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="idMentor">Id Mentor</label>
        <input type="text" class="form-control" value="<?php echo $data["idMentor"]; ?> " disabled />
        <input type="text" name="idMentor" value="<?php echo $data["idMentor"]; ?> " hidden />
    </div>
    </tr>
    <tr>
        <label>Nama Mentor</label>
        <td><input type="text" name="mentorName" value="<?php echo $data["nama"]; ?>" /></td>
    </tr>
    <tr>
        <label>Email Mentor</label>
        <td><input type="text" name="mentorEmail" value="<?php echo $data["email"]; ?>" /></td>
    </tr>
    <tr>
        <label>Alamat Mentor</label>
        <td><input type="text" name="mentorAddress" value="<?php echo $data["alamat"]; ?>" /></td>
    </tr>
    <tr>
        <td>Phone Mentor</td>
        <td><input type="text" name="mentorPhone" value="<?php echo $data["hp"]; ?>" /></td>
    </tr>
    </table>
    <hr>
    <input type="submit" value="Ubah">
    <a href="package.php"><input type="button" value="Batal"></a>
</form>