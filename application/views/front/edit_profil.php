<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
	<div class="section-headline">
		<h2>Edit Profi</h2>
		<p>Beranda<span class="separator">/</span><span class="current-section">Edit Profi</span></p>
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
				<h4 class="popup-title">Edit Akun Anda</h4>
				<!-- LINE SEPARATOR -->
				<hr class="line-separator">
				<!-- /LINE SEPARATOR -->
				<?php if ($this->session->flashdata('error')) : ?>

					<small class="text-danger" style="color: red"><?= $this->session->flashdata('error') ?></small>
				<?php endif ?>

				<?php if ($this->session->flashdata('berhasil')) : ?>

					<small class="text-danger" style="color: green"><?= $this->session->flashdata('berhasil') ?></small>
				<?php endif ?>
				<form id="register-form" method="post" action="<?= base_url('pelanggan/update') ?>" enctype="multipart/form-data">
					<label for="email" class="rl-label required">Email </label>
					<input type="email" id="email" value="<?= $data_edit->plg_email; ?>" name="email" placeholder="Masukkan Alamat Email..." required>
					<input type="hidden" id="email" value="<?= $data_edit->plg_email; ?>" name="old_email" placeholder="Masukkan Alamat Email..." required>


					<label for="username" class="rl-label">Username</label>
					<input type="text" id="username" value="<?= $data_edit->plg_username; ?>" name="username" placeholder="Masukkan Username  ..." required>
					<input type="hidden" id="username" value="<?= $data_edit->plg_username; ?>" name="old_username" placeholder="Masukkan Username  ..." required>

					<label for="password" class="rl-label required">Password</label>
					<small>*Jangan diisi jika tidak dirubah</small>
					<input type="password" id="password" name="password" placeholder="Enter your password here...">

					<label for="nama" class="rl-label">Nama</label>
					<input type="text" id="nama" value="<?= $data_edit->plg_nama; ?>" name="nama" placeholder="Masukkan Nama  ..." required>

					<label for="jkelamin" class="rl-label">Jenis Kelamin</label>
					<select id="jkelamin" name="jkelamin" required>
						<option>--Pilih Jenis Kelamin</option>
						<option <?= $data_edit->plg_kelamin == "Laki - Laki" ? 'selected' : null; ?> value="Laki - Laki">Laki - Laki</option>
						<option <?= $data_edit->plg_kelamin == 'Perempuan' ? "selected" : null; ?> value="Perempuan">Perempuan</option>
					</select>
					<br>
					<br>
					<label for="alamat" class="rl-label">Alamat</label>
					<input type="text" id="alamat" value="<?= $data_edit->plg_alamat; ?>" name="alamat" placeholder="Masukkan alamat  ..." required>

					<div class="information-layout-item mb-3">
						<p class="text-header">Provinsi :</p>
						<select id="destination_provice" name="destination_provice" class="form-control" id="exampleFormControlSelect1">
							<option>Pilih Provinsi Tujuan</option>
							<!-- <option value="<?= $id_lokasi; ?>"><?= $nama_lokasi; ?></option> -->
							<?php foreach ($province['rajaongkir']['results'] as $prov) { ?>
								<option value="<?php echo $prov['province_id'] ?>" <?= $data_edit->plg_lokasi == $prov['province'] ? "selected" : null; ?>><?php echo $prov['province'] ?></option>

							<?php } ?>
						</select>
					</div>

					<div class="information-layout-item mb-3">
						<p class="text-header">Kota :</p>
						<select id="destination_city" name="destination_city" class="form-control" id="exampleFormControlSelect1">
						</select>
					</div>


					<label for="notelp" class="rl-label">No Telp/Hp</label>
					<input type="text" id="notelp" value="<?= $data_edit->plg_telepon; ?>" name="notelp" placeholder="Masukkan No Telp/Hp  ..." required>

					<label for="image" class="rl-label">Foto Profil</label>
					<input type="file" id="image" name="image" placeholder="Masukkan Foto Profil  ...">




					<button class="button mid secondary">Simpan <span class="primary">Perubahan</span></button>
					<!-- <a href="<?= base_url('login') ?>"><button type="button" class="button mid primary">Masuk <span class="primary">/ Login!</span></button></a> -->
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