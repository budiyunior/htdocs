<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body class="bg-success">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">SELAMAT DATANG </h1>
									</div>
									<form class="user">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp"
											 placeholder="Masukkan email..">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan password..">
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Ingat Saya</label>
											</div>
										</div>
										<a href="<?php echo site_url('admin') ?>" class="btn btn-primary btn-user btn-block">
											Login
										</a>
										<hr>
										<a href="#" class="btn btn-google btn-user btn-block">
											<i class="fab fa-google fa-fw"></i> Login dengan Google
										</a>
										<a href="#" class="btn btn-facebook btn-user btn-block">
											<i class="fab fa-facebook-f fa-fw"></i> Login dengan Facebook
										</a>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="<?php echo site_url('forgot-password') ?>">Lupa Password?</a>
									</div>
									<div class="text-center">
										<a class="small" href="<?php echo site_url('register') ?>">Buat Akun Baru !</a>
									</div>
								</div>
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
