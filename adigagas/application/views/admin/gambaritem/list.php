<!-- Load View head, sidebar, dan navbar ada di Controler gaess -->
<!-- Tepatnya di _partials/spesialtop -->
<!-- saya pisah biar nama yang login tercantum di navabr gaes -->

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Gambar Item</h1>


	<!-- DataTales Example -->
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('admin/gambaritem/add') ?>"><i class="fas fa-plus"></i> Tambah Gambar Item</a>	
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Gambar</th>
							<th>ID Item</th>
							<th>Nama Gambar</th>
							<th>Gambar</th>

							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($gambaritem as $gambaritem) : ?>
							<tr>
								<td>
									<?php echo $gambaritem->id_gambar ?>
								</td>
								<td>
									<?php echo $gambaritem->id_item ?>
								</td>
								<td>
									<?php echo $gambaritem->nama_gambar ?>
								</td>
								<td>
									<?php echo $gambaritem->gambar ?>
								</td>
								<td width="250">
									<a href="<?php echo site_url('admin/item/edit/' . $gambaritem->id_gambar) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('admin/gambaritem/delete/' . $gambaritem->id_gambar) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="container-fluid">


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