<?php
ob_start();
include 'reglink.php';
?>
<!-- Container Register -->
<div class="container">
    <div class="mb-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="../assets/img/bg/side-img.jpg" height="100%" width="520">
                    </div>
                    <div class="col-lg-6 ml-5">
                            <div class="p-5 ml-5">
                                    <div class="text-center">
                                        <img src="../assets/img/icon2.png" width="200" height="110">
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <h1 class="h5 text-gray-900 mb-5">Registrasi Aplikasi Pengaduan Masyarakat</h1>
                                    </div>
                            <form method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nik" class="form-control form-control-user" id="nik"
                                            placeholder="NIK" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="nama" id="nama"
                                            placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="username"
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="telp" class="form-control form-control-user success"
                                        id="telp" placeholder="Telephone">
                                </div>
                                <hr>
                                <input type="submit" name="simpan" value="Register Akun" class="btn btn-primary btn-user btn-block">
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="../index.php">Already have an account? Login!</a>
                                </div>
                            <?php
                            include '../conn/koneksi.php';
				        if(isset($_POST['simpan'])){
                            $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
                            // $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
					        $password = md5($_POST['password']);
                            $sql_cek_nik = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik = '$nik'") or die (mysqli_error($koneksi));
                            if(mysqli_num_rows($sql_cek_nik) > 0)
                            {
                                echo "<script>alert('Data Ini Telah Terdaftar Sebelumnya, Harap Gunakan yang lain'); windows.location='register.php';</script>";
                            } else {
					        $query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$nik."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
					    if($query){
						        echo "<script>alert('Data Tesimpan'); windows.location='../index.php';</script>";
                                header('location: ../index.php');
					            }
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