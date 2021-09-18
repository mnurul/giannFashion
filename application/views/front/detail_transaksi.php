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
			<div class="form-popup-content">
				<h4 class="popup-title">Detail Transaksi</h4>

				<!-- LINE SEPARATOR -->
				<hr class="line-separator">
				<div style="display: flex">
					<div class="sidebar-item product-info" style="width: 50%;">
						<h4>No Pesanan : <?= $no_pesanan ?></h4>
						<hr class="line-separator">
						<!-- INFORMATION LAYOUT -->
						<div class="information-layout">
							<!-- INFORMATION LAYOUT ITEM -->
							<div class="information-layout-item">
								<p class="text-header">Tanggal Transaksi:</p>
								<p><?= $data_transaksi->tgl_transaksi ?></p>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->

							<!-- INFORMATION LAYOUT ITEM -->
							<div class="information-layout-item">
								<p class="text-header">Nama Penerima:</p>
								<p><?= $data_transaksi->nama_penerima ?></p>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->

							<!-- INFORMATION LAYOUT ITEM -->
							<div class="information-layout-item">
								<p class="text-header">Alamat:</p>
								<p><?= $data_transaksi->alamat ?></p>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->

							<!-- INFORMATION LAYOUT ITEM -->
							<div class="information-layout-item">
								<p class="text-header">No Telp:</p>
								<p><?= $data_transaksi->notelp ?></p>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->

							<div class="information-layout-item">
								<p class="text-header">Layanan:</p>
								<p><?= strtoUpper($detail_transaksi2->opKirim) . " " . $detail_transaksi2->opsiLayanan ?></p>
							</div>

							<!-- INFORMATION LAYOUT ITEM -->
							<div class="information-layout-item">
								<p class="text-header">Status Pesanan:</p>
								<p>
									<?php if ($data_transaksi->status_pesanan == 0) : ?>
										Menunggu Pembayaran
									<?php elseif ($data_transaksi->status_pesanan == 1) : ?>
										Menunggu Konfirmasi Admin
									<?php elseif ($data_transaksi->status_pesanan == 2) : ?>
										Diproses
									<?php elseif ($data_transaksi->status_pesanan == 3) : ?>
										Dikirim
									<?php elseif ($data_transaksi->status_pesanan == 4) : ?>
										Selesai
									<?php elseif ($data_transaksi->status_pesanan == 5) : ?>
										Batal
									<?php elseif ($data_transaksi->status_pesanan == 6) : ?>
										Pesanan DiTerima
									<?php endif ?>
								</p>
							</div>
							<div class="information-layout-item <?= $data_transaksi->status_pesanan != 3 ? 'hidden' : null; ?>">
								<p class="text-header">Status Pengiriman:</p>
								<form action="<?= base_url('pelanggan/updateStatus/') . $no_pesanan ?>" method="post">
									<!-- <select class="form-control" name="status_pesanan">
										<option <?= $data_transaksi->status_pesanan == '6' ? 'selected=selected' : ''; ?> value="6">Pesanan DiTerima</option>
									</select> -->
									<input hidden readonly type="text" name="status_pesanan" value="6">
									<button type="submit" style="margin-top: 0px;float:right;background-color:#FFA500;color:black;border:none" class="btn btn-success btn-sm"><strong>Pesanan DiTerima</strong></button>

								</form>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->

							<!-- INFORMATION LAYOUT ITEM -->
							<div class="information-layout-item">
								<p class="text-header">Grand Total:</p>
								<p>Rp.<?= number_format($data_transaksi->grandtotal, 0, ',', ',')  ?></p>
							</div>
							<!-- /INFORMATION LAYOUT ITEM -->



						</div>
						<!-- INFORMATION LAYOUT -->
					</div>
					<div class="sidebar-item product-info" style="width: 50%;">
						<h4>Konfirmasi Pembayaran</h4>
						<hr class="line-separator">
						<!-- INFORMATION LAYOUT -->
						<div class="information-layout">
							<!-- INFORMATION LAYOUT ITEM -->
							<form enctype="multipart/form-data" method="post" action="<?= base_url('pesanan/konfirmasi-pembayaran/') . $data_transaksi->no_pesanan ?>">
								<label>Upload Bukti Pembayaran</label>
								<?php if ($data_pembayaran) : ?>
									<img width="150" height="150" src="<?= base_url('assets/img/konfirmasi_pembayaran/') . $data_pembayaran->bayar_gambar ?>">
								<?php endif ?>
								<input type="file" name="image">
								<!-- /INFORMATION LAYOUT ITEM -->

								<!-- INFORMATION LAYOUT ITEM -->
								<label>Keterangan</label>
								<input type="text" name="keterangan" value="<?php if ($data_pembayaran)  echo $data_pembayaran->keterangan ?>">
								<!-- /INFORMATION LAYOUT ITEM -->

								<!-- INFORMATION LAYOUT ITEM -->
								<label>Jumlah Bayar</label>
								<input readonly type="text" name="jumlah_bayar" value="<?php if ($data_pembayaran)  echo $data_pembayaran->bayar_nominal;
																						else echo $data_transaksi->grandtotal   ?>">
								<!-- /INFORMATION LAYOUT ITEM -->



								<div style="display: flex">
									<?php if ($data_transaksi->status_pesanan == 0 || $data_transaksi->status_pesanan == 1) : ?>
										<button class="button primary" type="submit" style="width: 200px">Kirim</button> &nbsp;&nbsp;
									<?php endif ?>
									<a href="<?= base_url('pelanggan/riwayat-transaksi') ?>"> <button type="button" class="button secondary" style="width: 200px">Kembali</button></a>
								</div>
							</form>

						</div>
						<!-- INFORMATION LAYOUT -->
					</div>
				</div>



				<?php if ($this->session->flashdata('no_pesanan')) : ?>
					<h3>No Pesanan Baru Anda : <?= $this->session->flashdata('no_pesanan') ?></h3>
				<?php endif ?>
				<table id="example" class="row-border" style="width:100%">
					<thead>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Jumlah</th>
						<th>Isi Pesan</th>
						<th>Harga</th>
						<th>Sub Total</th>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($detail_transaksi as $transaksi) : ?>

							<tr>
								<td align="center"><?= $no++ ?></td>
								<td align="center"><?= $transaksi->produk_nama ?></td>
								<td align="center"><?= $transaksi->jumlah ?></td>
								<td align="center"><?= $transaksi->isi_pesan ?></td>
								<td align="center">Rp. <?= number_format($transaksi->harga, 0, ',', ',') ?></td>

								<td align="center">Rp. <?= number_format($transaksi->sub_total, 0, ',', ',')  ?></td>


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