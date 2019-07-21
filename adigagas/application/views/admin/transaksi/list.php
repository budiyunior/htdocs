<!-- Load View head, sidebar, dan navbar ada di Controler gaess -->
<!-- Tepatnya di _partials/spesialtop -->
<!-- saya pisah biar nama yang login tercantum di navabr gaes -->

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>


	<!-- DataTales Example -->
	<div class="card mb-3">
		<div class="card-header">
			List Transaksi
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID Transaksi</th>
							<th>ID Pengguna</th>
							<th>Tanggal</th>
							<th>Jumlah Harus Dibayar</th>
							<th>To</th>
							<th>Via</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($transaksi as $transaksi) : ?>
							<tr>
								<td>
									<?php echo $transaksi->id_transaksi ?>
								</td>
								<td>
									<?php echo $transaksi->id_pengguna ?>
								</td>
								<td>
									<?php echo $transaksi->tanggal_transaksi ?>
								</td>
								<td>
									<?php echo 'Rp. '.number_format($transaksi->total_harga,2,',','.') ?>
								</td>
								<td>
									<?php echo $transaksi->nama_provinsi.", ".$transaksi->nama_kota." (".$transaksi->kode_pos.")" ?>
								</td>
								<td>
									<?php echo $transaksi->nama_ekspedis ?>
								</td>
								<td>
									<?php echo $transaksi->nama_status ?>
								</td>
								<td width="120">
									<a href="<?php echo site_url('admin/transaksi/view/' . $transaksi->id_transaksi) ?>" class="btn btn-small text-primary"><i class="fas fa-info-circle"></i> Detail</a>
									<?php if($transaksi->id_status == "maked" ) : ?>
										<i class="text-warning fas fa-exclamation-circle" ></i>
									<?php elseif($transaksi->id_status == "fail" ) : ?>
										<i class="text-danger fas fa-times-circle" ></i>
									<?php elseif($transaksi->id_status == "done") :?>
										<i class="text-success fas fa-check-circle" ></i>
									<?php else : ?>
										<i class="text-gray-500 fas fa-spinner" ></i>
									<?php endif ?>
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