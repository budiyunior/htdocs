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

            <a href="<?php echo site_url('admin/pegawai/') ?>"><i class="fas fa-arrow-left"></i>
                Back</a>
        </div>
        <div class="card-body">

            <form action="<?php base_url('admin/pegawai/edit') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_pengguna" value="<?php echo $pegawai->id_pengguna ?>" />

                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input class="form-control <?php echo form_error('nama_pengguna') ? 'is-invalid' : '' ?>" type="text" name="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo $pegawai->nama_pengguna ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nama_pengguna') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" type="date" name="tanggal_lahir" placeholder="" value="<?php echo $pegawai->tanggal_lahir ?>" />
                    <div class="invalid-feedback">
                        <?php echo form_error('tanggal_lahir') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_akses">ID Akses</label><br>
                    <select class="form-control" <?php echo form_error('id_akses') ? 'is-invalid' : '' ?> name="id_akses" id="id_akses" value="<?php echo $pegawai->id_akses ?>" required>
                        <option value="">--Pilih ID Akses--</option>
                        <?php
                        $servername = "localhost";
                        $database = "custom_shirt";
                        $username = "root";
                        $password = "";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        $sql_akses = mysqli_query($conn, "SELECT * FROM hak_akses WHERE id_akses != 'ctm'") or die(mysqli_error($conn));
                        while ($data_akses = mysqli_fetch_array($sql_akses)) {
                            echo '<option value="' . $data_akses['id_akses'] . '">' . $data_akses['nama_akses'] . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo form_error('id_akses') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="" readonly value="<?php echo $pegawai->email ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('email') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password" placeholder="" readonly value="<?php echo $pegawai->password ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nomor_telp">Nomor Telp</label>
                    <input class="form-control <?php echo form_error('nomor_telp') ? 'is-invalid' : '' ?>" type="text" name="nomor_telp" placeholder="" value="<?php echo $pegawai->nomor_telp ?>" maxlength="13" />
                    <div class="invalid-feedback">
                        <?php echo form_error('nomor_telp') ?>
                    </div>
                </div>

                <div class="form-group">
					<label for="foto">Foto</label>
					<input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>" type="file" name="foto" />
					<input type="hidden" name="old_image" value="<?php echo $pegawai->foto ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('foto') ?>
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