


  <div class="content-backdrop fade"></div>
</div>
</div>
<script>
    $('.custom-file-input').no('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
</script>
    <!-- END: Footer-->
    <script src="<?=base_url('assets/')?>vendor/libs/jquery/jquery.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/popper/popper.js"></script>
<script src="<?=base_url('assets/')?>vendor/js/bootstrap.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/node-waves/node-waves.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/hammer/hammer.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/i18n/i18n.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?=base_url('assets/')?>vendor/js/menu.js"></script>

<!-- endbuild -->
<script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?=base_url('assets/')?>vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="<?=base_url('assets/')?>libs/js/main-js.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- Add these lines to include SweetAlert files -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Vendors JS -->
<script src="<?=base_url('assets/')?>vendor/libs/apex-charts/apexcharts.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/swiper/swiper.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
<!-- Main JS -->
<script src="<?=base_url('assets/')?>js/main.js"></script>
<script src="<?=base_url('assets/')?>js/forms-editors.js"></script>
<script src="<?=base_url('assets/')?>js/pages-auth.js"></script>
<!-- Page JS -->
<script src="<?=base_url('assets/')?>js/dashboards-analytics.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('.menu-link').on('click', function () {
            $('.menu-item').removeClass('active');
            $(this).closest('.menu-item').addClass('active');
        });
    });
</script>

<script>
	$('#tambahBeritaModal').on('shown.bs.modal', function () {
			ClassicEditor
					.create(document.querySelector('#konten'))
					.then(editor => {
							console.log(editor);
					})
					.catch(error => {
							console.error(error);
					});
	});
</script>


</script>

</body>

</html>
