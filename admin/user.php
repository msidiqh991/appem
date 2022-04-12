<!-- Container-fluid -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pusat Kelola Akun</h1>
</div>
	<div class="card shadow mb-4">
    	<div class="card-header bg-primary py-3">
        	<h6 class="m-0 font-weight-bold text-light">Admin & Petugas Account</h6>
    	</div>
		<div class="section"></div>
	<div class="col-md-2 mt-3 ml-2">
		<a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#Addadmin">
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
				<th>Nama</th>
				<th>Username</th>
				<th>Telephone</th>
				<th>level</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
		<?php 
		$no=1;
		$tampil = mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY nama_petugas ASC");
		while ($r=mysqli_fetch_assoc($tampil)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nama_petugas']; ?></td>
			<td><?php echo $r['username']; ?></td>
			<td><?php echo $r['telp_petugas']; ?></td>
			<td><?php echo $r['level']; ?></td>
			<td>
				<a class="btn btn-primary" href="#user_edit<?php echo $r['id_petugas'] ?>" data-toggle="modal" data-target="#user_edit<?php echo $r['id_petugas'] ?>">
					<i class="fa fa-pencil-alt"></i>
				</a>
				<a class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=user_hapus&id_petugas=<?php echo $r['id_petugas'] ?>">
					<i class="fa fa-trash"></i>
				</a>
			</td>

<!-- Modal Edit -->
<div class="modal fade" id="user_edit<?php echo $r['id_petugas'] ?>" tabindex="-1" role="dialog" aria-labelledby="editlabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form method="POST">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input hidden type="text" name="id_petugas" value="<?php echo $r['id_petugas']; ?>">
					<input id="nama" type="text" class="form-control form-control-user" name="nama" value="<?php echo $r['nama_petugas']; ?>">
				</div>
				<div class="form-group">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username"  class="form-control form-control-user" value="<?php echo $r['username']; ?>">
				</div>
				<div class="form-group">
					<label for="telp">Telp</label>
					<input id="telp" type="number"  class="form-control form-control-user" name="telp" value="<?php echo $r['telp_petugas']; ?>">
				</div>
				<div class="form-group">
					<p>
						<label>
						  <input value="admin" class="with-gap" name="level" type="radio" <?php if($r['level']=="admin"){echo "checked";} ?> />
						  <span>Admin</span>
						</label>
						<br>
						<label>
						  <input value="petugas" class="with-gap" name="level" type="radio" <?php if($r['level']=="petugas"){echo "checked";} ?> />
						  <span>Petugas</span>
						</label>
					</p>
				</div>
				<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			<input type="submit" name="Update" value="Save" class="btn btn-primary">
      			</div>
			</form>
	  <?php
		if(isset($_POST['Update'])){
			// echo $_POST['nama'].$_POST['username'].$_POST['telp'].$_POST['level'];
			$update=mysqli_query($koneksi,"UPDATE petugas SET nama_petugas='".$_POST['nama']."',username='".$_POST['username']."',telp_petugas='".$_POST['telp']."',level='".$_POST['level']."' WHERE id_petugas='".$_POST['id_petugas']."' ");
		if($update){
			echo "<script>alert('Data di Update')</script>";
			echo "<script>location='index.php?p=user'</script>";
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

<!-- Modal Add Account -->
<div class="modal fade" id="Addadmin" tabindex="-1" role="dialog" aria-labelledby="Addadminlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="POST">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input id="nama" type="text" class="form-control form-control-user" name="nama">
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
				<div class="form-group">
					<label for="select">Pilih Status :</label>
					<select class="form-control form-control-user" name="level">
						<option selected disabled="">Pilih Level</option>
						<option value="admin">Admin</option>
						<option value="petugas">Petugas</option>
					</select>
				</div>
				<div class="modal-footer">
            		<input type="submit" name="input" value="Save" class="btn btn-primary">
          		</div>
			</form>
			<?php 
				if(isset($_POST['input'])){
					$password = md5($_POST['password']);

					$query=mysqli_query($koneksi,"INSERT INTO petugas VALUES (NULL,'".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."','".$_POST['level']."')");
					if($query){
						echo "<script>alert('Data Ditambahkan')</script>";
						echo "<script>location='index.php?p=user'</script>";
					}
				}
			 ?>
    	</div>
</div>