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
					<h1 class="h3 mb-2 text-gray-800">Provider dan Pulsa</h1>
					<p class="mb-4">Menampilkan semua pengguna seperti admin dan client</p>

					<div class="row">
						<div class="col-xl-6">
							<!-- DataTales Example -->
							<div class="container">
								<h3>Provider</h3>
								<div class="card mb-3">
									<div class="card-header">
										<a href="<?php echo site_url('admin/client/add') ?>"><i class="fas fa-plus"></i> Add New</a>
									</div>
									<div class="card-body">

										<div class="table-responsive">
											<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>ID</th>
														<th>Nama Provider</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($provider as $provider): ?>
													<tr>
														<td width="150">
															<?php echo $provider->id_provider ?>
														</td>
														<td>
															<?php echo $provider->nama_provider ?>
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
						</div>
						
						<div class="col-xl-6">
							<!-- DataTales Example -->
							<h3>Paket Pulsa</h3>
							<div class="card mb-3">
								<div class="card-header">
									<a href="<?php echo site_url('admin/paket/add') ?>"><i class="fas fa-plus"></i> Add New</a>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>ID</th>
													<th>Provider</th>
													<th>Nominal</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($paket_pulsa as $paket_pulsa): ?>
												<tr>
													<td width="150">
														<?php echo $paket_pulsa->id_paket ?>
													</td>
													<td>
														<?php echo $paket_pulsa->nama_provider ?>
													</td>
													<td>
														Rp. <?php echo $paket_pulsa->nominal ?>
													</td>
													<td width="250">
														<a href="<?php echo site_url('admin/paket/edit/'.$paket_pulsa->id_paket) ?>"class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
														<a onclick="deleteConfirm('<?php echo site_url('admin/paket/delete/'.$paket_pulsa->id_paket) ?>')"href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
													</td>
												</tr>
												<?php endforeach; ?>

											</tbody>
										</table>
									</div>
								</div>
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
