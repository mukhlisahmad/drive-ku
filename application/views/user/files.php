
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Folder: <?=$folder['nama_folder']?></h5>
        <div class="container">
            <div class="box-body">
            <form action="<?=base_url('User/upload_file/' . $folder['id_folder'])?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="file" class="form-label">Unggah File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah</button>
                </form>
<hr>
<div id="search-container" class="dataTables_filter">
				<label>Search:<input id="search-input" type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_1">
				</label>
			</div>
			<br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Nama File</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($files)): ?>
                                <?php foreach ($files as $file): ?>
                                    <?php
$name_array = $file['name_file'];
$ekstensilain = ['php', 'html', 'js', 'ai'];
$ekstensifoto = ['jpg', 'jpeg', 'png'];
$ekstensividio = ['mp4', 'avi'];
$ekstensizip = ['zip'];
$ekstensipdf = ['pdf'];
$ekstensidoc = ['doc', 'docx'];
$ekstensiexcel = ['xls', 'xlsx', 'csv'];

$ekstensi = explode('.', $name_array);
$ekstensi = strtolower(end($ekstensi));
?>
                                    <tr class="file-row">
                                    <td class="no">
											<?php if (in_array($ekstensi, $ekstensifoto)): ?>
												<a href="">
													<img style="width:40px;" src="<?=base_url('assets/File/' . $file['name_file'])?>" alt="img" class="file-image">
												</a>
											<?php elseif (in_array($ekstensi, $ekstensilain)): ?>
												<img style="width:40px;" src="<?=base_url('assets/File/' . $file['name_file'])?>" alt="img" class="file-image">
											<?php elseif (in_array($ekstensi, $ekstensipdf)): ?>
												<a href="" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/pdf.png" alt="folder" class="file-image">
												</a>
											<?php elseif (in_array($ekstensi, $ekstensiexcel)): ?>
												<a href="" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/exc.png" alt="folder" class="file-image">
												</a>
                                            <?php elseif (in_array($ekstensi, $ekstensividio)): ?>
												<a href="" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/vd.png" alt="folder" class="file-image">
												</a>
                                            <?php elseif (in_array($ekstensi, $ekstensizip)): ?>
												<a href="" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/zip.png" alt="folder" class="file-image">
												</a>
											<?php elseif (in_array($ekstensi, $ekstensidoc)): ?>
												<a href="" class="link-embed">
													<img style="width:40px;" src="<?=base_url();?>assets/img/doc.png" alt="folder" class="file-image">
												</a>
											<?php endif;?>
											<?=$file['name_file']?>
										</td>
                                        <td class="no"><?=$file['date_created']?></td>
                                        <td>

                                        <a class="btn btn-primary" href="<?=base_url('User/downloadFile/' . $file['id_drive'])?>">Download File</a>
                                        <a class="btn btn-danger" href="<?=base_url('User/deleteFile/' . $file['id_drive'])?>" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>


                                        </td>

                                    </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada file dalam folder ini</td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                    <hr>
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
