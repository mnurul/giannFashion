

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $order_baru ?></h3>

                <p>Order Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $order_berhasil ?></h3>

                <p>Order Berhasil</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jumlah_user ?></h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">Mor e info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jumlah_produk ?></h3>

                <p>Jumlah Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
      <!-- /.card -->

       <div class="row">
        <div class="col-lg-6">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Status Transaksi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="pieChart" style="height:230px"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <div class="col-lg-6">
          <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Statistik Transaksi 7 Hari Terakhir</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
         
       </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/layouts/js'); ?>
  <script src="<?php echo base_url('assets/backend/') ?>plugins/chart.js/Chart.min.js"></script>

  <script type="text/javascript">
    var donutData        = {
      labels: [
          'Belum Bayar', 
          'Menunggu Konfirmasi',
          'Diproses', 
          'Dikirim', 
          'Selesai', 
          'Batal', 
      ],
      datasets: [
        {
          data: [<?=  $belum_bayar ?>,<?=  $menunggu_konfirmasi ?>,<?=  $diproses ?>,<?=  $dikirim ?>,<?=  $selesai ?>,<?=  $batal ?>],
          backgroundColor : ['#d2d6de','#f39c12', '#3c8dbc', '#00c0ef', '#00a65a', '#f56954'],
        }
      ]
    }
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })



      var areaChartData = {
          labels  : [
            <?php foreach ($transaksi as $tr) {
              echo "'".date('Y-m-d',strtotime($tr->tgl_transaksi))."',";
            } ?>  
          ],
          datasets: [
            {
              label               : 'Penjualan',
              backgroundColor     : 'rgba(60,141,188,0.9)',
              borderColor         : 'rgba(60,141,188,0.8)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : [
              <?php foreach ($transaksi as $tr) {
                echo "'".$tr->total_penjualan."',";
              } ?>  
              ]
            }
          ]
        }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)

    var barChartOptions = {
      scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true,
                 userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return 'Rp.'+label;
                     }

                 },
             }
         }],
     },
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
  </script>