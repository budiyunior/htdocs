<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-tshirt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Custom Shirt</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-wallet"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-tshirt"></i>
          <span>Item</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Item:</h6>
            <a class="collapse-item" href="#">Item</a>
            <a class="collapse-item" href="<?php echo site_url('admin/jenisitem/index') ?>">Jenis Item</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Pengguna" aria-expanded="true" aria-controls="Pengguna">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengguna</span>
        </a>
        <div id="Pengguna" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengguna:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="<?php echo site_url('admin/pegawai/index') ?>">Pegawai</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="<?php echo site_url('admin/pelanggan/index') ?>">Pelanggan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Laporan" aria-expanded="true" aria-controls="Laporan">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan</span>
        </a>
        <div id="Laporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Penjualan:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="#">ALL</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="#">Tahunan</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="#">Bulanan</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="#">Mingguan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->