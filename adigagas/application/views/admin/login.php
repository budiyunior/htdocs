<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-5">

				<div class="card o-hidden bg-transparent border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 mb-4 text-white"> <i class="fas fa-tshirt"></i> Custom Shirt</h1>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<form action="<?php echo base_url('index.php/Login/auth'); ?>" method="post">
										<div class="form-group">
											<input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
										</div>

										<td><input type="submit" class="btn btn-primary btn-user btn-block" value="Login"></td>


									</form>
									<hr>

								</div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

		<!-- JavaScript-->
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>