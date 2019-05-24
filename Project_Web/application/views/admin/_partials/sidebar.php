<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CUSTOM OUTFIT</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
  
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        TABLE
      </div>

      <!-- Nav Item - Transaksi -->
      <li class="nav-item <?php echo $this->uri->segment(2) == 'overview' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="<?php echo site_url('buttons') ?>">Buttons</a>
            <a class="collapse-item" href="<?php echo site_url('cards') ?>">Cards</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Order list -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Order List</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="<?php echo site_url('utilities-color') ?>">Colors</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="<?php echo site_url('utilities-border') ?>">Borders</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-animaton' ? 'active': '' ?>" href="<?php echo site_url('utilities-animation') ?>">Animations</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-other' ? 'active': '' ?>" href="<?php echo site_url('utilities-other') ?>">Other</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Desain Pengguna -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Desain Pengguna</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="<?php echo site_url('utilities-color') ?>">Colors</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="<?php echo site_url('utilities-border') ?>">Borders</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-animaton' ? 'active': '' ?>" href="<?php echo site_url('utilities-animation') ?>">Animations</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-other' ? 'active': '' ?>" href="<?php echo site_url('utilities-other') ?>">Other</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Data Pembeli Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Pembeli / User</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="<?php echo site_url('utilities-color') ?>">Colors</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="<?php echo site_url('utilities-border') ?>">Borders</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-animaton' ? 'active': '' ?>" href="<?php echo site_url('utilities-animation') ?>">Animations</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-other' ? 'active': '' ?>" href="<?php echo site_url('utilities-other') ?>">Other</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - List Kumpulan Data Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>List Kumpulan Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="<?php echo site_url('utilities-color') ?>">Colors</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="<?php echo site_url('utilities-border') ?>">Borders</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-animaton' ? 'active': '' ?>" href="<?php echo site_url('utilities-animation') ?>">Animations</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-other' ? 'active': '' ?>" href="<?php echo site_url('utilities-other') ?>">Other</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Alamat -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Alamat</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-color' ? 'active': '' ?>" href="<?php echo site_url('utilities-color') ?>">Colors</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-border' ? 'active': '' ?>" href="<?php echo site_url('utilities-border') ?>">Borders</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-animaton' ? 'active': '' ?>" href="<?php echo site_url('utilities-animation') ?>">Animations</a>
            <a class="collapse-item <?php echo $this->uri->segment(2) == 'utilities-other' ? 'active': '' ?>" href="<?php echo site_url('utilities-other') ?>">Other</a>
          </div>
        </div>
      </li>

     

    </ul>
    <!-- End of Sidebar -->