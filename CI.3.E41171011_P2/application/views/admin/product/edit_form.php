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
          <h1 class="h3 mb-2 text-gray-800">Edit Product</h1>
          <p class="mb-4">Edit Product is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- add form -->
          <div class="card mb-3">
            <div class="card-header">

                <a href="<?php echo site_url('admin/product/') ?>"><i class="fas fa-arrow-left"></i>
                    Back</a>
            </div>
            <div class="card-body">

                <form action="<?php base_url('admin/product/edit') ?>" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $product->product_id?>" />

                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
                            type="text" name="name" placeholder="Product name" value="<?php echo $product->name ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('name') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
                            type="number" name="price" min="0" placeholder="Product price" value="<?php echo $product->price ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('price') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name">Photo</label>
                        <input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
                            type="file" name="image" />
                        <input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('image') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Description*</label>
                        <textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
                            name="description" placeholder="Product description..."><?php echo $product->description ?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('description') ?>
                        </div>
                    </div>

                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                </form>

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
