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
        Menu Utama
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengguna</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengguna</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'list' ? 'active': '' ?>" href="<?php echo site_url('admin/pengguna') ?>">Pegawai</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'list' ? 'active': '' ?>" href="#">Pelanggan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - CRUD Pengguna -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'list' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/pengguna') ?>">
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

    <!-- Divider -->
    <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        TABLE TRANSAKSI
      </div>

      <!-- Nav Item - Transaksi konfirmasi pembayaran -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Konfirmasi Pembayaran</span>
        </a>
      </li>

      <!-- Nav Item - Transaksi list pemesanan -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>List Pemesanan</span>
        </a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        TABLE LAPORAN
      </div>

      <!-- Nav Item - TLaporan -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
      <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Laporan Penjualan</span>
        </a>
      </li>

    </ul>
    <!-- End of Sidebar -->