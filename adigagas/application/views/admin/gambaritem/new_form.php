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

          <h1 class="h3 mb-2 text-gray-800">Tambah Data Gambar</h1>

          <!-- add form -->
          <div class="row">
            <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                <a href="<?php echo site_url('admin/gambaritem/') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
            </div>
            <div class="card-body">

                <form action="<?php base_url('admin/gambaritem/add') ?>" method="post" enctype="multipart/form-data" >

                <div class="form-group">
                        <label for="id_gambar">ID Gambar</label>
                        <input class="form-control <?php echo form_error('id_gambar') ? 'is-invalid':'' ?>"type="text" name="id_gambar" placeholder="ID Gambar" />
                        <div class="invalid-feedback">
                            <?php echo form_error('id_gambar') ?>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="id_item">ID Item</label><br>
                        <select class="form-control" name ="id_item" id ="id_item"  required>
                          <option value="">--Pilih ID Item--</option>
                          <?php
                          $servername = "localhost";
                          $database = "custom_shirt";
                          $username = "root";
                          $password = "";
                          $conn = mysqli_connect($servername, $username, $password, $database);
                          $sql_item = mysqli_query($conn, "SELECT * FROM  item") or die (mysqli_error($conn));
                          while($data_item = mysqli_fetch_array($sql_item)){
                            echo '<option value="'.$data_item['id_item'].'">'.$data_item['id_item'].'</option>';
                          }
                          ?></select>
                        <div class="invalid-feedback">
                            <?php echo form_error('id_item') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_gambar">Nama Gambar</label>
                        <input class="form-control <?php echo form_error('nama_gambar') ? 'is-invalid':'' ?>"type="text" name="nama_gambar" placeholder="Nama Gambar" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_gambar') ?>
                        </div>
                    </div>

                    <div class="form-group">
								        <label for="gambar">Gambar</label>
								        <input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar" />
							        	<div class="invalid-feedback">
								          	<?php echo form_error('gambar') ?>
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
