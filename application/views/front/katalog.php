<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v3">
	<div class="section-headline">
		<h2>Katalog</h2>
		<p>Beranda<span class="separator">/</span><span class="current-section">Katalog</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
	<div class="section">
		<!-- CONTENT -->
		<div class="content">
			<!-- HEADLINE -->
			<div class="headline secondary">
				<h4><?= number_format($jumlah_produk, 0, ',', '.') ?> Produk Ditemukan</h4>

				<div class="clearfix"></div>
			</div>
			<!-- /HEADLINE -->

			<!-- PRODUCT SHOWCASE -->
			<div class="product-showcase">
				<!-- PRODUCT LIST -->
				<div class="product-list grid column3-4-wrap">
					<?php foreach ($data_produk as $produk) : ?>

						<!-- PRODUCT ITEM -->
						<div class="product-item column">
							<!-- PRODUCT PREVIEW ACTIONS -->
							<div class="product-preview-actions">
								<!-- PRODUCT PREVIEW IMAGE -->
								<figure class="product-preview-image">
									<img style=" height: 300px !important;" src="<?= base_url('assets/img/produk/') ?><?= $produk->produk_gambar ?>" alt="product-image">
								</figure>
								<!-- /PRODUCT PREVIEW IMAGE -->

								<!-- PREVIEW ACTIONS -->
								<div class="preview-actions" style="height: 300px;">
									<!-- PREVIEW ACTION -->
									<div class="preview-action" style="margin-top: 70px;">
										<a href="<?= base_url('produk/index/') . $produk->produkid ?>">
											<div class="circle tiny primary" style="background-color: #FF4848 !important;">
												<span class="icon-tag"></span>
											</div>
										</a>

										<a href="<?= base_url('Produk/index/') . $produk->produkid ?>">
											<p>Lihat / Pesan</p>
										</a>
									</div>
									<!-- /PREVIEW ACTION -->

								</div>
								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PRODUCT PREVIEW ACTIONS -->

							<!-- PRODUCT INFO -->
							<div class=" product-info">
								<!-- <a href="service-page.html"> -->
								<p class="text-header"><?= $produk->produk_nama ?></p>
								<!-- </a> -->
								<p class="product-description"><?= substr($produk->produk_deskripsi, 0, 30) ?> ...</p>
								<!-- <a href="services.html"> -->
								<p class="category secondary"><?= $produk->kategori_nama ?></p>
								<!-- </a> -->
								<p class="price"><span>Rp.</span><?= number_format($produk->produk_harga, 0, ',', '.') ?></p>
							</div>
							<!-- /PRODUCT INFO -->
							<!-- <hr class="line-separator"> -->


						</div>
						<!-- /PRODUCT ITEM -->



					<?php endforeach ?>


				</div>
				<!-- /PRODUCT LIST -->
			</div>
			<!-- /PRODUCT SHOWCASE -->

			<div class="clearfix"></div>

			<?php
			echo $this->pagination->create_links();
			?>

		</div>
		<!-- CONTENT -->

		<!-- SIDEBAR -->
		<div class="sidebar">
			<!-- DROPDOWN -->
			<ul class="dropdown hover-effect secondary">
				<li style="background-color: whitesmoke !important;" class="dropdown-item <?= $this->uri->segment(3) == '' ? 'active' : ''; ?>">
					<a href="<?= base_url('katalog') ?>">Semua </a>
				</li>
				<?php foreach ($data_kategori as $kategori) : ?>
					<li style="background-color: whitesmoke !important;" class="dropdown-item <?= $kategori->kategori_id == $this->uri->segment(3) ? 'active' : ''; ?>">
						<a href="<?= base_url('katalog/kategori/' . $kategori->kategori_id) ?>"><?= $kategori->kategori_nama ?></a>
					</li>
				<?php endforeach ?>

				<!-- li class="dropdown-item active">
						<a href="#">Illustration</a>
					</li>
					<li class="dropdown-item">
						<a href="#">Web Design</a>
					</li>
					<li class="dropdown-item">
						<a href="#">Stock Photography</a>
					</li>
					<li class="dropdown-item">
						<a href="#">Code and Plugins</a>
					</li> -->
			</ul>
			<!-- /DROPDOWN -->


			<!-- /SIDEBAR -->
		</div>
	</div>
	<!-- /SECTION -->