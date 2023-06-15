<!-- Tombol Edit -->
<button type="button" class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal"
    data-id="1">Edit</button>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="alamat">alamat:</label>
                    <input type="text" class="form-control" id="alamat">
                </div>
                <div class="form-group">
                    <label for="hp">hp:</label>
                    <input type="text" class="form-control" id="hp">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.editBtn').click(function() {
        var id = $(this).data('id');
        $('#editId').val(id);
    });

    $('#saveChangesBtn').click(function() {
        var id = $('#editId').val();
        var nama = $('#nama').val();
        var email = $('#email').val();
        var alamat = $('#alamat').val();
        var hp = $('#hp').val();

        $.ajax({
            url: 'edit_data.php',
            type: 'POST',
            data: {
                id: id,
                name: name,
                email: email
            },
            success: function(response) {
                console.log(response);
                $('#editModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>