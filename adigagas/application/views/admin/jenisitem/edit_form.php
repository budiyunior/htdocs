<!-- Load View head, sidebar, dan navbar ada di Controler gaess -->
<!-- Tepatnya di _partials/spesialtop -->
<!-- saya pisah biar nama yang login tercantum di navabr gaes -->
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Jenis Item</h1>

    <!-- add form -->
    <div class="card mb-3">
        <div class="card-header">

            <a href="<?php echo site_url('admin/jenisitem/') ?>"><i class="fas fa-arrow-left"></i>
                Back</a>
        </div>
        <div class="card-body">

            <form action="<?php base_url('admin/jenisitem/edit') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $jenisitem->id_jenis_item ?>" />

                <div class="form-group">
                    <label for="id">Jenis Jenis*</label>
                    <input class="form-control <?php echo form_error('id') ? 'is-invalid' : '' ?>" type="text" id="id" placeholder="jenisitem id" value="<?php echo $jenisitem->id_jenis_item ?>" disabled />
                    <div class="invalid-feedback">
                        <?php echo form_error('id') ?>
                    </div>

                    <label for="nama_jenis">Nama Jenis*</label>
                    <input class="form-control disabled <?php echo form_error('nama_jenis') ? 'is-invalid' : '' ?>" type="text" name="nama_jenis" placeholder="jenisitem nama_jenis" value="<?php echo $jenisitem->nama_jenis ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama_jenis') ?>
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