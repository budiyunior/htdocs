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
            <h1 class="h3 mb-2 text-gray-800">Edit Data Pengguna</h1>
            <p class="mb-4"><a target="_blank" href=""></a>.</p>

            <!-- add form -->
            <div class="card mb-3">
                <div class="card-header">

                    <a href="<?php echo site_url('admin/pengguna/') ?>"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
                <div class="card-body">

                    <form action="<?php base_url('admin/pengguna/edit') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_pengguna" value="<?php echo $pengguna->id_pengguna?>" />

                        <div class="form-group">
                            <label for="nama_pengguna">Nama Pengguna</label>
                            <input class="form-control <?php echo form_error('nama_pengguna') ? 'is-invalid':'' ?>"
                                type="text" name="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo $pengguna->nama_pengguna?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_pengguna') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>"
                                type="text" name="tanggal_lahir" min="0" placeholder="Tanggal Lahir" value="<?php echo $pengguna->tanggal_lahir ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('tanggal_lahir') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="id_akses">ID Akses</label>
                            <input class="form-control <?php echo form_error('id_akses') ? 'is-invalid':'' ?>"
                                type="text" name="id_akses" min="0" placeholder="ID Akses" value="<?php echo $pengguna->id_akses ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('id_akses') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
                                type="text" name="email" min="0" placeholder="Email" value="<?php echo $pengguna->email ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('email') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
                                type="text" name="password" min="0" placeholder="Password" value="<?php echo $pengguna->password ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('password') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomor_telp">Nomor Telp</label>
                            <input class="form-control <?php echo form_error('nomor_telp') ? 'is-invalid':'' ?>"
                                type="text" name="nomor_telp" min="0" placeholder="Nomor Telp" value="<?php echo $pengguna->nomor_telp ?>" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nomor_telp') ?>
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
