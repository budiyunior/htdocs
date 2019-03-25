<!-- Sidebar -->
<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?= site_url("admin") ?>"">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="<?= site_url("login") ?>">Login</a>
            <a class="dropdown-item" href="<?= site_url("register") ?>">Register</a>
            <a class="dropdown-item" href="<?= site_url("forgot") ?>">Forgot Password</a>
            <div class="dropdown-divider"></div>
            
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url("charts") ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url("tables") ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>