
	<!-- /SECTION HEADLINE -->
	<style type="text/css">
		#example_filter input {
		 background: #ebebeb;
		 height: 40px;
		 width: 200px;
		 font-size: 18px;
		 color: black;
		  border-radius: 5px;
		}
	</style>
	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section demo ">
			<?php if ($this->session->flashdata('pesan')): ?>
				
					<h3 style="color:green;"><?= $this->session->flashdata('pesan') ?></h3>
					<br>
			<?php endif ?>
			<div class="content" style="width: 100%">
				<!-- THREAD -->
				<div class="thread">
					<!-- THREAD TITLE -->

					<div class="thread-title pinned">
						<!-- <span class="pin primary">Pinned</span> -->
						<p class="text-header">Testimoni</p>
					</div>
					<!-- /THREAD TITLE -->

					<!-- COMMENTS -->
					<div class="comment-list">


						<?php foreach ($data_testi as $testi): ?>
							
								<!-- COMMENT -->
								<div class="comment-wrap">
									<!-- USER AVATAR -->
									<a href="user-profile.html">
										<figure class="user-avatar medium">
											<img src="<?= base_url('assets/img/pelanggan/'.$testi->plg_foto) ?>" alt="">
										</figure>
									</a>
									<!-- /USER AVATAR -->
									<div class="comment">
										<p class="text-header"><?= $testi->plg_nama ?></p>
										<p class="timestamp"><?= $testi->tgl_post ?></p>
										
										<p><?= $testi->isi_testi ?></p>
									</div>
								</div>
								<!-- /COMMENT -->

								<!-- LINE SEPARATOR -->
								<hr class="line-separator">
								<!-- /LINE SEPARATOR -->
						<?php endforeach ?>


						<?php if ($this->session->userdata('login_pelanggan') == 'login'): ?>
							
							
							<h3>Buat Testimoni</h3>

							<!-- COMMENT REPLY -->
							<div class="comment-wrap comment-reply">
								<!-- USER AVATAR -->
								<a href="user-profile.html">
									<figure class="user-avatar medium">
										<img src="images/avatars/avatar_09.jpg" alt="">
									</figure>
								</a>
								<!-- /USER AVATAR -->

								<!-- COMMENT REPLY FORM -->
								<form class="comment-reply-form" method="post" action="<?= base_url('Testimoni/create') ?>">
									<textarea name="isi_testi" placeholder="Write your testi here..."></textarea>
									<button class="button primary">Post Testimoni</button>
								</form>
								<!-- /COMMENT REPLY FORM -->
							</div>
							<!-- /COMMENT REPLY -->
						<?php endif ?>
					</div>
					<!-- /COMMENTS -->
				</div>
				<!-- /THREAD -->
			</div>

			

			<div class="clearfix"></div>
		</div>
	</div>
	<!-- /SECTION