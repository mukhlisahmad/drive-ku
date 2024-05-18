
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="card">
		<h2 class="card-header">List user </h2>

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
					<table id="example1" class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Setatus</th>
                            <th>Hapus</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;foreach ($list_users as $user): ?>
                            <tr>
                                <td class="no"><?php echo $no++ ?></td>
                                <td class="no"><?php echo $user['username']; ?></td>
                                <td class="no"><?php echo $user['email']; ?></td>
                                <td style="background:blue; color: #ffff;" class="no">
                                    <?php
if ($user['is_active'] == 0) {
    echo 'Belum Aktif';
} elseif ($user['is_active'] == 1) {
    echo 'Aktif';
}
?>
                                </td>
                                <td>
                                <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deletModal<?php echo $user['id_user']; ?>">
                            <i class="fas fa-trash"></i></a>
                                </td>
                                <td>
                                <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#accModal<?php echo $user['id_user']; ?>">Aktifkan</a>
                            <a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#unModal<?php echo $user['id_user']; ?>">Nonaktifkan</a>

                        </td>

                            </tr>
                            <div class="modal fade" id="accModal<?php echo $user['id_user']; ?>" tabindex="-1" aria-labelledby="accModalLabel<?php echo $user['id_user']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accModalLabel<?php echo $user['id_user']; ?>">Konfirmasi Aktifasi Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin Mengaktifkan pengguna ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url('User/activate/' . $user['id_user']); ?>" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
                                                            <!-- Modal untuk konfirmasi -->
    <div class="modal fade" id="unModal<?php echo $user['id_user']; ?>" tabindex="-1" aria-labelledby="unModalLabel<?php echo $user['id_user']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="unModalLabel<?php echo $user['id_user']; ?>">Konfirmasi Non Aktif Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin Menonaktifkan pengguna ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url('User/unactivate/' . $user['id_user']); ?>" class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
                                <!-- Modal untuk konfirmasi -->
    <div class="modal fade" id="deletModal<?php echo $user['id_user']; ?>" tabindex="-1" aria-labelledby="deletModalLabel<?php echo $user['id_user']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletModalLabel<?php echo $user['id_user']; ?>">Konfirmasi Hapus Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin Menghapus pengguna ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url('User/delete_user/' . $user['id_user']); ?>" class="btn btn-danger">Ya</a>
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
