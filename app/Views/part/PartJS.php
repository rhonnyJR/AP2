	<!-- General JS Scripts -->
	<script src="<?= base_url(); ?>/assets/modules/jquery.min.js"></script>
	<script src="<?= base_url(); ?>/assets/modules/popper.js"></script>
	<script src="<?= base_url(); ?>/assets/modules/tooltip.js"></script>
	<script src="<?= base_url(); ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url(); ?>/assets/modules/moment.min.js"></script>
	<script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->
	<script src="<?= base_url(); ?>/assets/modules/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>/assets/modules/sweetalert/sweetalert.min.js"></script>
	<?= $this->renderSection('JSModules'); ?>

	<!-- Page Specific JS File -->
	<?= $this->renderSection('JSSpecific'); ?>

	<!-- Template JS File -->
	<script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url(); ?>/assets/js/custom.js"></script>
	<?= $this->renderSection('JSTemplate'); ?>
	<script text="text/javascript">
		function previewImg() {
			const images = document.querySelector('.foto');
			const imagesPreview = document.querySelector(".img-preview");
			const readers = new FileReader();
			readers.readAsDataURL(images.files[0]);
			readers.onload = function(e) {
				imagesPreview.src = e.target.result;
			}
		}

		$(".numonly").on('input', function(e) {
			$(this).val($(this).val().replace(/[^0-9]/g, ''));
		});

		const CURRENT_URI = $(location).attr('href').split('/');
		switch (CURRENT_URI[3]) {
			case 'user':
				switch (CURRENT_URI[4]) {
					case undefined:
						$('#dashboard-user').addClass('active');
						break;
					case 'tr-kost':
						$('#transaksi-kost-user').addClass('active');
						break;
					case 'tr-catering':
						$('#transaksi-catering-user').addClass('active');
						break;
					case 'tr-cs':
						$('#transaksi-cs-user').addClass('active');
						break;
					case 'tr-laundry':
						$('#transaksi-laundry-user').addClass('active');
						break;
					case 'profile':
						$('#ubah-user-profile').addClass('active');
						break;
				}
			case 'admin':
				switch (CURRENT_URI[4]) {
					case undefined:
						$('#dashboard-admin').addClass('active');
						break;
					case 'users':
						$('#kelola-user-admin').addClass('active');
						break;
					case 'kost':
						$('#kelola-kost-admin').addClass('active');
						break;
					case 'catering':
						$('#kelola-catering-admin').addClass('active');
						break;
					case 'laundry':
						$('#kelola-laundry-admin').addClass('active');
						break;
					case 'cs':
						$('#kelola-cleaning-admin').addClass('active');
						break;
					case 'tr-kost':
						$('#transaksi-kost-admin').addClass('active');
						break;
					case 'tr-catering':
						$('#transaksi-catering-admin').addClass('active');
						break;
					case 'tr-cs':
						$('#transaksi-cs-admin').addClass('active');
						break;
					case 'tr-laundry':
						$('#transaksi-laundry-admin').addClass('active');
						break;
				}
				break;
		}
	</script>