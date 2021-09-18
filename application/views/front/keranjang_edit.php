<style type="text/css">
	.button.big span.currency:before {
		content: 'Rp.';
		font-size: 18px;
		position: relative;
		top: -4px;
		left: -1px;
	}
</style>
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
	<div class="section-headline">
		<h2><?= $produk->produk_nama ?></h2>
		<p>Beranda<span class="separator">/</span>Produk<span class="separator">/</span><span class="current-section"><?= $produk->produk_nama ?></span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
<!-- SECTION -->
<div class="section-wrap">
	<div class="section">
		<!-- SIDEBAR -->
		<div class="sidebar right">
			<!-- SIDEBAR ITEM -->
			<div class="sidebar-item void buttons">



				<?php if ($this->session->userdata('login_pelanggan') != 'login') : ?>
					<a href="#" onclick="alert('Silahkan Login Untuk Memesan !')" class="button big dark purchase">
						<span class="currency"><?= number_format($produk->produk_harga, 0, '', '.') ?></span>
						<span class="primary">Pesan !</span>
					</a>
					<a href="<?= base_url('login') ?>" class="button big primary ">
						<!-- <span class="icon-present"></span> -->
						Masuk / Login
					</a>
					<a href="<?= base_url('register') ?>" class="button big secondary ">
						<!-- <span class="icon-heart"></span> -->
						Daftar / Register
					</a>

				<?php else : ?>
					<a href="#" class="button big dark purchase" id="tmbl-pesan">
						<span class="currency"><?= number_format($produk->produk_harga, 0, '', '.') ?></span>
						<span class="primary">Pesan !</span>
					</a>
				<?php endif ?>
			</div>
			<!-- /SIDEBAR ITEM -->

			<!-- SIDEBAR ITEM -->
			<div class="sidebar-item product-info" id="form-pesanan">
				<h4>Detail Pesanan :</h4>
				<hr class="line-separator">
				<!-- INFORMATION LAYOUT -->
				<div class="information-layout v2">
					<!-- INFORMATION LAYOUT ITEM -->
					<form method="post" action="<?= base_url('keranjang/update/') . $data_keranjang->id ?>" enctype="multipart/form-data">

						<div class="information-layout-item">
							<p class="text-header">Harga : </p>
							<input min="0" type="number" name="harga" id="harga" value="<?= $produk->produk_harga ?>" required readonly>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Size :</p>

							<select class="form-control" id="size" name="size">
								<option>Pilih size kamu</option>
								<?php if ($produk->kategori_id == 1 || $produk->kategori_id == 5 || $produk->kategori_id == 6) { ?>
									<option value="s" <?= $data_keranjang->size_product == "s" ? "selected" : null; ?>>S</option>
									<option value="m" <?= $data_keranjang->size_product == "m" ? "selected" : null; ?>>M</option>
									<option value="l" <?= $data_keranjang->size_product == "l" ? "selected" : null; ?>>L</option>
									<option value="xl" <?= $data_keranjang->size_product == "xl" ? "selected" : null; ?>>XL</option>
								<?php  } elseif ($produk->kategori_id == 2) { ?>
									<option value="39" <?= $data_keranjang->size_product == "39" ? "selected" : null; ?>>39</option>
									<option value="40" <?= $data_keranjang->size_product == "40" ? "selected" : null; ?>>40</option>
									<option value="42" <?= $data_keranjang->size_product == "42" ? "selected" : null; ?>>42</option>
									<option value="43" <?= $data_keranjang->size_product == "43" ? "selected" : null; ?>>43</option>
									<option value="44" <?= $data_keranjang->size_product == "44" ? "selected" : null; ?>>44</option>
								<?php  } elseif ($produk->kategori_id == 3) { ?>
									<option value="29" <?= $data_keranjang->size_product == "29" ? "selected" : null; ?>>29</option>
									<option value="30" <?= $data_keranjang->size_product == "30" ? "selected" : null; ?>>30</option>
									<option value="31" <?= $data_keranjang->size_product == "31" ? "selected" : null; ?>>31</option>
									<option value="32" <?= $data_keranjang->size_product == "32" ? "selected" : null; ?>>32</option>
									<option value="33" <?= $data_keranjang->size_product == "33" ? "selected" : null; ?>>33</option>
									<option value="34" <?= $data_keranjang->size_product == "34" ? "selected" : null; ?>>34</option>
									<option value="35" <?= $data_keranjang->size_product == "35" ? "selected" : null; ?>>35</option>
									<option value="36" <?= $data_keranjang->size_product == "36" ? "selected" : null; ?>>36</option>
									<option value="38" <?= $data_keranjang->size_product == "38" ? "selected" : null; ?>>38</option>
								<?php  } ?>
							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Lokasi :</p>
							<select id="destination_provice" name="destination_provice" class="form-control" id="exampleFormControlSelect1">
								<option>Pilih Provinsi Tujuan</option>
								<!-- <option value="<?= $id_lokasi; ?>"><?= $nama_lokasi; ?></option> -->
								<?php foreach ($province['rajaongkir']['results'] as $prov) { ?>
									<option value="<?php echo $prov['province_id'] ?>" <?= $data_keranjang->lokasi == $prov['province'] ? "selected" : null; ?>><?php echo $prov['province'] ?></option>

								<?php } ?>
							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Kota :</p>
							<select id="destination_city" name="destination_city" class="form-control" id="exampleFormControlSelect1">
							</select>
						</div>
						<h2 hidden id="kota" style="color: black;"><?= $kota; ?></h2>

						<div class="information-layout-item">
							<p class="text-header">Nama Penerima : </p>
							<input type="text" name="nama_penerima" id="nama_penerima" value="<?= $data_keranjang->nama_penerima; ?>" required>
						</div>
						<div class="information-layout-item">
							<p class="text-header">Nama Telp : </p>
							<input type="text" name="no_telp" id="no_telp" value="<?= $data_keranjang->no_telp; ?>" required>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Alamat Lengkap :</p>
							<textarea name="alamat" required><?= $data_keranjang->alamat; ?></textarea>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Opsi Pengiriman :</p>
							<select class="form-control" id="opKirim" name="opKirim">
								<option>Opsi Pengiriman</option>
								<option value="jne" <?= $data_keranjang->opKirim == "jne" ? "selected" : null; ?>>JNE</option>
								<option value="pos" <?= $data_keranjang->opKirim == "pos" ? "selected" : null; ?>>POS</option>
								<option value="tiki" <?= $data_keranjang->opKirim == "tiki" ? "selected" : null; ?>>TIKI</option>
							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Opsi Layanan : </p>
							<select id="ongkos" name="ongkos" class="form-control">

							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Jumlah : </p>
							<input min="1" type="number" name="qty" id="qty" placeholder="1" value="<?= $data_keranjang->jumlah ?>" required>
						</div>

						<div class="information-layout-item">
							<!-- <p class="text-header">Berat : </p> -->
							<input min="0" type="number" name="weight" id="weight" value=<?= $data_keranjang->weight; ?> required readonly>
						</div>

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Deskripsi / Pesan :</p>
							<textarea name="isi_pesan" required><?= $data_keranjang->isi_pesan; ?></textarea>
						</div>

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Sub Total :</p>
							<h3>Rp. <span id="subtotal"><?= number_format($data_keranjang->sub_total, 0, ',', ',') ?></span></h3>
						</div>

						<button class="button primary">Pesan</button>
						<!-- /INFORMATION LAYOUT ITEM -->
					</form>




				</div>
				<!-- INFORMATION LAYOUT -->
			</div>
			<!-- /SIDEBAR ITEM -->



			<!-- SIDEBAR ITEM -->
			<div class="sidebar-item product-info">
				<h4>Informasi Produk</h4>
				<hr class="line-separator">
				<!-- INFORMATION LAYOUT -->
				<div class="information-layout v2">
					<!-- INFORMATION LAYOUT ITEM -->
					<div class="information-layout-item">
						<p class="text-header">Nama Produk:</p>
						<p><?= $produk->produk_nama ?></p>
					</div>
					<!-- /INFORMATION LAYOUT ITEM -->

					<!-- INFORMATION LAYOUT ITEM -->
					<div class="information-layout-item">
						<p class="text-header">Kategori :</p>
						<p><?= $produk->kategori_nama ?></p>
					</div>
					<!-- /INFORMATION LAYOUT ITEM -->

					<!-- INFORMATION LAYOUT ITEM -->
					<div class="information-layout-item">
						<p class="text-header">Harga :</p>
						<p>Rp.<?= number_format($produk->produk_harga, 0, '', '.') ?></p>
					</div>
					<!-- /INFORMATION LAYOUT ITEM -->




				</div>
				<!-- INFORMATION LAYOUT -->
			</div>
			<!-- /SIDEBAR ITEM -->








		</div>
		<!-- /SIDEBAR -->

		<!-- CONTENT -->
		<div class="content left">
			<!-- POST -->
			<article class="post">
				<!-- POST IMAGE -->
				<div class="post-image">
					<figure class="product-preview-image large liquid">
						<img style="height: 621px;width: 485px;" src="<?php echo base_url('assets/img/produk/') ?><?= $produk->produk_gambar ?>" alt="">
					</figure>
				</div>
				<!-- /POST IMAGE -->



				<hr class="line-separator">

				<!-- POST CONTENT -->
				<div class="post-content">
					<!-- POST PARAGRAPH -->
					<div class="post-paragraph">
						<h3 class="post-title">Deskripsi:</h3>
						<p><?= $produk->produk_deskripsi ?></p>
					</div>




					<div class="clearfix"></div>
				</div>
				<!-- /POST CONTENT -->

				<hr class="line-separator">


			</article>
			<!-- /POST -->


		</div>
		<!-- CONTENT -->
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

	$(document).ready(function() {
		var opKirim = $('#opKirim').val();
		var province = $('#destination_provice').val();
		var kota = document.querySelector("#kota").textContent;
		var city = $('#destination_city').val();
		var weight = $('#weight').val();


		console.log(province);
		console.log(kota);
		console.log(city);
		console.log(weight);
		console.log(opKirim);


		$.get('<?php echo site_url('Keranjang/get_ongkos/') ?>' + kota + '/' + weight + '/' + opKirim, function(resp) {
			console.log(resp);
			$('#ongkos').html(resp);
		});
	});
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