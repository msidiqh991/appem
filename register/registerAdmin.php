<?php
ob_start();
include 'reglink.php';
include '../conn/koneksi.php';
?>
<!-- Container Register -->
<div class="container">
    <div class="mb-3">
        <div class="card o-hidden border-0 shadow-lg my-3">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../assets/img/bg/side-img-p.jpg" height="100%" width="520">
                    </div>
                    <div class="col-lg-6 ml-5">
                        <div class="p-5 ml-5">
                        <div class="text-center">
                            <img src="../assets/img/icon2.png" width="200" height="110">
                        </div>
                    <br>
                    <div class="text-center mb-4">
                        <h1 class="h5 text-gray-900">Registrasi Aplikasi Pengaduan Masyarakat <br>
                        </h1>
                        <h5>( Khusus Admin )</h4>
                    </div>
            <form method="POST" class="user">
				<div class="form-group">
					<input id="nama" type="text" class="form-control form-control-user" placeholder="Nama" name="nama">
				</div>
				<div class="form-group">
					<input id="username" class="form-control form-control-user" placeholder="Username" type="text" name="username">
				</div>
				<div class="form-group">
					<input id="password" class="form-control form-control-user" placeholder="Password" type="password" name="password">
				</div>
				<div class="form-group">
					<input id="telp" class="form-control form-control-user" placeholder="Telephone" type="number" name="telp">
				</div>
				<div class="form-group">
					<label for="select">Pilih Status :</label>
					<select class="form-control" name="level">
						<option selected disabled="">Pilih Level</option>
						<option value="admin">Admin</option>
						<option value="petugas">Petugas</option>
					</select>
				</div>
				<div class="modal-footer">
            		<input type="submit" name="input" value="Daftar" class="btn btn-info btn-user btn-block">
          		</div>
			</form>
			<?php 
				if(isset($_POST['input'])){
					$password = md5($_POST['password']);

					$query=mysqli_query($koneksi,"INSERT INTO petugas VALUES (NULL,'".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."','".$_POST['level']."')");
					if($query){
						echo "<script>alert('Data Ditambahkan')</script>";
						echo "<script>location='../index.php'</script>";
					}
				}
                ob_flush();
			 ?>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>