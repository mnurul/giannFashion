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
						<span class="currency"><?= number_format($produk->harga_offset, 0, '', '.') ?></span>
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
						<span class="currency"><?= number_format($produk->harga_offset, 0, '', '.') ?></span>
						<span class="primary">Pesan !</span>
					</a>
				<?php endif ?>
			</div>
			<!-- /SIDEBAR ITEM -->

			<!-- SIDEBAR ITEM -->
			<div class="sidebar-item product-info" id="form-pesanan" style="display: none">
				<h4>Detail Pesanan :</h4>
				<hr class="line-separator">
				<!-- INFORMATION LAYOUT -->
				<div class="information-layout v2">
					<!-- INFORMATION LAYOUT ITEM -->
					<form method="post" action="<?= base_url('keranjang/tambahOffset/') . $produk->produkid ?>" enctype="multipart/form-data">
						<!-- Option Jenis Bahan -->
						<div class="information-layout-item">
							<p class="text-header">Jenis Bahan :</p>
							<select class="form-control" id="bahan" name="bahan">
								<option>Jenis Bahan</option>

								<?php foreach (array_combine($jenis_bahan, $harga_bahan) as $bahan => $harga) { ?>
									<!-- echo '<option value="' . $code . '">' . $name . '</option>'; -->
									<option value="<?= $harga; ?>"><?= $bahan ?></option>
								<?php } ?>
							</select>
						</div>
						<!-- /Option Jenis Bahan -->
						<div class="form-row information-layout-item">
							<div class="form-group col-md-6">
								<p class="text-header">Jumlah / Qty :</p>
								<input min="<?= $produk->min_order ?>" type="number" name="qty" id="qty" value="100" required>
								<input type="hidden" id="harga" value="<?= $produk->min_order ?>">
							</div>
							<div class="form-group col-md-6">
								<p class="text-header">Satuan :</p>
								<input type="text" name="satuan" id="satuan" value="<?= $produk->satuan_qty ?>" required readonly>
								<input type="hidden" id="harga" value="<?= $produk->satuan_qty ?>">
							</div>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Lokasi :</p>
							<select id="destination_provice" name="destination_provice" class="form-control" id="exampleFormControlSelect1">
								<option>Pilih Provinsi Tujuan</option>
								<?php foreach ($province->rajaongkir->results as $prov) { ?>
									<option value="<?php echo $prov->province_id ?>"><?php echo $prov->province ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Kota :</p>
							<select id="destination_city" name="destination_city" class="form-control" id="exampleFormControlSelect1">

							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Berat : </p>
							<input min="0" type="number" name="weight" id="weight" value="" required readonly>
						</div>
						<div class="information-layout-item">
							<p class="text-header">Opsi Pengiriman :</p>
							<select class="form-control" id="opKirim" name="opKirim">
								<option>Opsi Pengiriman</option>
								<option value="jne">JNE</option>
								<option value="pos">POS</option>
								<option value="tiki">TIKI</option>
							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Opsi Layanan : </p>
							<select id="ongkos" name="ongkos" class="form-control">

							</select>
						</div>

						<div class="information-layout-item">
							<p class="text-header">Desain / Gambar :</p>
							<input type="file" name="image" required>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Deskripsi / Pesan :</p>
							<textarea name="isi_pesan" required></textarea>
						</div>
						<!-- /INFORMATION LAYOUT ITEM -->

						<!-- INFORMATION LAYOUT ITEM -->
						<div class="information-layout-item">
							<p class="text-header">Sub Total :</p>
							<h3>Rp. <span id="subtotal"></span></h3>
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
				<h4>Informasi Produk Cetak Offset</h4>
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
						<p>Rp.<?= number_format($produk->harga_offset, 0, '', '.') ?></p>
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
						<img style="height: 484px;" src="<?php echo base_url('assets/img/produk/') ?><?= $produk->produk_gambar ?>" alt="">
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

					<!-- Form Cetak Custom -->
					<!-- <div class="post-paragraph <?= $produk->produkid != "31" ? 'produkHide' : null; ?>"> -->
					<div class="post-paragraph produkHide">
						<!-- FORM POPUP CONTENT -->
						<div class="form-popup-content">
							<h4 class="popup-title">Pesan Sekarang</h4>
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
								<div class="form-row">
									<div class="col">
										<label for="nama" class="rl-label">Nama</label>
										<input type="text" id="nama" value="" name="nama" required> </div>
									<div class="col">
										<label for="email" class="rl-label required">Email </label>
										<input type="email" id="email" value="" name="email" required>
										<input type="hidden" id="email" value="" name="old_email" required> </div>
								</div>
								<div class="form-row">
									<div class="col">
										<label for="nama" class="rl-label">Telepon</label>
										<input type="text" id="telp" value="" name="telp" required> </div>
									<div class="col">
										<label for="nama" class="rl-label">Kota</label>
										<input type="text" id="kota" value="" name="kota" required>
									</div>
								</div>

								<label for="username" class="rl-label">Nama Project Cetakan</label>
								<input type="text" id="project" value="" name="project" required>
								<input type="hidden" id="project" value="" name="old_project" placeholder="Masukkan Username  ..." required>

								<label for="password" class="rl-label required">Spesifikasi Cetakan yang Diinginkan</label>
								<textarea class="form-control" id="spesifiksi" rows="3"></textarea>

								<label for="image" class="rl-label">Upload Foto atau Design</label>
								<input type="file" id="image" name="image">

								<label for="notelp" class="rl-label">Quantity</label>
								<input type="text" id="quantity" value="" name="quantity" required>

								<button class="button mid secondary mt-3">Submit Permintaan Anda</button>
								<!-- <a href="<?= base_url('login') ?>"><button type="button" class="button mid primary">Masuk <span class="primary">/ Login!</span></button></a> -->
							</form>
						</div>
						<!-- /FORM POPUP CONTENT -->
					</div>
					<!-- /Form Cetak Custom -->


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
	$('#myModal').on('shown.bs.modal', function() {
		$('#myInput').trigger('focus')
	})
</script>

<script>
	// menampilkan kota tujuan pengiriman
	$(document).ready(function() {
		$('#destination_provice').change(function() {

			var province_id = $('#destination_provice').val();
			$.get('<?php echo site_url('Produk/get_city_by_province/') ?>' + province_id, function(resp) {
				// console.log(resp);
				$('#destination_city').html(resp);
			});
		});
	});


	$(document).ready(function() {
		$('#opKirim').change(function() {
			var opKirim = $(this).val();
			var province = $('#province').val();
			var city = $('#destination_city').val();
			var weight = $('#weight').val();

			$.get('<?php echo site_url('Produk/get_ongkos/') ?>' + city + '/' + weight + '/' + opKirim, function(resp) {
				console.log(resp);
				$('#ongkos').html(resp);
			});
		});
	});
</script>