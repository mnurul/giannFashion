<!-- BANNER -->
<style>
	.banner-wrap {
		background: linear-gradient(0deg, rgb(0 0 0 / 57%), rgb(0 0 0 / 63%)), url("<?php echo base_url('assets/') ?>images/banner1.png") no-repeat center;
		background-size: cover;
	}
</style>
<div class="banner-wrap">
	<section class="banner">
		<h5>SELAMAT DATANG DI </h5>
		<h1>GIANT <span>FASHION </span></h1>
		<!-- <p>Cv. Mitra kreasi</p> -->
		<img src="<?php echo base_url('assets/') ?>	images/top_items.png" alt="banner-img">

		<!-- SEARCH WIDGET -->
		<div class="search-widget">
			<form action="<?= base_url('katalog/search') ?>" class="search-widget-form" method="get">
				<input type="text" name="produk" placeholder="Cari produk anda yang anda mau disini ...">
				<label for="categories" class="select-block">
					<select name="kategori" id="categories">
						<option value="0">Semua Kategori</option>
						<?php foreach ($data_kategori as $kategori) : ?>
							<option value="<?= $kategori->kategori_id ?>"><?= $kategori->kategori_nama ?></option>
						<?php endforeach ?>
					</select>
					<svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
				</label>
				<button class="button medium dark">Cari Sekarang!</button>
			</form>
		</div>
		<!-- /SEARCH WIDGET -->
	</section>
</div>
<!-- /BANNER