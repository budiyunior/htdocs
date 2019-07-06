<?php
    session_start();
    include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'partials/sidebar.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">

          <!-- Page Heading -->

          <h1 class="h3 mb-2 text-gray-800">Beli Pulsa</h1>
          
          <?php if(isset($_SESSION['save'])) :?>
            <div class="alert alert-<?php echo $_SESSION['save']?>" role="alert">
              <?php echo $_SESSION['savenotif']; ?>
            </div>
          <?php else : ?>
          <?php endif ?>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php if(isset($_SESSION['transaksi'])) : ?>
                <h6 class="text-primary">Transaksi Pulsa</h6>
                
              <?php else :?>
                <a href="newtrans.php">
                  <h6 class="m-0 font-weight-bold text-primary">NEW</h6>
                </a>
              <?php endif ?>
            </div>
            <div class="card-body">
              <?php if(isset($_SESSION['transaksi'])) : ?>
                <?php   $id = $_SESSION['transaksi']['id_transaksi'];
                    $total = mysqli_query($conn, "SELECT total FROM tm_transaksi WHERE id_transaksi = '$id'");
                    $trans = mysqli_fetch_array($total); ?>
                <table>
                    <tr>
                        <td>Kode Transaksi</td>
                        <td>:</td>
                        <td class="text-primary">
                          <strong>
                            <?php echo $_SESSION['transaksi']['id_transaksi']; ?>
                          </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td class="text-success">
                            <?php echo $tgl = date('Y-m-d'); ?>
                        </td>
                    </tr>
                </table>
                <br>
                <strong class="text-dark">Tambah pulsa</strong>
                <form action="addpulsa.php" method="post">
                    <input type="hidden" name="id_transaksi" value="<?php echo $_SESSION['transaksi']['id_transaksi']; ?>">
                    <table>
                        <tr>
                            <td>
                                <label for="operator">Operator</label>
                            </td>
                            <td>:</td>
                            <td>
                                <select name="operator" id="operator">
                                    <option>--pilih operator--</option>
                                    <option value="Telkomsel">Telkomsel</option>
                                    <option value="XL Axiata">XL Axiata</option>
                                    <option value="Indosat ooredoo">Indosat ooredoo</option>
                                    <option value="Smartfren">Smartfren</option>
                                    <option value="Three">Three</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nominal">Nominal</label>
                            </td>
                            <td>:</td>
                            <td>
                                <select name="nominal" id="nominal">
                                    <option>--pilih nominal--</option>
                                    <option value="5000">Rp. 5000</option>
                                    <option value="10000">Rp. 10000</option>
                                    <option value="20000">Rp. 20000</option>
                                    <option value="25000">Rp. 25000</option>
                                    <option value="50000">Rp. 50000</option>
                                    <option value="100000">Rp. 100000</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nomor">Nomor Tujuan</label>
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nomor" id="nomor" maxlength="13">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" name="tambah">Tambah</button> 
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Operator</th>
                            <th>Detail</th>
                            <th>Nominal</th>
                            <th>Biaya Admin</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_SESSION['detail_transaksi'])) : ?>
                            <?php for($i=0; $i < count($_SESSION['detail_transaksi']); $i++) : ?>
                                <tr>
                                    <td><?php echo $i+1; ?></td>
                                    <td><?php echo $_SESSION['detail_transaksi'][$i]['operator'] ?></td>
                                    <td><?php echo $_SESSION['detail_transaksi'][$i]['nomor'] ?></td>
                                    <td><?php echo $_SESSION['detail_transaksi'][$i]['nominal'] ?></td>
                                    <td><?php echo $_SESSION['detail_transaksi'][$i]['biaya_admin'] ?></td>
                                    <td><?php echo $_SESSION['detail_transaksi'][$i]['subtotal'] ?></td>
                                </tr>
                            <?php endfor ?>
                            <tr>
                                <th colspan="5">Total</th>
                                <th>
                                    <?php echo $trans[0]; ?>
                                </th>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="5">Total</th>
                                <th>0</th>
                            </tr>
                        <?php endif ?>
                    </tbody>
                  </table>
                </div>
                <form action="print.php" method="post">
                    <table>
                        <input type="hidden" name="id_transaksi" value="<?php echo $_SESSION['transaksi']['id_transaksi']; ?>">
                        <input type="hidden" name="total" value="<?php echo $trans[0]; ?>">
                        <tr>
                            <td>Bayar</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="bayar"> 
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                              <button class="btn btn-success" type="submit" name="print">Print</button>
                            </td>
                        </tr>
                    </table>
                </form>
              <?php endif ?>
              
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
