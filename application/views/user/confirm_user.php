
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="card">
		<h2 class="card-header">Confirm user </h2>
        <center><h5> User yang Mendaftar</h5> </center>

	<div class="container">
		<div class="dataTables_length" id="DataTables_Table_1_length">

            <div class="card-body">
            <div id="search-container" class="dataTables_filter">
				<label>Search:<input id="search-input" type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_1">
				</label>
			</div>
            <br>
			<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
    <?php $no = 1;foreach ($unconfirmed_users as $user): ?>
    <tr>
        <td class="no"><?php echo $no++ ?></td>
        <td class="no"><?php echo $user['username']; ?></td>
        <td class="no"><?php echo $user['email']; ?></td>
        <td>
            <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#confirmationModal<?php echo $user['id_user']; ?>">Aktifkan</a>
        </td>
    </tr>

    <!-- Modal untuk konfirmasi -->
    <div class="modal fade" id="confirmationModal<?php echo $user['id_user']; ?>" tabindex="-1" aria-labelledby="confirmationModalLabel<?php echo $user['id_user']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel<?php echo $user['id_user']; ?>">Konfirmasi Aktivasi Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mengaktifkan pengguna ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url('User/activate/' . $user['id_user']); ?>" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</tbody>

					</table>
				</div>
			</div>

            </div>
		</div>
	</div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search-input');
    const rows = document.querySelectorAll('.file-row');

    searchInput.addEventListener('input', function() {
        const searchText = this.value.trim().toLowerCase();

        rows.forEach(function(row) {
            const fileName = row.querySelector('td:first-child').textContent.trim().toLowerCase();
            const nomorSurat = row.querySelector('.no').textContent.trim().toLowerCase();
            if (fileName.includes(searchText) || nomorSurat.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

</script>
