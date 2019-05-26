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
            <h1 class="h3 mb-2 text-gray-800">Edit jenisitem</h1>
            <p class="mb-4">Edit jenisitem is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

            <!-- add form -->
            <div class="card mb-3">
                <div class="card-header">

                    <a href="<?php echo site_url('admin/jenisitem/') ?>"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
                <div class="card-body">

                    <form action="<?php base_url('admin/jenisitem/edit') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $jenisitem->jenisitem_id?>" />

                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
                                type="text" name="name" placeholder="jenisitem name" value="<?php echo $jenisitem->name ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('name') ?>
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
