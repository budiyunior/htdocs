<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Pegawai</h1>
          

          <!-- add form -->
          <div class="card mb-3">
            <div class="card-header">
                <a href="<?php echo site_url('admin/pegawai/') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
            </div>
            <div class="card-body">

                <form action="<?php base_url('admin/pegawai/add') ?>" method="post" enctype="multipart/form-data" >

                    <div class="form-group">
                        <label for="nama_pengguna">Nama Pengguna</label>
                        <input class="form-control <?php echo form_error('nama_pengguna') ? 'is-invalid':'' ?>"type="text" name="nama_pengguna" placeholder="Nama Pengguna" maxlength="64" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_pengguna') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>"type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" />
                        <div class="invalid-feedback">
                            <?php echo form_error('tanggal_lahir') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_akses">ID Akses</label><br>
                        <select class="form-control" name ="id_akses" id ="id_akses"  required>
                          <option value="">--Pilih ID Akses--</option>
                          <?php
                          $servername = "localhost";
                          $database = "custom_shirt";
                          $username = "root";
                          $password = "";
                          $conn = mysqli_connect($servername, $username, $password, $database);
                          $sql_akses = mysqli_query($conn, "SELECT * FROM hak_akses") or die (mysqli_error($conn));
                          while($data_akses = mysqli_fetch_array($sql_akses)){
                            echo '<option value="'.$data_akses['id_akses'].'">'.$data_akses['id_akses'].'</option>';
                          }
                          ?></select>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_akses') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"type="text" name="email" placeholder="Email" maxlength ="64" />
                        <div class="invalid-feedback">
                            <?php echo form_error('email') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"type="text" name="password" placeholder="Password" maxlength ="64" />
                        <div class="invalid-feedback">
                            <?php echo form_error('password') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor_telp">Nomor Telp</label>
                        <input class="form-control <?php echo form_error('nomor_telp') ? 'is-invalid':'' ?>"type="text" name="nomor_telp" placeholder="Nomor Telp" maxlength ="13"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('nomor_telp') ?>
                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                </form>
            </div>
        </div>
          <!-- end add form -->
			

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
