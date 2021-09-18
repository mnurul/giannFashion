<div class="clearfix"></div>

<!-- PRODUCT SIDESHOW -->
<div id="product-sideshow-wrap">
	<div id="product-sideshow">
		<!-- PRODUCT SHOWCASE -->
		<div class="product-showcase">
			<!-- HEADLINE -->
			<div class="headline primary">
				<h4>Produk Terbaru </h4>
				<!-- SLIDE CONTROLS -->
				<div class="slide-control-wrap">
					<div class="slide-control left">
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</div>

					<div class="slide-control right">
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</div>
				</div>
				<!-- /SLIDE CONTROLS -->
			</div>
			<!-- /HEADLINE -->

			<!-- PRODUCT LIST -->
			<div id="pl-1" class="product-list grid column4-wrap owl-carousel">

				<?php foreach ($data_produk1 as $produk1) : ?>
					<!-- PRODUCT ITEM -->
					<div class="product-item column">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<img style=" height: 300px !important;" src="<?php echo base_url('assets/img/produk/') ?><?= $produk1->produk_gambar ?>" alt="product-image">
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->

							<!-- PREVIEW ACTIONS -->
							<div class="preview-actions">
								<div class="preview-actions">
									<!-- PREVIEW ACTION -->
									<div class="preview-action">
										<a href="<?= base_url('produk/index/') . $produk1->produkid ?>">
											<div class="circle tiny primary">
												<span class="icon-tag"></span>
											</div>
										</a>
										<a href="<?= base_url('produk/index/') . $produk1->produkid ?>">
											<p>Lihat / Pesan</p>
										</a>
									</div>
									<!-- /PREVIEW ACTION -->

								</div>
								<!-- /PREVIEW ACTIONS -->
							</div>
							<!-- /PREVIEW ACTIONS -->
						</div>
						<!-- /PRODUCT PREVIEW ACTIONS -->

						<!-- PRODUCT INFO -->
						<div class="product-info">
							<a href="item-v1.html">
								<p class="text-header"><?= $produk1->produk_nama ?></p>
							</a>
							<p class="product-description"><?= substr($produk1->produk_deskripsi, 0, 30) ?> ...</p>
							<a href="shop-gridview-v1.html">
								<p class="category primary"><?= $produk1->kategori_nama ?></p>
							</a>
							<p class="price"><span>Rp.</span><?= number_format($produk1->produk_harga, 0, ',', '.') ?></p>
						</div>
						<!-- /PRODUCT INFO -->
						<hr class="line-separator">

						<!-- USER RATING -->

						<!-- /USER RATING -->
					</div>
					<!-- /PRODUCT ITEM -->
				<?php endforeach ?>


			</div>
			<!-- /PRODUCT LIST -->


			<!-- HEADLINE -->
			<div class="headline primary">
				<h4>Produk Lainnya </h4>
				<!-- SLIDE CONTROLS -->
				<div class="slide-control-wrap">
					<div class="slide-control left">
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</div>

					<div class="slide-control right">
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</div>
				</div>
				<!-- /SLIDE CONTROLS -->
			</div>
			<!-- /HEADLINE -->
			<!-- PRODUCT LIST -->
			<div id="pl-2" class="product-list grid column4-wrap owl-carousel">


				<?php foreach ($data_produk2 as $produk2) : ?>
					<!-- PRODUCT ITEM -->
					<div class="product-item column">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<img style=" height: 300px !important;" src="<?php echo base_url('assets/img/produk/') ?><?= $produk2->produk_gambar ?>" alt="product-image">
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->

							<div class="preview-actions">
								<!-- PREVIEW ACTION -->
								<div class="preview-action">
									<a href="<?= base_url('produk/index/') . $produk2->produkid ?>">
										<div class="circle tiny primary">
											<span class="icon-tag"></span>
										</div>
									</a>
									<a href="<?= base_url('produk/index/') . $produk2->produkid ?>">
										<p>Lihat / Pesan</p>
									</a>
								</div>
								<!-- /PREVIEW ACTION -->

							</div>
							<!-- /PREVIEW ACTIONS -->
						</div>
						<!-- /PRODUCT PREVIEW ACTIONS -->

						<!-- PRODUCT INFO -->
						<div class="product-info">
							<a href="item-v1.html">
								<p class="text-header"><?= $produk2->produk_nama ?></p>
							</a>
							<p class="product-description"><?= substr($produk2->produk_deskripsi, 0, 30) ?> ....</p>
							<a href="shop-gridview-v1.html">
								<p class="category primary"><?= $produk2->kategori_nama ?></p>
							</a>
							<p class="price"><span>Rp.</span><?= number_format($produk2->produk_harga, 0, ',', '.') ?></p>
						</div>
						<!-- /PRODUCT INFO -->
						<hr class="line-separator">

						<!-- USER RATING -->

						<!-- /USER RATING -->
					</div>
					<!-- /PRODUCT ITEM -->
				<?php endforeach ?>
			</div>
			<!-- /PRODUCT LIST -->

			<!-- PRODUCT LIST -->
			<div id="pl-3" class="product-list grid column4-wrap owl-carousel">

				<?php foreach ($data_produk3 as $produk3) : ?>
					<!-- PRODUCT ITEM -->
					<div class="product-item column">
						<!-- PRODUCT PREVIEW ACTIONS -->
						<div class="product-preview-actions">
							<!-- PRODUCT PREVIEW IMAGE -->
							<figure class="product-preview-image">
								<img style=" height: 300px !important;" src="<?php echo base_url('assets/img/produk/') ?><?= $produk3->produk_gambar ?>" alt="product-image">
							</figure>
							<!-- /PRODUCT PREVIEW IMAGE -->

							<!-- PREVIEW ACTIONS -->
							<div class="preview-actions">
								<!-- PREVIEW ACTION -->
								<div class="preview-action">
									<a href="<?= base_url('produk/index/') . $produk3->produkid ?>">
										<div class="circle tiny primary">
											<span class="icon-tag"></span>
										</div>
									</a>
									<a href="<?= base_url('produk/index/') . $produk3->produkid ?>">
										<p>Lihat / Pesan</p>
									</a>
								</div>
								<!-- /PREVIEW ACTION -->

							</div>
							<!-- /PREVIEW ACTIONS -->
						</div>
						<!-- /PRODUCT PREVIEW ACTIONS -->

						<!-- PRODUCT INFO -->
						<div class="product-info">
							<a href="item-v1.html">
								<p class="text-header"><?= $produk3->produk_nama ?></p>
							</a>
							<p class="product-description"><?= substr($produk3->produk_deskripsi, 0, 30) ?> ...</p>
							<a href="shop-gridview-v1.html">
								<p class="category primary"><?= $produk3->kategori_nama ?></p>
							</a>
							<p class="price"><span>Rp.</span><?= number_format($produk3->produk_harga, 0, ',', '.') ?></p>
						</div>
						<!-- /PRODUCT INFO -->
						<hr class="line-separator">

						<!-- USER RATING -->

						<!-- /USER RATING -->
					</div>
					<!-- /PRODUCT ITEM -->
				<?php endforeach ?>

			</div>

			<!-- HEADLINE -->
			<!-- <div class="headline primary">
				<a href="<?= base_url(); ?>produk/cetakCustom">
					<h4>Cetak Custom </h4>
				</a>
			</div> -->
			<!-- /HEADLINE -->
			<!-- /PRODUCT LIST -->
			<!-- <img style="width: 100%;" src="<?php echo base_url('assets/') ?>images/Picture1.png" alt=""> -->
		</div>
		<!-- /PRODUCT SHOWCASE -->


	</div>
</div>
<!-- /PRODUCTS SIDESHOW -->