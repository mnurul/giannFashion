<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
		<div class="section-headline">
			<h2>Riwayat Transaksi</h2>
			<p>Beranda<span class="separator">/</span><span class="current-section">Riwayat Transaksi</span></p>
		</div>
	</div>
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
			<!-- FORM POPUP -->
			<div class="form-popup" style="float: none;width: 1170px;">
			
				
			

				<!-- FORM POPUP CONTENT -->
				<div class="form-popup-content" >
					<h4 class="popup-title">Riwayat Transaksi</h4>
					<!-- LINE SEPARATOR -->
					<hr class="line-separator">
					<?php if ($this->session->flashdata('no_pesanan')): ?>
						<h3>No Pesanan Baru Anda : <?= $this->session->flashdata('no_pesanan') ?></h3>						
					<?php endif ?>
					<table id="example" class="row-border" style="width:100%">
						<thead>
							<th>No</th>
							<th>No Pesanan</th>
							<th>Tgl Pemesanan</th>
							<th>Penerima</th>
							<th>Status Pesanan</th>
							<th>Total</th>
							<th></th>
						</thead>
						<tbody>
							<?php $no=1; foreach ($riwayat_transaksi as $transaksi): ?>
								
								<tr>
									<td align="center"><?= $no++ ?></td>
									<td align="center"><?= $transaksi->no_pesanan ?></td>
									<td align="center"><?= $transaksi->tgl_transaksi ?></td>
									<td align="center"><?= $transaksi->nama_penerima ?></td>
									<td align="center">
										<?php if ($transaksi->status_pesanan == 0 ): ?>
											Menunggu Pembayaran
										<?php elseif ($transaksi->status_pesanan == 1 ): ?>
											Menunggu Konfirmasi Admin
										<?php elseif ($transaksi->status_pesanan == 2 ): ?>
											Diproses
										<?php elseif ($transaksi->status_pesanan == 3 ): ?>
											Dikirim
										<?php elseif ($transaksi->status_pesanan == 4 ): ?>
											Selesai
										<?php elseif ($transaksi->status_pesanan == 5 ): ?>
											Batal
										<?php endif ?>
									</td>
									<td align="center">Rp. <?= number_format($transaksi->grandtotal,0,',',',')  ?></td>
									<td align="center">
										<a href="<?= base_url('pelanggan/detail-transaksi/'.$transaksi->no_pesanan) ?>"><button style="margin-top: 0px;" class="button primary">Detail</button></a>
									</td>
									
								</tr>
							<?php endforeach ?>

						</tbody>
						
					</table>
					<!-- /LINE SEPARATOR -->
				</div>
				<!-- /FORM POPUP CONTENT -->
			</div>
			<!-- /FORM POPUP -->

			

			<div class="clearfix"></div>
		</div>
	</div>
	<!-- /SECTION -->