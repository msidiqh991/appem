<!-- Container-fluid -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Info Akun Masyarakat</h1>
</div>
	<div class="card shadow mb-4">
    	<div class="card-header bg-primary py-3">
        	<h6 class="m-0 font-weight-bold text-light">Masyarakat Account</h6>
    	</div>
		<div class="section"></div>
	<div class="col-md-2 mt-3 ml-2">
		<a href="#modaladd" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modaladd">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
              <tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Telp</th>
                	<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM masyarakat ORDER BY nik ASC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['username']; ?></td>
			<td><?php echo $r['telp']; ?></td>
			<td>
				<a class="btn btn-success" href="#regis_edit<?php echo $r['nik'] ?>" data-toggle="modal" data-target="#regis_edit<?php echo $r['nik'] ?>">
					<i class="fa fa-pencil-alt"></i>
				</a>
				<a class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=regis_hapus&nik=<?php echo $r['nik'] ?>">
					<i class="fa fa-trash"></i>
				</a>
			</td>

    <!-- Modal Edit Masyarakat -->
	<div class="modal fade" id="regis_edit<?php echo $r['nik'] ?>" tabindex="-1" role="dialog" aria-labelledby="editlabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="POST">
				<div class="form-group">
					<label for="nik">NIK</label>
					<input id="nik" class="form-control form-control-user" type="number" name="nik" value="<?php echo $r['nik']; ?>">
				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input id="nama" class="form-control form-control-user" type="text" name="nama" value="<?php echo $r['nama']; ?>">
				</div>
				<div class="form-group">
					<label for="username">Username</label>		
					<input id="username" class="form-control form-control-user" type="text" name="username" value="<?php echo $r['username']; ?>">
				</div>
				<div class="form-group">
					<label for="telp">Telp</label>
					<input id="telp" class="form-control form-control-user" type="number" name="telp" value="<?php echo $r['telp']; ?>">
				</div>
				<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" name="Update" value="Save" class="btn btn-success">
    			</div>
			</form>
			<?php 
				if(isset($_POST['Update'])){
					$update=mysqli_query($koneksi,"UPDATE masyarakat SET nik='".$_POST['nik']."',nama='".$_POST['nama']."',username='".$_POST['username']."',telp='".$_POST['telp']."' WHERE nik='".$r['nik']."' ");
					if($update){
						echo "<script>alert('Data Tersimpan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
					}
				}
			 ?>
	</div>
</div>
	</tr>
        <?php  }
            ?>
    </tbody>
</table>

<!-- Modal Tambah Masyarakat -->
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="editlabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Masyarakat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="POST">
				<div class="form-group">
					<label for="nik">NIK</label>
					<input id="nik" class="form-control form-control-user" type="number" name="nik">
				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input id="nama" class="form-control form-control-user" type="text" name="nama">
				</div>
				<div class="form-group">
					<label for="username">Username</label>		
					<input id="username" class="form-control form-control-user" type="text" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input id="password" class="form-control form-control-user" type="password" name="password">
				</div>
				<div class="form-group">
					<label for="telp">Telp</label>
					<input id="telp" class="form-control form-control-user" type="number" name="telp">
				</div>
				<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" name="simpan" value="Save" class="btn btn-primary">
    			</div>
			</form>
			<?php 
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
						echo "<script>alert('Data Tesimpan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
						}
					}
				}
			?>
		</div>
	</div>