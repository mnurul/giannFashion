<!-- SECTION HEADLINE --> 
	<div class="section-headline-wrap">
		<div class="section-headline">
			<h2>Masuk / Login</h2>
			<p>Beranda<span class="separator">/</span><span class="current-section">Masuk / Login</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section demo ">
			<!-- FORM POPUP -->
			<div class="form-popup" style="float: none;">
				<!-- CLOSE BTN -->
				
				<!-- /CLOSE BTN -->

				<!-- FORM POPUP CONTENT -->
				<div class="form-popup-content">
					<h4 class="popup-title">Masuk ke Akun Anda</h4>
					<!-- LINE SEPARATOR -->
					<hr class="line-separator">
					<!-- /LINE SEPARATOR -->
					<?php if ($this->session->flashdata('berhasil')): ?>
						<small style="color: green"><?= $this->session->flashdata('berhasil') ?></small>
					<?php endif ?>

					<?php if ($this->session->flashdata('pesan')): ?>
						<small style="color: red"><?= $this->session->flashdata('pesan') ?></small>
					<?php endif ?>
					<form id="login-form" method="post" action="<?= base_url('login/buat_login') ?>">
						<label for="username" class="rl-label">Username</label>
						<input type="text" id="username" name="username" placeholder="Masukkan  username disini...">
						<label for="password" class="rl-label">Password</label>
						<input type="password" id="password" name="password" placeholder="Masukkan  password disini...">
						<!-- CHECKBOX -->
						<!-- <input type="checkbox" id="remember" name="remember" checked> -->
					<!-- 	<label for="remember" class="label-check">
							<span class="checkbox primary primary"><span></span></span>
							Remember username and password
						</label> -->
						<!-- /CHECKBOX -->
						<!-- <p>Forgot your password? <a href="#" class="primary">Click here!</a></p> -->
						<button class="button mid primary">Masuk <span class="primary">Sekarang!</span></button>
						<a href="<?= base_url('register') ?>"><button type="button" class="button mid secondary">Daftar <span class="primary">/ Register</span></button></a>
					</form>
					<!-- LINE SEPARATOR -->
					<hr class="line-separator double">
					<!-- /LINE SEPARATOR -->
					<!-- <a href="#" class="button mid fb half">Login with Facebook</a>
					<a href="#" class="button mid twt half">Login with Twitter</a> -->
				</div>
				<!-- /FORM POPUP CONTENT -->
			</div>
			<!-- /FORM POPUP -->

			

			<div class="clearfix"></div>
		</div>
	</div>
	<!-- /SECTION