<!DOCTYPE html>
<html>
<head>
	<title>Appem</title>
	<link rel="shortcut icon" href="https://cepatpilih.com/image/logo.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- sweetalert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

	<!-- ICONS -->
	<link rel="icon" href="assets/img/icon.png">

	<!-- Custom fonts for this template-->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Custom Login -->
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script type="text/javascript">
        $(document).ready( function () {
          $('#example').DataTable();
          $('select').formSelect();
        } );
      </script>
</head>
<body class="bg-gradient-dark">
	<div class="container">
	<?php 
		include 'conn/koneksi.php';
		if(@$_GET['p']==""){
			include_once 'login.php';
		}
		elseif(@$_GET['p']=="login"){
			include_once 'login.php';
		}
		elseif(@$_GET['p']=="logout"){
			include_once 'logout.php';
		}
	 ?>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
    	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    	<!-- Core plugin JavaScript-->
    	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    	<!-- Custom scripts for all pages-->
    	<script src="assets/js/sb-admin-2.min.js"></script>

	<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems);
        });

		document.querySelector(".success").addEventListener('click', function(){
  		swal("Our First Alert", "With some body text and success icon!", "success");
		});
     	</script>
</body>
</html>
