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

				<!-- Page Heading -->
				<h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
				<p class="mb-4">Menampilkan semua pengguna seperti admin dan client</p>

				<!-- DataTales Example -->
					<div class="card mb-3">
						<div class="card-header">
							<a href="<?php echo site_url('admin/client/add') ?>"><i class="fas fa-plus"></i> Add New</a>
						</div>
						<div class="card-body">

							<div class="table-responsive">
								<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Nama</th>
											<th>otoritas</th>
											<th>username</th>
											<th>password</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($pengguna as $pengguna): ?>
										<tr>
											<td width="150">
												<?php echo $pengguna->nama_pengguna ?>
											</td>
											<td>
												<?php echo $pengguna->id_otoritas ?>
											</td>
											<td>
												<?php echo $pengguna->username ?>
											</td>
											<td>
												<?php echo $pengguna->password ?>
											</td>
											<td width="250">
												<a href="<?php echo site_url('admin/client/edit/'.$pengguna->id_pengguna) ?>"class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/client/delete/'.$pengguna->id_pengguna) ?>')"href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
		function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
		}
	</script>

</body>

</html>
