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
      <!-- <a href="<?= base_url('admin/').$controller.'/tambah' ?>"><button class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah Data</button></a> -->
      <?php if ($this->session->flashdata('simpan') ): ?>
        <div class="alert alert-success alert-dismissible" style="width: 400px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h6><i class="icon fas fa-check"></i> <?= $this->session->flashdata('simpan') ?></h6>
        </div>
      <?php endif ?>

      <?php if ($this->session->flashdata('update') ): ?>
        <div class="alert alert-warning alert-dismissible" style="width: 400px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h6><i class="icon fas fa-check"></i> <?= $this->session->flashdata('update') ?></h6>
        </div>
      <?php endif ?>

      <?php if ($this->session->flashdata('hapus') ): ?>
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
            <div class="table-responsive">
                <table id="data-tables" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                         <th>No</th>
                         <th>No Pesanan</th>
                         <th>Tgl Pemesanan</th>
                         <th>Nama Pemesan</th>
                         <th>Nama Penerima</th>
                         <th>Status Pesanan</th>
                         <th>Total</th>
                         <th>Aksi</th>
                      </tr>
                   </thead>
                   <tbody>
                    <?php $no=1; foreach ($data_pesanan as $pesanan): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pesanan->no_pesanan ?></td>
                            <td><?= $pesanan->tgl_transaksi ?></td>
                            <td><?= $pesanan->plg_nama ?></td>
                            <td><?= $pesanan->nama_penerima ?></td>
                            <td>
                              <?php if ($pesanan->status_pesanan == 0 ): ?>
                                Menunggu Pembayaran
                              <?php elseif ($pesanan->status_pesanan == 1 ): ?>
                                Menunggu Konfirmasi Admin
                              <?php elseif ($pesanan->status_pesanan == 2 ): ?>
                                Diproses
                              <?php elseif ($pesanan->status_pesanan == 3 ): ?>
                                Dikirim
                              <?php elseif ($pesanan->status_pesanan == 4 ): ?>
                                Selesai
                              <?php elseif ($pesanan->status_pesanan == 5 ): ?>
                                Batal
                              <?php endif ?>
                            </td>
                            <td>Rp.<?= number_format($pesanan->grandtotal,0,',',',') ?></td>
                            <td width="15%">
                                <a href="<?= base_url('admin/').$controller.'/detail/'.$pesanan->no_pesanan ?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</button></a>
                                <a href="<?= base_url('admin/').$controller.'/hapus/'.$pesanan->no_pesanan ?>" onclick="return confirm('Yakin Ingin Hapus data ?');"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a>
                            </td>
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