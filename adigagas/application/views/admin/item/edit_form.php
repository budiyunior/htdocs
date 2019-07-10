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
    <h1 class="h3 mb-2 text-gray-800">Edit Data Item</h1>


    <!-- add form -->
    <div class="row">
            <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">

            <a href="<?php echo site_url('admin/item/') ?>"><i class="fas fa-arrow-left"></i>
                Back</a>
        </div>
        <div class="card-body">

            <form action="<?php base_url('admin/item/edit') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_item" value="<?php echo $item->id_item ?>" />

                <div class="form-group">
                    <label for="nama_item">Nama Item</label>
                    <input class="form-control <?php echo form_error('nama_item') ? 'is-invalid' : '' ?>" type="text" name="nama_item" placeholder="" value="<?php echo $item->nama_item ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama_item') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_jenis_item">ID Jenis Item</label><br>
                    <select class="form-control" <?php echo form_error('id_jenis_akses') ? 'is-invalid' : '' ?> name="id" id="id_jenis_akses" value="<?php echo $item->id_jenis_item ?>" required>
                        <option value="">--Pilih ID Jenis Item--</option>
                        <?php
                        $servername = "localhost";
                        $database = "custom_shirt";
                        $username = "root";
                        $password = "";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        $sql_akses = mysqli_query($conn, "SELECT * FROM jenis_item") or die(mysqli_error($conn));
                        while ($data_akses = mysqli_fetch_array($sql_akses)) {
                            echo '<option value="' . $data_akses['id_jenis_item'] . '">' . $data_akses['nama_jenis'] . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo form_error('id_jenis_item') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid' : '' ?>" type="text" name="harga_satuan" placeholder="" value="<?php echo $item->harga_satuan ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('harga_satuan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="berat_satuan">Berat Satuan</label>
                    <input class="form-control <?php echo form_error('berat_satuan') ? 'is-invalid' : '' ?>" type="text" name="berat_satuan" placeholder="" value="<?php echo $item->berat_satuan ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('berat_satuan') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input class="form-control <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?>" type="text" name="deskripsi" placeholder="" value="<?php echo $item->deskripsi ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('deskripsi') ?>
                    </div>
                </div>

                <div class="form-group">
					<label for="gambar">Foto</label>
					<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar" />
					<input type="hidden" name="old_image" value="<?php echo $item->gambar ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('gambar') ?>
					</div>
				</div>


                <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>

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