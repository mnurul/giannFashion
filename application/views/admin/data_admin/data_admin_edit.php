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
              <form class="form-horizontal" action="<?= base_url('admin/').$controller.'/update/'.$data_admin->adminid ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Kode Admin :</label>
                      <input type="hidden" class="form-control" id="" value="<?= $data_admin->adminid ?>" placeholder="" name="adminid" readonly="" required>
                      <input type="text" class="form-control" id="" value="<?= $data_admin->admin_kode ?>" placeholder="" name="admin_kode" readonly="" required>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nama :</label>
                      <input type="text" class="form-control" id="" name="admin_nama" placeholder="Masukkan Nama" value="<?= $data_admin->admin_nama ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                      <input type="password" class="form-control" name="admin_password" id="inputPassword3" placeholder="Masukkan Password" >
                      <small>Jangan diisi jika password tidak dirubah</small>
                  </div>
                  
                  <div class="form-group">
                      <label>Upload Image</label>
                      <img src="<?= base_url('assets/img/admin/').$data_admin->admin_gambar ?>" id='img-upload'/>

                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse… <input type="file" name="admin_gambar" id="imgInp" >
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