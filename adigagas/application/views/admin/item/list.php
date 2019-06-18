<!-- Load View head, sidebar, dan navbar ada di Controler gaess -->
<!-- Tepatnya di _partials/spesialtop -->
<!-- saya pisah biar nama yang login tercantum di navabr gaes -->

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800"> Item</h1>


	<!-- DataTales Example -->
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('admin/item/add') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Item</th>
							<th>ID Pengguna</th>
							<th>Nama Item</th>
							<th>ID Jenis Item</th>
							<th>Harga Satuan</th>
							<th>Berat Satuan</th>
							<th>Deskripsi</th>

							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($item as $item) : ?>
							<tr>
								<td>
									<?php echo $item->id_item ?>
								</td>
								<td>
									<?php echo $item->id_pengguna ?>
								</td>
								<td>
									<?php echo $item->nama_item ?>
								</td>
								<td>
									<?php echo $item->id_jenis_item ?>
								</td>
								<td>
									<?php echo $item->harga_satuan ?>
								</td>
								<td>
									<?php echo $item->berat_satuan ?>
								</td>
								<td>
									<?php echo $item->deskripsi ?>
								</td>
								<td width="250">
									<a href="<?php echo site_url('admin/item/edit/' . $item->id_item) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('admin/item/delete/' . $item->id_item) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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