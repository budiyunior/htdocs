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
	<h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1>


	<!-- DataTales Example -->
	<div class="card mb-3">
		<div class="card-header">
            <a href="<?php echo site_url('admin/transaksi/') ?>"><i class="fas fa-arrow-left"></i>Kembali</a>
		</div>
		<div class="card-body">

			<div class="row mx-2">
				<table>
					<?php foreach ($trans as $trans) : ?>
						<tr>
							<td>ID Transaksi</td>
							<td> : </td>
							<td>
								<?php echo $trans->id_transaksi ?>
							</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td> : </td>
							<td>
								<?php echo $trans->tanggal_transaksi ?>
							</td>
						</tr>
						<tr>
							<td>Status</td>
							<td> : </td>
							<td>
								<?php echo $trans->nama_status ?>
							</td>
						</tr>
					
				</table>
			</div>

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Nama Desain</th>
							<th>Deskripi</th>
							<th>Ukuran</th>
							<th>Harga Satuan</th>
							<th>Qty</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=0; ?>
						<?php foreach ($detailtrans as $detailtrans) : ?>
							<tr>
								<td>
									<?php $no++ ?>
									<?php echo $no ?>
								</td>
								<td>
									<?php echo $detailtrans->gambar ?>
								</td>
								<td>
									<?php echo $detailtrans->nama_desain ?>
								</td>
								<td>
									<?php echo $detailtrans->nama_desain.", ".$detailtrans->nama_jenis.", ".$detailtrans->cetak ?>
								</td>
								<td>
									<?php echo $detailtrans->ukuran_shirt ?>
								</td>
								<td>
									<?php echo 'Rp. '.number_format($detailtrans->harga_satuan,2,',','.') ?>
								</td>
								<td>
									<?php echo $detailtrans->jumlah ?>
								</td>
								<td>
									<?php echo 'Rp. '.number_format($detailtrans->subtotal_harga,2,',','.') ?>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<th colspan="7">Total </th>
							<th>
									<?php echo 'Rp. '.number_format($trans->total_harga,2,',','.') ?>
								<?php endforeach ?>
							</th>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="row mx-2">
				<?php foreach ($konfirm as $konfirm) : ?>
					<table>
						<tr>
							<td rowspan="4">
								<a href="" data-toggle="modal" data-target="#buktipembayaranModal">
									<img src="<?php echo base_url('upload/buktipembayaran/' . $konfirm->bukti_pembayaran) ?>" width="128" />
								</a>
								
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $konfirm->bank_asal?>
							</td>
							<td>
								To : <?php echo $konfirm->bank_tujuan ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $konfirm->no_rek_asal.' a/n '.$konfirm->atas_nama ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo 'Rp. '.number_format($konfirm->total_pembayaran,2,',','.') ?>
							</td>
						</tr>
					</table>
				<?php endforeach ?>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="buktipembayaranModal" tabindex="-1" role="dialog" aria-labelledby="buktipembayaranModalTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<img src="<?php echo base_url('upload/buktipembayaran/' . $konfirm->bukti_pembayaran) ?>" width="100%" />
						</div>
					</div>
				</div>
			</div>

			<div class="row mx-2 mt-3">
				<?php if($trans->nama_status == "DIBAYAR") : ?>
					<a href="<?php echo site_url('admin/transaksi/edit/' . $trans->id_transaksi) ?>" class="btn btn-small"><i class="fas fa-edit"></i>Konfirmasi</a>
				<?php endif ?>
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