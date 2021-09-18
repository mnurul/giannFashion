<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
	<div class="section-headline">
		<h2>Daftar / Register</h2>
		<p>Beranda<span class="separator">/</span><span class="current-section">Daftar / Register</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
	<div class="section demo ">
		<!-- FORM POPUP -->
		<div class="form-popup" style="float: none;">




			<!-- FORM POPUP CONTENT -->
			<div class="form-popup-content">
				<h4 class="popup-title">Daftar Akun Anda</h4>
				<!-- LINE SEPARATOR -->
				<hr class="line-separator">
				<!-- /LINE SEPARATOR -->
				<?php if ($this->session->flashdata('error')) : ?>

					<small class="text-danger" style="color: red"><?= $this->session->flashdata('error') ?></small>
				<?php endif ?>
				<form id="register-form" method="post" action="<?= base_url('register/create') ?>" enctype="multipart/form-data">
					<label for="email" class="rl-label required">Email </label>
					<input type="email" id="email" name="email" placeholder="Masukkan Alamat Email..." required>


					<label for="username" class="rl-label">Username</label>
					<input type="text" id="username" name="username" placeholder="Masukkan Username  ..." required>

					<label for="password" class="rl-label required">Password</label>
					<input type="password" id="password" name="password" placeholder="Masukan Password ..." required>

					<label for="nama" class="rl-label">Nama</label>
					<input type="text" id="nama" name="nama" placeholder="Masukkan Nama  ..." required>

					<label for="jkelamin" class="rl-label">Jenis Kelamin</label>
					<select id="jkelamin" name="jkelamin" required>
						<option>--Pilih Jenis Kelamin</option>
						<option value="Laki - Laki">Laki - Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<br>
					<br>
					<label for="alamat" class="rl-label">Alamat</label>
					<input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat  ..." required>

					<div class="information-layout-item mb-3">
						<p class="text-header">Provinsi :</p>
						<select id="destination_provice" name="destination_provice" class="form-control" id="exampleFormControlSelect1">
							<option>Pilih Provinsi Tujuan</option>
							<?php foreach ($province['rajaongkir']['results'] as $prov) { ?>
								<option value="<?php echo $prov['province_id'] ?>"><?php echo $prov['province'] ?></option>

							<?php } ?>
						</select>
					</div>

					<div class="information-layout-item mb-3">
						<p class="text-header">Kota :</p>
						<select id="destination_city" name="destination_city" class="form-control" id="exampleFormControlSelect1">
							<!-- <option value="<?php echo $kota ?>"><?php echo $kota ?></option> -->
						</select>
					</div>

					<label for="notelp" class="rl-label">No Telp/Hp</label>
					<input type="text" id="notelp" name="notelp" placeholder="Masukkan No Telp/Hp  ..." required>

					<label for="image" class="rl-label">Foto Profil</label>
					<input type="file" id="image" name="image" placeholder="Masukkan foto profil  ...">




					<button class="button mid secondary">Register <span class="primary">Now!</span></button>
					<a href="<?= base_url('login') ?>"><button type="button" class="button mid primary">Masuk <span class="primary">/ Login!</span></button></a>
				</form>
			</div>
			<!-- /FORM POPUP CONTENT -->
		</div>
		<!-- /FORM POPUP -->



		<div class="clearfix"></div>
	</div>
</div>
<!-- /SECTION -->

<script>
	$(document).ready(function() {
		var province_id = $('#destination_provice').val();

		$.get('<?php echo site_url('Keranjang/get_city_by_province/') ?>' + province_id, function(resp) {
			// console.log(resp);
			$('#destination_city').html(resp);
		});
	});
	// menampilkan kota tujuan pengiriman
	$(document).ready(function() {
		var destination_provice = $('#destination_provice').val();

		console.log("destination_provice" + destination_provice);
		$('#destination_provice').change(function() {

			var province_id = $('#destination_provice').val();
			$.get('<?php echo site_url('Keranjang/get_city_by_province/') ?>' + province_id, function(resp) {
				// console.log(resp);
				$('#destination_city').html(resp);
			});
		});
	});

	// $(document).ready(function() {
	// 	var opKirim = $('#opKirim').val();
	// 	var province = $('#destination_provice').val();
	// 	var city = $('#destination_city').val();
	// 	var weight = $('#weight').val();


	// 	console.log(province);
	// 	console.log(city);
	// 	console.log(weight);
	// 	console.log(opKirim);


	// 	$.get('<?php echo site_url('Keranjang/get_ongkos/') ?>' + city + '/' + weight + '/' + opKirim, function(resp) {
	// 		console.log(resp);
	// 		$('#ongkos').html(resp);
	// 	});
	// });
	$(document).ready(function() {
		$('#opKirim').change(function() {
			var opKirim = $(this).val();
			var province = $('#province').val();
			var city = $('#destination_city').val();
			var weight = $('#weight').val();

			console.log(province);
			console.log(city);
			console.log(weight);
			console.log(opKirim);

			$.get('<?php echo site_url('Keranjang/get_ongkos/') ?>' + city + '/' + weight + '/' + opKirim, function(resp) {
				console.log(resp);
				$('#ongkos').html(resp);
			});
		});
	});

	// $("#size").on('change', function() {


	// 	var size = $(this).val();

	// 	alert(size);
	// 	console.log(size);


	// });
</script>