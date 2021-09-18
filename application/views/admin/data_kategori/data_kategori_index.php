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
      <a href="<?= base_url('admin/').$controller.'/tambah' ?>"><button class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah Data</button></a>
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

      <div class="row">
        <div class="col-lg-7">
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
                               <th>Nama Kategori</th>
                               
                               <th>Aksi</th>
                            </tr>
                         </thead>
                         <tbody>
                          <?php $no=1; foreach ($semua_kategori as $kategori): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                               
                                  <td><?= $kategori->kategori_nama ?></td>
                                  <td width="25%">
                                      <a href="<?= base_url('admin/').$controller.'/edit/'.$kategori->kategori_id ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
                                      <a href="<?= base_url('admin/').$controller.'/hapus/'.$kategori->kategori_id ?>" onclick="return confirm('Yakin Ingin Hapus data ?');"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a>
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
        </div>
        
      </div>
      
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/layouts/js'); ?>