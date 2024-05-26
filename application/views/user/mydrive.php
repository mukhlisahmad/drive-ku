
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="card">
		<h5 class="card-header">Folders </h5>
	<div class="container">
		<div class="dataTables_length" id="DataTables_Table_1_length">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFolderModal">
  Tambah Folder
</button>
<hr>
			<br>
			<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Folder</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($foto)): ?>
								<?php foreach ($foto as $f): ?>
									<?php
$name_array = $f['nama_folder'];
$ekstensifolder = ['nama_folder'];

$ekstensi = explode('.', $name_array);
$ekstensi = strtolower(end($ekstensi));
?>
									<tr class="file-row">
                                    <td class="no">
                                            <a href="<?=base_url('User/folder/' . $f['id_folder']);?>">
                                                <img style="width:40px;" src="<?=base_url();?>assets/img/fd.png" alt="folder" class="file-image">
                                                <?=$f['nama_folder']?>
                                            </a>
                                        </td>


										<td>

	<a class=" btn btn-danger" href="<?=base_url();?>User/delete_folder/<?=$f['id_folder'];?>">Delete</a>


										</td>

									</tr>

								<?php endforeach;?>
							<?php else: ?>
								<tr>
									<td colspan="2" class="text-center">Belum Ada Folder</td>
								</tr>
							<?php endif;?>
						</tbody>
					</table>
					<br>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addFolderModal" tabindex="-1" aria-labelledby="addFolderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addFolderModalLabel">Tambah Folder Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addFolderForm" action="<?=base_url('User/add_folder');?>" method="post">
          <div class="mb-3">
            <label for="nama_folder" class="form-label">Nama Folder</label>
            <input type="text" class="form-control" id="nama_folder" name="nama_folder">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
