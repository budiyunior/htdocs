<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url('index.php/Login/aksi_login'); ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="Username" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="Password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <td>
          <input type="submit" class="btn btn-primary btn-block" value="Login"></td>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?= site_url("register") ?>">Register an Account</a>
          <a class="d-block small" href="<?= site_url("forgot") ?>">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
