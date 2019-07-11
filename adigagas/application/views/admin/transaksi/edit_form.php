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
    <h1 class="h3 mb-2 text-gray-800">Edit Data Pegawai</h1>


    <!-- add form -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">

                    <a href="<?php echo site_url('admin/transaksi/view/'. $trans->id_transaksi) ?>"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
                <div class="card-body">

                    <form action="<?php base_url('admin/transaksi/edit') ?>" method="post" enctype="multipart/form-data">
                            <input class="<?php echo form_error('id_transaksi') ? 'is-invalid' : '' ?>" type="hidden" name="id_transaksi" value="<?= $trans->id_transaksi; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('id_transaksi') ?>
                            </div>
                            <input class="<?php echo form_error('id_pengguna') ? 'is-invalid' : '' ?>" type="hidden" name="id_pengguna" value="<?= $trans->id_pengguna; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('id_pengguna') ?>
                            </div>
                            <input class="<?php echo form_error('tanggal_transaksi') ? 'is-invalid' : '' ?>" type="hidden" name="tanggal_transaksi" value="<?= $trans->tanggal_transaksi; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('tanggal_transaksi') ?>
                            </div>
                            <input class="<?php echo form_error('total_harga') ? 'is-invalid' : '' ?>" type="hidden" name="total_harga" value="<?= $trans->total_harga; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('total_harga') ?>
                            </div>
                            <input class="<?php echo form_error('total_berat') ? 'is-invalid' : '' ?>" type="hidden" name="total_berat" value="<?= $trans->total_berat; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('total_berat') ?>
                            </div>
                            <input class="<?php echo form_error('id_alamat_kirim') ? 'is-invalid' : '' ?>" type="hidden" name="id_alamat_kirim" value="<?= $trans->id_alamat_kirim; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('id_alamat_kirim') ?>
                            </div>
                            <input class="<?php echo form_error('id_pengiriman') ? 'is-invalid' : '' ?>" type="hidden" name="id_pengiriman" value="<?= $trans->id_pengiriman; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('id_pengiriman') ?>
                            </div>
                            <div class="form-group">
                                <label for="id_status">Divisi</label><br>
                                <select class="form-control" name ="id_status" id ="id_status"  required>
                                    <option value="print">Terima Konfirmasi</option>
                                    <option value="fail">Tolak Konfirmasi</option>
                                    </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('id_status') ?>
                                </div>
                            </div>
                            
                            <input class="btn btn-success mr-3" type="submit" name="btn" value="Save" />
                            
                    </form>
                </div>
        </div>
        <!-- end add form -->

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