<!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CUSTOM SHIRT</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
  
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        TABLE CRUD
      </div>

      <!-- Nav Item - CRUD Pengguna -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengguna</span>
        </a>
      </li>

       <!-- Nav Item - CRUD Item -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Item</span>
        </a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        TABLE TRANSAKSI
      </div>

      <!-- Nav Item - Transaksi konfirmasi pembayaran -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Konfirmasi Pembayaran</span>
        </a>
      </li>

       <!-- Nav Item - Transaksi list pemesanan -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>List Pemesanan</span>
        </a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        TABLE LAPORAN
      </div>

      <!-- Nav Item - TLaporan penjualan -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan Penjualan</span>
        </a>
      </li>

    </ul>
    <!-- End of Sidebar -->