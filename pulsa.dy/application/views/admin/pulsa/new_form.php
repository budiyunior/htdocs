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

        <!-- Alert untuk mengetahui status transaksi -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('danger')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('danger'); ?>
            </div>
        <?php endif; ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Transaksi Pulsa</h1>
          <p class="mb-4">*lakukan transaksi dengan mengisi form dibadah ini</p>

          <!-- add form -->
          <div class="card mb-3">
            <div class="card-header">
                <a href="<?php echo site_url('admin/pulsa/') ?>"><i class="fas fa-arrow-left"></i> Laporan</a>
            </div>
            <div class="card-body">

                <form action="<?php base_url('admin/pulsa/add') ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="nama_plg">nama_plg*</label>
                        <input class="form-control" type="text" name="nama_plg" id="nama_plg" placeholder="Nama Pelanggan" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_plg') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor">nomor*</label>
                        <input class="form-control" type="text" name="nomor" id="nomor" placeholder="Nomor HP" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nomor') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nominal">nominal*</label>
                        <input class="form-control" type="nimber" name="nominal" id="nominal" placeholder="Nominal" />
                        <div class="invalid-feedback">
                            <?php echo form_error('nominal') ?>
                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" name="btn" id="save" value="Save" />
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
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
