<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <!-- <a href="<?php echo base_url('assets/backend/') ?>index3.html" class="brand-link">
   <img src="<?php echo base_url('assets/backend/') ?>dist/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: .8">
   <span class="brand-text font-weight-light">Percetakan</span>
   </a> -->
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="<?php echo base_url('assets/img/admin/') ?><?= $this->session->userdata('admin_gambar'); ?>" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('admin_nama'); ?></a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/data-pemesanan') ?>" class="nav-link">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>
                     Data Pesanan
                  </p>
               </a>
            </li>

            <!-- <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/') ?>" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-wave-alt"></i>
                  <p>
                     Konfirmasi Pembayaran
                  </p>
               </a>
            </li> -->

            <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/data-testimoni') ?>" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                     Testimoni
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/tentang-kami') ?>" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>
                     Tentang Kami
                  </p>
               </a>
            </li>

            <li class="nav-item has-treeview ">
               <a href="#" class="nav-link nl2">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Master Data
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right">4</span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/data-pelanggan') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Pelanggan</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="<?= base_url('admin/data-produk') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Produk</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="<?= base_url('admin/data-kategori') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Kategori</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('admin/data-admin') ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Admin</p>
                     </a>
                  </li>

               </ul>
            </li>

            <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/laporan-transaksi') ?>" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                     Laporan Transaksi
                  </p>
               </a>
            </li>


            <li class="nav-item">
               <a class="nav-link " href="<?= base_url('admin/login/logout') ?>" class="nav-link">
                  <i class="nav-icon fa fa-sign-out-alt"></i>
                  <p>
                     Keluar
                  </p>
               </a>
            </li>

         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>