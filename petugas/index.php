<?php 
	session_start();
	include '../conn/koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:../index.php');
	}
	elseif($_SESSION['data']['level'] != "petugas"){
		header('location:../index.php');
	}
    ob_start()
 ?>
  <!DOCTYPE html>
  <html>
    <head>
    	<title>Appem</title>

      <!-- Custom fonts for this template-->
      <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

      <!-- Icon -->
      <link href="../assets/img/icon.png" rel="icon" type="jpg/png">
      
      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!-- Custom styles for this template-->
      <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
      <!-- Datatables -->
      <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-tint fa-xs"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <img src="../assets/img/icon.png" width="95" height="50">
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=pengaduan">
                    <i class="fa fa-address-book"></i>
                    <span>Lihat Pengaduan</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=respon">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Tanggapan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Top Divider -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucwords($_SESSION['data']['nama_petugas']); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../index.php?p=logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
    <!-- End of Main Content -->
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="../index.php?p=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

	<?php 
		if(@$_GET['p']==""){
			include_once 'dashboard.php';
		}
		elseif(@$_GET['p']=="dashboard"){
			include_once 'dashboard.php';
		}
		elseif(@$_GET['p']=="pengaduan"){
			include_once 'pengaduan.php';
		}
		elseif(@$_GET['p']=="pengaduan_hapus"){
			$query=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
			$data=mysqli_fetch_assoc($query);
			unlink('../img/'.$data['foto']);
		if($data['status']=="proses"){
			$delete=mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
			header('location:index.php?p=pengaduan');
		}
		elseif($data['status']=="selesai"){
			$delete=mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
			if($delete){
				$delete2=mysqli_query($koneksi,"DELETE FROM tanggapan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
				header('location:index.php?p=pengaduan');
			}	
		}

		}
		elseif(@$_GET['p']=="more"){
			include_once 'more.php';
		}
		elseif(@$_GET['p']=="tanggapan"){
			include_once 'tanggapan.php';
		}
		elseif(@$_GET['p']=="respon"){
			include_once 'respon.php';
		}
		elseif(@$_GET['p']=="tanggapan_hapus"){
			
			$query = mysqli_query($koneksi,"DELETE FROM tanggapan WHERE id_tanggapan='".$_GET['id_tanggapan']."'");
			if($query){
				header('location:index.php?p=tanggapan_show');
			}
		}
        ob_flush()
	 ?>
      <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems);
        });
      </script>
    </body>
  </html>