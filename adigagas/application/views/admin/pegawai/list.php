<!-- Load View head, sidebar, dan navbar ada di Controler gaess -->
<!-- Tepatnya di _partials/spesialtop -->
<!-- saya pisah biar nama yang login tercantum di navabr gaes -->

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>


	<!-- DataTales Example -->
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('admin/pegawai/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Pengguna</th>
							<th>Nama Pengguna</th>
							<th>Tanggal Lahir</th>
							<th>ID Akses</th>
							<th>Email</th>
							<th>Nomor Telp</th>
							<th>Foto</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pegawai as $pegawai) : ?>
							<tr>
								<td>
									<?php echo $pegawai->id_pengguna ?>
								</td>
								<td width="150">
									<?php echo $pegawai->nama_pengguna ?>
								</td>
								<td>
									<?php echo $pegawai->tanggal_lahir ?>
								</td>
								<td>
									<?php echo $pegawai->id_akses ?>
								</td>
								<td>
									<?php echo $pegawai->email ?>
								</td>
								<td>
									<?php echo $pegawai->nomor_telp ?>
								</td>
								<td>
									<?php echo $pegawai->foto ?>
								</td>

								<td width="250">
									<a href="<?php echo site_url('admin/pegawai/edit/' . $pegawai->id_pengguna) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('admin/pegawai/delete/' . $pegawai->id_pengguna) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>
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
<script>
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>

</body>

</html>