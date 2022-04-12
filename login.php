<!-- container -->
<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 my-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/img/bg/side-img-alt.jpg" height="100%" width="450">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/img/icon2.png" width="200" height="110">
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-2">Aplikasi Pengaduan Masyarakat</h1>
                                    </div>
									<div class="my-4"></div>
                                    <form method="POST" class="user">
<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('Gagal Login Sob')</script>";
		}
	}
?>
    <div class="form-group">
        <input id="username" type="text" class="form-control form-control-user" name="username" placeholder="Username" required autocomplete="username">
    </div>
    <div class="form-group">
        <input id="password" type="password" class="form-control form-control-user" name="password" required autocomplete="current-password" placeholder="Password">
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
    <input class="form-check-input" type="checkbox" name="remember" id="remember">
    <label class="form-check-label swal" for="remember">
        Remember me
        </label>
        </div>
    </div>
    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
	<a href="register/register.php" class="btn btn-dark btn-user btn-block">
    	Register
    </a>
        </form>
            </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>