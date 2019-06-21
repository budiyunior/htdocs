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

          <div class="input-group-append">
                <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus fa-sm"></i>
                </button>
            </div> <br>

          <h1 class="h3 mb-2 text-gray-800">Tambah Data Item</h1>

          <!-- add form -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                <a href="<?php echo site_url('admin/item/') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
            </div>
            <div class="card-body">

                <form action="<?php base_url('admin/item/add') ?>" method="post" enctype="multipart/form-data" >

                <div class="form-group">
                        <label for="id_item">ID Item</label>
                        <input class="form-control <?php echo form_error('id_item') ? 'is-invalid':'' ?>"type="text" name="id_item" placeholder="ID Item" />
                        <div class="invalid-feedback">
                            <?php echo form_error('id_item') ?>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="id_pengguna">ID Pengguna</label><br>
                        <select class="form-control" name ="id_pengguna" id ="id_pengguna"  required>
                          <option value="">--Pilih ID Pengguna--</option>
                          <?php
                          $servername = "localhost";
                          $database = "custom_shirt";
                          $username = "root";
                          $password = "";
                          $conn = mysqli_connect($servername, $username, $password, $database);
                          $sql_pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna !='ctm'") or die (mysqli_error($conn));
                          while($data_pengguna = mysqli_fetch_array($sql_pengguna)){
                            echo '<option value="'.$data_pengguna['id_pengguna'].'">'.$data_pengguna['nama_pengguna'].'</option>';
                          }
                          ?></select>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_pengguna') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_item">Nama Item</label>
                        <input class="form-control <?php echo form_error('nama_item') ? 'is-invalid':'' ?>"type="text" name="nama_item" placeholder="Nama Item" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_item') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_jenis_item">ID Jenis Item</label><br>
                        <select class="form-control" name ="id" id ="id_jenis_item"  required>
                          <option value="">--Pilih ID Jenis Item--</option>
                          <?php
                          $servername = "localhost";
                          $database = "custom_shirt";
                          $username = "root";
                          $password = "";
                          $conn = mysqli_connect($servername, $username, $password, $database);
                          $sql_akses = mysqli_query($conn, "SELECT * FROM jenis_item") or die (mysqli_error($conn));
                          while($data_akses = mysqli_fetch_array($sql_akses)){
                            echo '<option value="'.$data_akses['id_jenis_item'].'">'.$data_akses['nama_jenis'].'</option>';
                          }
                          ?></select>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_jenis_item') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"type="text" name="harga_satuan" placeholder="Harga Satuan" maxlength ="64" />
                        <div class="invalid-feedback">
                            <?php echo form_error('harga_satuan') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="berat_satuan">Berat Satuan</label>
                        <input class="form-control <?php echo form_error('berat_satuan') ? 'is-invalid':'' ?>"type="text" name="berat_satuan" placeholder="Berat Satuan" maxlength ="64" />
                        <div class="invalid-feedback">
                            <?php echo form_error('berat_satuan') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"type="text" name="deskripsi" placeholder="Deskripsi" maxlength ="13"/>
                        <div class="invalid-feedback">
                            <?php echo form_error('deskripsi') ?>
                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                </form>
            </div>
        </div>

            <div id="tambah" class="modal fade" role="dialog">
              <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="gambar">Gambar Item</label>
                                <input type="file" name="gambar" class="form-control" id="gambar" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type ="reset" class="btn btn-danger">Cancel</button>
                          <button type ="submit" class="btn btn-success" name="tambah" value="Simpan">Simpan</button>
                        </div>
                    </form>
                  </div>
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
