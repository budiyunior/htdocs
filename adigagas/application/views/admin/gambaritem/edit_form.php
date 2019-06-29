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
    <h1 class="h3 mb-2 text-gray-800">Edit Data Gambar</h1>


    <!-- add form -->
    <div class="row">
            <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">

            <a href="<?php echo site_url('admin/gambaritem/') ?>"><i class="fas fa-arrow-left"></i>
                Back</a>
        </div>
        <div class="card-body">

            <form action="<?php base_url('admin/gambaritem/edit') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_gambar" value="<?php echo $gambaritem->id_gambar ?>" />

                <div class="form-group">
                    <label for="id_item">ID Item</label>
                    <select class="form-control" <?php echo form_error('id_item') ? 'is-invalid' : '' ?> name="id_item" id="id_item" value="<?php echo $gambaritem->id_item ?>" required>
                        <option value="">--Pilih ID Item--</option>
                        <?php
                        $servername = "localhost";
                        $database = "custom_shirt";
                        $username = "root";
                        $password = "";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        $sql_item = mysqli_query($conn, "SELECT * FROM item") or die(mysqli_error($conn));
                        while ($data_item = mysqli_fetch_array($sql_item)) {
                            echo '<option value="' . $data_item['id_item'] . '">' . $data_item['nama_item'] . '</option>';
                        }
                        ?>
                    </select>                    
                    <div class="invalid-feedback">
                        <?php echo form_error('id_item') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_gambar">Nama Gambar</label>
                    <input class="form-control <?php echo form_error('nama_gambar') ? 'is-invalid' : '' ?>" type="text" name="nama_gambar" placeholder="" value="<?php echo $gambaritem->nama_gambar?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama_gambar') ?>
                    </div>
                </div>

                <div class="form-group">
					<label for="gambar">Gambar</label>
					<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar" />
					<input type="hidden" name="old_image" value="<?php echo $gambaritem->gambar ?>" />
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