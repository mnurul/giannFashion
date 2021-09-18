<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <!-- <a href="<?= base_url('admin/') . $controller . '/tambah' ?>"><button class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah Data</button></a> -->
    <?php if ($this->session->flashdata('simpan')) : ?>
      <div class="alert alert-success alert-dismissible" style="width: 400px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h6><i class="icon fas fa-check"></i> <?= $this->session->flashdata('simpan') ?></h6>
      </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('update')) : ?>
      <div class="alert alert-warning alert-dismissible" style="width: 400px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h6><i class="icon fas fa-check"></i> <?= $this->session->flashdata('update') ?></h6>
      </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('hapus')) : ?>
      <div class="alert alert-danger alert-dismissible" style="width: 400px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h6><i class="icon fas fa-trash"></i> <?= $this->session->flashdata('hapus') ?></h6>
      </div>
    <?php endif ?>
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"><?= $sub_title ?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <style type="text/css">
          .list-group-item {
            position: relative;
            display: flex;
            padding: .75rem 1.25rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .125);
          }
        </style>

        <div class="row" style="margin-bottom: 10px;">
          <div class="col-lg-6">
            <ul class="list-group">
              <li class="list-group-item row">
                <div class="col-md-3">No Pesanan </div>
                <div class="col-md-9">: <b><?= $no_pesanan ?></b> </div>
              </li>
              <li class="list-group-item row">
                <div class="col-md-3">Tgl Transaksi </div>
                <div class="col-md-8">: <b><?= $pesanan->tgl_transaksi ?></b> </div>
              </li>
              <li class="list-group-item row">
                <div class="col-md-3">Nama Penerima </div>
                <div class="col-md-8">: <b><?= $pesanan->nama_penerima ?></b> </div>
              </li>
              <li class="list-group-item row">
                <div class="col-md-3">Alamat</div>
                <div class="col-md-8">: <b><?= $pesanan->alamat ?></b> </div>
              </li>
              <li class="list-group-item row">
                <div class="col-md-3">No Telp </div>
                <div class="col-md-8">: <b><?= $pesanan->notelp ?></b> </div>
              </li>

              <li class="list-group-item row">
                <div class="col-md-3">Email </div>
                <div class="col-md-8">: <b><?= $pesanan->email ?></b> </div>
              </li>

              <li class="list-group-item row">
                <div class="col-md-3">Grand Total </div>
                <div class="col-md-8">: <b>Rp.<?= number_format($pesanan->grandtotal, 0, ',', ',') ?></b> </div>
              </li>
            </ul>
          </div>
          <div class="col-lg-6">
            <form action="<?= base_url('admin/') . $controller . '/update/' . $no_pesanan ?>" method="post">
              <?php if ($data_pembayaran) : ?>
                <ul class="list-group">
                  <li class="list-group-item row">
                    <div class="col-md-3">Bukti Pembayaran</div>
                    <div class="col-md-9">: <a href="<?= base_url('assets/img/konfirmasi_pembayaran/') . $data_pembayaran->bayar_gambar ?>" target="_blank"><img src="<?= base_url('assets/img/konfirmasi_pembayaran/') . $data_pembayaran->bayar_gambar ?>" width="122" height="122"></a></div>
                  </li>
                  <li class="list-group-item row">
                    <div class="col-md-3">Keterangan</div>
                    <div class="col-md-9">: <b><?= $data_pembayaran->keterangan ?></b></div>
                  </li>
                  <li class="list-group-item row">
                    <div class="col-md-3">Jumlah Bayar </div>
                    <div class="col-md-9">: <b>Rp.<?= number_format($data_pembayaran->bayar_nominal, 0, ',', ',') ?></b></div>
                  </li>

                  <li class="list-group-item row">
                    <div class="col-md-3">Status Pesanan :</div>
                    <div class="col-md-9">
                      <select class="form-control" name="status_pesanan">
                        <option <?= $pesanan->status_pesanan == '0' ? 'selected=selected' : ''; ?> value="0">Menunggu Pembayaran</option>
                        <option <?= $pesanan->status_pesanan == '1' ? 'selected=selected' : ''; ?> value="1">Menunggu Konfirmasi Admin</option>
                        <option <?= $pesanan->status_pesanan == '2' ? 'selected=selected' : ''; ?> value="2">Diproses</option>
                        <option <?= $pesanan->status_pesanan == '3' ? 'selected=selected' : ''; ?> value="3">Dikirim</option>
                        <option <?= $pesanan->status_pesanan == '6' ? 'selected=selected' : ''; ?> value="6">Pesanan DiTerima</option>
                        <option <?= $pesanan->status_pesanan == '4' ? 'selected=selected' : ''; ?> value="4">Selesai</option>
                        <option <?= $pesanan->status_pesanan == '5' ? 'selected=selected' : ''; ?> value="5">Batal</option>

                      </select>
                    </div>
                  </li>
                  <!-- <li class="list-group-item row">
                        <div class="col-md-3">Four</div>
                        <div class="col-md-9">This is a line for content</div>
                    </li> -->
                </ul>
              <?php else : ?>
                <ul class="list-group">


                  <li class="list-group-item row">
                    <div class="col-md-12"> <span class="badge badge-danger">Belum di Melakukan Pembayaran </span></div>
                  </li>
                </ul>
              <?php endif ?>

          </div>

        </div>
        <div class="table-responsive">
          <a href="<?= base_url('admin/data-pemesanan') ?>"><button type="button" style="margin-bottom: 10px;" class="btn btn-danger">Kembali</button></a>
          <?php if ($data_pembayaran) : ?>
            <button type="submit" style="margin-bottom: 10px;" class="btn btn-success">Update</button>
          <?php endif ?>
          <a href="<?= base_url('admin/') . $controller . '/print/' . $no_pesanan ?>"><button type="button" style="margin-bottom: 10px;" class="btn btn-primary">Print</button></a>
          </form>
          <table id="data-tables" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Isi Pesan</th>
                <th>Harga</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($detail_pesanan as $dp) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $dp->produk_nama ?><br><img src="<?= base_url('assets/img/produk/') . $dp->produk_gambar ?>" width="100" height="100"></td>
                  <td><?= $dp->jumlah ?></td>
                  <td><?= $dp->isi_pesan ?></td>

                  <td>Rp.<?= number_format($dp->harga, 0, ',', ',') ?></td>
                  <td>Rp.<?= number_format($dp->sub_total, 0, ',', ',') ?></td>

                </tr>

              <?php endforeach ?>

            </tbody>

          </table>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/layouts/js'); ?>