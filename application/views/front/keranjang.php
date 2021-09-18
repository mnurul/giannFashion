<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
	<div class="section-headline">
		<h2>Keranjang</h2>
		<p>Home<span class="separator">/</span><span class="current-section">Keranjang</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<form method="post" action="<?= base_url('pesanan/buat_pesanan') ?>">
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<!-- <div class="sidebar left"> -->

			<!-- SIDEBAR ITEM -->
			<!-- <div class="sidebar-item">
					<h4>Info Pengiriman</h4>
					<hr class="line-separator">
					<label>Penerima :</label>
					<input type="text" name="nama_penerima" value="<?= $this->session->userdata('nama_penerima') ?>">

					<label>Email :</label>
					<input type="text" name="email" value="<?= $this->session->userdata('plg_email') ?>">

					<label>No Telp / Hp :</label>
					<input type="text" name="telp" value="<?= $this->session->userdata('plg_telepon') ?>">

					<label>Alamat Pengiriman :</label>
					<textarea name="alamat"><?= $this->session->userdata('plg_alamat') ?></textarea>
					<form id="coupon-code-form">
							<input type="text" name="coupon_code" placeholder="Enter your coupon code...">
							<button class="button mid dark-light">Apply Coupon Code</button>
						</form>
				</div> -->
			<!-- /SIDEBAR ITEM -->



			<!-- </div> -->
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content right" style="float: none !important;width:auto;">
				<!-- CART -->
				<div class="cart">
					<!-- CART HEADER -->
					<div class="cart-header">
						<div class="cart-header-product">
							<p class="text-header small">Detail Pesanan</p>
						</div>
						<div class="cart-header-category">
							<p class="text-header small">Info Pengiriman</p>
						</div>
						<div class="cart-header-price">
							<p class="text-header small">Harga</p>
						</div>
						<div class="cart-header-actions">
							<p class="text-header small">Aksi</p>
						</div>
					</div>
					<!-- /CART HEADER -->

					<?php foreach ($data_keranjang_pesanan as $pesanan) : ?>
						<!-- CART ITEM -->
						<div class="cart-item">
							<!-- CART ITEM PRODUCT -->
							<div class="cart-item-product">
								<!-- ITEM PREVIEW -->
								<div class="item-preview">
									<a href="item-v1.html">
										<figure class="product-preview-image small liquid">
											<img src="<?= base_url('assets/img/produk/') . $pesanan->produk_gambar ?>" alt="">
										</figure>
									</a>
									<a href="<?= base_url('produk/index/') . $pesanan->produkid ?>">
										<p class="text-header small"><?= $pesanan->produk_nama ?></p>
									</a>
									<p class="" style="color: black"><b>Qty :</b> x<?= $pesanan->jumlah ?></p>
									<p class="description" style="color: black">Isi Pesan : <?= $pesanan->isi_pesan ?></p>
								</div>
								<!-- /ITEM PREVIEW -->
							</div>
							<!-- /CART ITEM PRODUCT -->

							<!-- CART ITEM CATEGORY -->
							<div class="cart-item-category" style="padding-top: 0px;text-align: center;">
								<p class="price"><span>Penerima: <?= $pesanan->nama_penerima ?> </span></p>
								<p class="price"><span>No Telp: <?= $pesanan->no_telp ?> </span></p>
								<p class="price"><span>Alamat: <?= $pesanan->alamat ?> </span></p>
								<p class="price"><span>Kota: <?= $pesanan->kota ?> </span></p>
								<p class="price"><span>Provinsi: <?= $pesanan->lokasi ?> </span></p>
								<p class="price"><span>Layanan: <?= strtoupper($pesanan->opKirim) . " " . $pesanan->opsiLayanan ?> </span></p>
							</div>
							<!-- /CART ITEM CATEGORY -->

							<!-- CART ITEM PRICE -->
							<div class="cart-item-price">
								<p class="price"><span>Rp.<?= number_format($pesanan->produk_harga, 0, ',', '.') ?> x <?= $pesanan->jumlah ?></span></p>
								<p class="price"><span>Ongkos Kirim: <?= number_format($pesanan->ongkir, 0, ',', '.'); ?> </span></p>
								<p class="price"><span>Sub Total : Rp.</span><?= number_format($pesanan->sub_total, 0, ',', '.') ?> </p>
							</div>
							<!-- /CART ITEM PRICE -->



							<!-- CART ITEM ACTIONS -->
							<div class="cart-item-actions">
								<a style="background: orange;" href="<?= base_url('keranjang/edit/') . $pesanan->id ?>" class="button dark-light rmv">
									<!-- SVG PLUS -->
									<i class="fa fa-edit"></i>
									<!-- /SVG PLUS -->
								</a>
							</div>
							<div class="cart-item-actions">
								<a style="background: red;" href="<?= base_url('keranjang/hapus/') . $pesanan->id ?>" onclick="return confirm('Yakin Ingin Hapus pesanan ?');" class="button dark-light rmv">
									<!-- SVG PLUS -->
									<svg class="svg-plus">
										<use xlink:href="#svg-plus"></use>
									</svg>
									<!-- /SVG PLUS -->
								</a>
							</div>
							<!-- /CART ITEM ACTIONS -->
						</div>
						<!-- /CART ITEM -->

					<?php endforeach ?>







					<!-- CART TOTAL -->
					<div class="cart-total">
						<p class="price medium"><span>Rp.</span><?= number_format($total_pesanan, 0, ',', '.') ?></p>
						<p class="text-header total">Total Pesanan :</p>
					</div>
					<!-- /CART TOTAL -->

					<!-- CART ACTIONS -->
					<div class="cart-actions">

						<?php if (count($data_keranjang_pesanan) > 0) : ?>
							<button onclick="return confirm('Yakin Ingin Membuat pesanan ?');" type="submit" class="button mid primary">Buat Pesanan</button>

						<?php endif ?>
						<a href="<?= base_url() ?>" class="button mid dark-light spaced">Lanjutkan Belanja</a>
					</div>
					<!-- /CART ACTIONS -->
				</div>
				<!-- /CART -->
			</div>
			<!-- CONTENT -->
		</div>
	</div>
</form>
<!-- /SECTION -->