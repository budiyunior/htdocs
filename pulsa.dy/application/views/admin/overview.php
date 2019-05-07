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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- SALDO -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Sekarang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 440.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                <!-- PENDAPATAN -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 215.000</div>
                        </div>
                        <!-- tobol detail pendapatan -->
                        <div class="col-auto">
                            <a href="">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>


                <!-- PENJUALAN -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Penjualan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1890</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
            <h1 class="h3 mb-0 text-gray-800">Isi Cepat</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Isi Pulsa</a>
            </div>

            <div class="row">

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">XL Axiata</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 100.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">XL Axiata</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 50.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">XL Axiata</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 25.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">XL Axiata</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Telkomsel</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 100.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Telkomsel</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 50.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Telkomsel</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 20.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Telkomsel</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Indosat ooredoo</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 100.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Indosat ooredoo</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 50.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Indosat ooredoo</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 20.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- isi cepat -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-0 font-weight-bold text-gray-800 mb-1">Indosat ooredoo</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase ">Nominal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000</div>
                        </div>
                        <div class="col-auto">
                            <a href="">
                                <!-- tombol tambah saldo -->
                                <i class="fas fa-plus fa-2x text-gray-300"></i>
                            </a>
                        </div>
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

</html>
