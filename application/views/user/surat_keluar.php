
<div class="container">
			<div class="row">
				<div class="col-md">
					<div class="upload">
					<h1>Surat Keluar </h1>
						<?=form_open_multipart('User/upload_suratkeluar');?>
						<h5>Upload File Kamu di Sini:</h5>
						<div class=" mb-3">
							<input type="file" class="form-control" id="image" name="image" required>
                            <label class="form-label" for="jenis">Jenis Surat</label>
                            <input type="text" class="form-control" id="jenis" placeholder="Jenis Surat" name="jenis" required>
                            <label class="form-label" for="nomor">Nomor Surat</label>
                            <input type="text" class="form-control" placeholder="Nomor Surat"id="nomor" name="nomor" required>
						</div>
                        <button class="btn btn-dark" type="submit">Upload</button>
						<?=$error;?>
						</form>
					</div>
				</div>
			</div>
		</div>
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="card">
		<h5 class="card-header">File </h5>
	<div class="container">
		<div class="dataTables_length" id="DataTables_Table_1_length">
			<div id="search-container" class="dataTables_filter">
				<label>Search:<input id="search-input" type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_1">
				</label>
			</div>
			<br>
			<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>File</th>
                                <th>Nomor surat</th>
                                <th>Jenis Surat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($foto)): ?>
								<?php foreach ($foto as $f): ?>
									<?php
$name_array = $f['file'];
$ekstensilain = ['php', 'html', 'js', 'ai', 'xlsx'];
$ekstensifoto = ['jpg', 'jpeg', 'png'];
$ekstensipdf = ['pdf'];
$ekstensidoc = ['doc', 'docx'];
$ekstensiexcel = ['xls', 'xlsx', 'csv'];
$jenis = $f['jenis'];
$nomor = $f['nomor'];
$ekstensi = explode('.', $name_array);
$ekstensi = strtolower(end($ekstensi));
?>
									<tr class="file-row">
										<td>
											<?php if (in_array($ekstensi, $ekstensifoto)): ?>
												<a href="<?=base_url();?>User/download/<?=$f['id_surat'];?>">
													<img style="width:40px;" src="<?=base_url('assets/File/' . $f['file'])?>" alt="img" class="file-image">
												</a>
											<?php elseif (in_array($ekstensi, $ekstensilain)): ?>
												<img style="width:40px;" src="<?=base_url('assets/File/' . $f['file'])?>" alt="img" class="file-image">
											<?php elseif (in_array($ekstensi, $ekstensipdf)): ?>
												<a href="<?=base_url();?>User/download/<?=$f['id_surat'];?>" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/pdf.png" alt="folder" class="file-image">
												</a>
											<?php elseif (in_array($ekstensi, $ekstensiexcel)): ?>
												<a href="<?=base_url();?>User/download/<?=$f['id_surat'];?>" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/exc.png" alt="folder" class="file-image">
												</a>
											<?php elseif (in_array($ekstensi, $ekstensidoc)): ?>
												<a href="<?=base_url();?>User/download/<?=$f['id_surat'];?>" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/doc.png" alt="folder" class="file-image">
												</a>
											<?php endif;?>
											<?=$f['file']?>
										</td>
                                        <td class="no">
                                        <?=$f['nomor'];?>
                                        </td>
                                        <td>
                                        <?=$f['jenis'];?>
                                        </td>
										<td>
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
													Opsi
												</button>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<li><a class="dropdown-item" href="<?=base_url();?>User/download_suratkeluar/<?=$f['id_surat'];?>">Download</a></li>
													<li><a class="dropdown-item" href="<?=base_url();?>User/delete_suratkeluar/<?=$f['id_surat'];?>">Delet</a></li>
												</ul>
											</div>
										</td>

									</tr>

								<?php endforeach;?>
							<?php else: ?>
								<tr>
									<td colspan="2" class="text-center">Maaf Belum Ada Data</td>
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
