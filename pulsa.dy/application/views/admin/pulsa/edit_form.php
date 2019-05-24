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
            <h1 class="h3 mb-2 text-gray-800">Edit Pengguna</h1>
            <p class="mb-4">Edit Product is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

            <!-- add form -->
            <div class="card mb-3">
                <div class="card-header">

                    <a href="<?php echo site_url('admin/client/') ?>"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
                <div class="card-body">

                    <form action="<?php base_url('admin/client/edit') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $pengguna->id_pengguna?>" />

                        <div class="form-group">
                            <label for="nama_pengguna">nama_pengguna*</label>
                            <input class="form-control <?php echo form_error('nama_pengguna') ? 'is-invalid':'' ?>"type="text" name="nama_pengguna" placeholder="Nama Pengguna" 
                                value="<?php echo $pengguna->nama_pengguna ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_pengguna') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_otoritas">id_otoritas*</label>
                            <input class="form-control <?php echo form_error('id_otoritas') ? 'is-invalid':'' ?>"type="number" name="id_otoritas" min="0" placeholder="ID Otoritas" 
                                value="<?php echo $pengguna->id_otoritas ?>"/>
                            <div class="invalid-feedback">
                                <?php echo form_error('id_otoritas') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">username*</label>
                            <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"name="username" placeholder="Username" 
                                value="<?php echo $pengguna->username ?>"/>
                            <div class="invalid-feedback">
                                <?php echo form_error('username') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">password*</label>
                            <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"type="password" name="password" placeholder="Nama Pengguna" 
                                value="<?php echo $pengguna->password ?>"/>
                            <div class="invalid-feedback">
                                <?php echo form_error('password') ?>
                            </div>
                        </div>
                        <!--  -->

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
