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
      
      <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $sub_title ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="<?= base_url('admin/').$controller.'/update/'.$data_edit->produkid ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Kode Produk :</label>
                      <input type="text" class="form-control" id="" value="<?= $data_edit->produk_kode ?>" placeholder="" name="produk_kode" readonly="" required>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nama Produk :</label>
                      <input type="text" class="form-control" id="" name="produk_nama" placeholder="Masukkan Nama Produk"  value="<?= $data_edit->produk_nama ?>"  required>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control select2" name="kategori_id" style="width: 100%;" required>
                      <option value="">-Pilih Kategori</option>
                      <?php foreach ($data_kategori as $kategori): ?>
                        <option <?= $data_edit->kategori_id == $kategori->kategori_id ? 'selected=selected' : '';  ?>  value="<?= $kategori->kategori_id ?>"><?= $kategori->kategori_nama ?></option>
                      <?php endforeach ?>                      
                       
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Harga Produk (Rp):</label>
                      <input type="number" class="form-control" id="" value="<?= $data_edit->produk_harga ?>"  name="produk_harga" placeholder="Masukkan Harga Produk"  required>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Berat Produk (Gram):</label>
                      <input type="number" class="form-control" id="" value="<?= $data_edit->produk_berat ?>"  name="produk_berat" placeholder="Masukkan Berat Produk"  required>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Deskripsi Produk :</label>
                    <textarea class="form-control" rows="5" name="produk_deskripsi"><?= $data_edit->produk_deskripsi ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Produk Status</label>
                    <select class="form-control select2" name="produk_status" style="width: 100%;" required>
                      <option <?= $data_edit->produk_status == 1 ? 'selected=selected' : '';?> value="1">Aktif</option>
                      <option <?= $data_edit->produk_status == 0 ? 'selected=selected' : '';?> value="0">Tidak Aktif</option>
                       
                    </select>
                  </div>
                  
                  <div class="form-group">
                      <label>Gambar Produk</label>
                      <img src="<?= base_url('assets/img/produk/') ?><?= $data_edit->produk_gambar ?>" id='img-upload'/>

                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse… <input type="file" name="produk_gambar" id="imgInp" >
                              </span>
                          </span>
                          <input type="text" name="" class="form-control" readonly>
                      </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                     <a href="<?= base_url('admin/'.$controller) ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                  </div>
                  
               
              </form>
            </div>
            
          </div>
        
      </div>
    
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<?php $this->load->view('admin/layouts/js'); ?>

 
<script type="text/javascript">
  $(document).ready( function() {

    $('.select2').select2();
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
</script>