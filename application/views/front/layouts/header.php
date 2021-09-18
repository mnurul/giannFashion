<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from odindesign-themes.com/emerald-dragon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 16:58:51 GMT -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/vendor/simple-line-icons.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/vendor/tooltipster.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/vendor/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Add -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			// $("#myModal").modal('show');
			var kategori = $('#kategori').val();
			console.log(kategori);
			// Buat menentukan jenis cetak
			if (kategori == 5 || kategori == 1 || kategori == 6) {
				$("#myModal").modal({
					backdrop: 'static',
					keyboard: false,
				});
			} else {

				$("#myModal").modal('hide');

			}

		});
	</script>
	<!-- End Add -->

	<!-- favicon -->
	<!-- <link rel="icon" href="<?= base_url('assets/') ?>favicon.ico"> -->
	<link rel="icon" href="<?= base_url('assets/') ?>images/logo1.png">
	<title> <?= $title ?> | Giant Fashion</title>
	<style type="text/css">
		.product-list.grid .product-item .preview-actions .preview-action {
			left: 100px !important;
		}

		.post .post-content {
			/* padding: 94px 16px 66px !important; */
		}

		header .account-information {
			float: right;
			margin: 34px 6px 0 0;
		}

		/*figure > img {
		   
		}*/
	</style>
</head>

<body>

	<!-- HEADER -->
	<div class="header-wrap">
		<header>
			<!-- LOGO -->
			<a href="<?= base_url('assets/') ?>index.html">
				<figure class="logo" img style="width:200px;">
					<!-- <h1></h1> -->
					<img src="<?php echo base_url('assets/') ?>	images/logo1.png" style="width:140px; margin-top:-15px;">
				</figure>
			</a>
			<!-- /LOGO -->

			<!-- MOBILE MENU HANDLER -->
			<div class="mobile-menu-handler left primary">
				<img src="<?php echo base_url('assets/') ?>	images/pull-icon.png" alt="pull-icon">
			</div>
			<!-- /MOBILE MENU HANDLER -->

			<!-- LOGO MOBILE -->
			<a href="#">
				<figure class="logo-mobile">
					<img src="<?php echo base_url('assets/') ?>images/logo1.png" style="width:140px; margin-top:-15px;">
				</figure>
			</a>
			<!-- /LOGO MOBILE -->



			<!-- USER BOARD -->
			<div class="user-board">
				<?php if ($this->session->userdata('login_pelanggan') == 'login') : ?>
					<!-- USER QUICKVIEW -->
					<div class="user-quickview">
						<!-- USER AVATAR -->
						<a href="#">
							<div class="outer-ring">
								<div class="inner-ring"></div>
								<figure class="user-avatar">
									<img src="<?php echo base_url('assets/img/pelanggan/') ?><?= $this->session->userdata('plg_foto'); ?>" alt="avatar">
								</figure>
							</div>
						</a>
						<!-- /USER AVATAR -->

						<!-- USER INFORMATION -->
						<p class="user-name"><?= $this->session->userdata('plg_nama'); ?></p>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
						<p class="user-money"><?= $this->session->userdata('plg_id'); ?></p>
						<!-- /USER INFORMATION -->

						<!-- DROPDOWN -->
						<ul class="dropdown small hover-effect closed">

							<li class="dropdown-item">
								<a href="<?= base_url('pelanggan/riwayat-transaksi/') ?>">Riwayat Transaksi</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= base_url('pelanggan/edit/') ?>">Edit Profil</a>
							</li>
							<li class="dropdown-item">
								<a href="<?= base_url('login/logout') ?>">Keluar / Logout</a>
							</li>

						</ul>
						<!-- /DROPDOWN -->
					</div>
					<!-- /USER QUICKVIEW -->

					<!-- ACCOUNT INFORMATION -->
					<div class="account-information">

						<div class="account-cart-quickview">
							<a href="<?= base_url('keranjang') ?>"><i class="fa fa-shopping-cart" style=" font-size: 28px;color: white;">
									<?php if ($jumlah_dikeranjang > 0) : ?>
										<span class="pin soft-edged secondary"><?= $jumlah_dikeranjang ?></span>
									<?php endif ?>
								</i></a>
						</div>

					</div>
					<!-- /ACCOUNT INFORMATION -->
				<?php endif ?>

				<?php if ($this->session->userdata('login_pelanggan') != 'login') : ?>
					<!-- ACCOUNT ACTIONS -->
					<div class="account-actions">
						<a href="<?= base_url('login') ?>" class="button primary">Masuk / Login</a>
						<a href="<?= base_url('register') ?>" class="button secondary">Daftar / Register</a>
					</div>
					<!-- /ACCOUNT ACTIONS -->
				<?php endif ?>

			</div>
			<!-- /USER BOARD -->
		</header>
	</div>
	<!-- /HEADER -->