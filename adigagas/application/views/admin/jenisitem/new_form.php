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
          <h1 class="h3 mb-2 text-gray-800">Tambah Jenis Item</h1>
          
          <div class="row">
            <div class="col-lg-6">
              <!-- add form -->
              <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('admin/jenisitem/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">

                    <form action="<?php base_url('admin/jenisitem/add') ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="id">ID*</label>
                            <input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"type="text" name="id" placeholder="Jenis Item id" maxlength="10" />
                            <div class="invalid-feedback">
                                <?php echo form_error('id') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_jenis">nama_jenis*</label>
                            <input class="form-control <?php echo form_error('nama_jenis') ? 'is-invalid':'' ?>"type="text" name="nama_jenis" min="0" placeholder="Nama Jenis Item" maxlength="30"/>
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_jenis') ?>
                            </div>
                        </div>

                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
                    </form>
                </div>
              </div>
              <!-- end add form -->
            </div>

            <div class="col-lg-6">
            
            </div>
          </div>
          
			

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
