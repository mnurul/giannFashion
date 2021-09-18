
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/backend/') ?>dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/backend/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/backend/') ?>plugins/datatables/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
jQuery(function($) {
     var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
     $('ul a').each(function() {
      if (this.href === path || this.href+'/tambah' === path || this.href+'/edit/<?php echo $this->uri->segment('4') ?>' === path ) {
       $(this).addClass('active');
       $(this).parent().parent().parent().addClass('menu-open');
       // $(this).parent().parent().parent().finda(.addClass('active');
      }
     });
 });
</script>
<script>
  $(function () {
    $("#data-tables").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>