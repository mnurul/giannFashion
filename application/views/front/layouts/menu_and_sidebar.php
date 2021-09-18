<!-- SIDE MENU -->
<div id="mobile-menu" class="side-menu left closed">
	<!-- SVG PLUS -->
	<svg class="svg-plus">
		<use xlink:href="#svg-plus"></use>
	</svg>
	<!-- /SVG PLUS -->

	<!-- SIDE MENU HEADER -->
	<div class="side-menu-header">
		<figure class="logo small">
			<img src="<?php echo base_url('assets/') ?>	images/logoo2.png" img style="width:140px; height:70px; display: block; margin:0 auto;">
		</figure>
	</div>
	<!-- /SIDE MENU HEADER -->

	<!-- SIDE MENU TITLE -->
	<p class="side-menu-title">Menu</p>
	<!-- /SIDE MENU TITLE -->

	<!-- DROPDOWN -->
	<ul class="dropdown dark hover-effect interactive">
		<!-- DROPDOWN ITEM -->
		<li class="dropdown-item">
			<a href="<?= base_url() ?>">Beranda</a>
		</li>
		<!-- /DROPDOWN ITEM -->

		<!-- DROPDOWN ITEM -->
		<li class="dropdown-item">
			<a href="<?= base_url('katalog') ?>">Katalog</a>
		</li>
		<!-- /DROPDOWN ITEM -->

		<!-- DROPDOWN ITEM -->
		<li class="dropdown-item">
			<a href="<?= base_url('cara-pemesanan') ?>">Cara Pemesanan</a>
		</li>
		<!-- /DROPDOWN ITEM -->

		<!-- DROPDOWN ITEM -->
		<li class="dropdown-item">
			<a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
		</li>
		<!-- /DROPDOWN ITEM -->

		<!-- DROPDOWN ITEM -->
		<li class="dropdown-item">
			<a href="<?= base_url('register') ?>">Daftar</a>
		</li>
		<!-- /DROPDOWN ITEM -->

		<!-- DROPDOWN ITEM -->
		<li class="dropdown-item">
			<a href="<?= base_url('login') ?>">Login</a>
		</li>
		<!-- /DROPDOWN ITEM -->

		<!-- DROPDOWN ITEM -->

		<!-- /DROPDOWN ITEM -->
	</ul>
	<!-- /DROPDOWN -->
</div>
<!-- /SIDE MENU -->

<!-- SIDE MENU -->
<div id="account-options-menu" class="side-menu right closed">
	<!-- SVG PLUS -->
	<svg class="svg-plus">
		<use xlink:href="#svg-plus"></use>
	</svg>
	<!-- /SVG PLUS -->



</div>
<!-- /SIDE MENU -->

<!-- MAIN MENU -->
<div class="main-menu-wrap">
	<div class="menu-bar">
		<nav>
			<ul class="main-menu">
				<!-- MENU ITEM -->
				<li class="menu-item">
					<a href="<?= base_url() ?>">Beranda</a>
				</li>
				<!-- /MENU ITEM -->

				<!-- MENU ITEM -->
				<li class="menu-item">
					<a href="<?= base_url('katalog') ?>">Katalog</a>
				</li>
				<!-- /MENU ITEM -->

				<!-- MENU ITEM -->
				<li class="menu-item">
					<a href="<?= base_url('cara-pemesanan') ?>">Cara Pemesanan</a>
				</li>
				<!-- /MENU ITEM -->

				<!-- MENU ITEM -->
				<li class="menu-item">
					<a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
				</li>
				<!-- /MENU ITEM -->

				<!-- MENU ITEM -->
				<li class="menu-item">
					<a href="<?= base_url('testimoni') ?>">Testimoni</a>
				</li>
				<!-- /MENU ITEM -->




			</ul>
		</nav>
		<form class="search-form" method="get" action="<?= base_url('katalog/search') ?>">
			<input type="text" class="rounded" name="produk" id="search_products" placeholder="Cari produk disini...">
			<input type="hidden" name="kategori" value="0">
			<input type="image" src="<?php echo base_url('assets/') ?>	images/search-icon.png" alt="search-icon">
		</form>
	</div>
</div>
<!-- /MAIN MENU -->