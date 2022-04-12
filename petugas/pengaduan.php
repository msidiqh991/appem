<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Pengaduan</h1>
</div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
              <tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tanggal Masuk</th>
				<th>Status</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE pengaduan.status='proses' ORDER BY pengaduan.id_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['tgl_pengaduan']; ?></td>
			<td><?php echo $r['status']; ?></td>
			<td>
                <a href="#more<?php echo $r['id_pengaduan'] ?>" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#more<?php echo $r['id_pengaduan'] ?>">
                    <span class="icon text-white-50">
                        <i class="fa fa-eye"></i>
                    </span>
                    <span class="text">Detail</span>
                </a>
				<a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fa fa-trash"></i>
                    </span>
                </a>
            </td>

<!-- Modal -->
<div class="modal fade" id="more<?php echo $r['id_pengaduan'] ?>" tabindex="-1" role="dialog" aria-labelledby="pengaduanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <p>NIK : <?php echo $r['nik']; ?></p>
          <p>Dari : <?php echo $r['nama']; ?></p>
          <p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
          <?php 
              if($r['foto']=="kosong"){ ?>
                  <img src="../img/noImage.png" width="100">
          <?php	}else{ ?>
              <img width="100" src="../img/<?php echo $r['foto']; ?>">
          <?php }
           ?>
        <div class="mt-2">
            <b>Pesan</b>
          <p><?php echo $r['isi_laporan']; ?></p>
          <p>Status : <?php echo $r['status']; ?></p>
        </div>
      </div>
	  <?php 
          if($r['status']=="proses"){ ?>
              <form method="POST">
                  <div class="container">
                  <div class="form-group">
                      <label for="textarea"><strong>Tanggapan</strong></label>
                      <textarea id="textarea" name="tanggapan" class="form-control form-control-user"></textarea>
                  </div>
                  </div>
                  <div class="modal-footer">
						<input type="submit" name="tanggapi" value="Send" class="btn btn-primary">
      				</div>
              </form>
    	<?php }
       	?>
		   <?php 
          if(isset($_POST['tanggapi'])){
            $tgl = date('Y-m-d');
            $query = mysqli_query($koneksi,"INSERT INTO tanggapan VALUES (NULL,'".$r['id_pengaduan']."','".$tgl."','".$_POST['tanggapan']."','".$_SESSION['data']['id_petugas']."')");
              	if($query){
            $update=mysqli_query($koneksi,"UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='".$r['id_pengaduan']."'");
            	if($update){
                	echo "<script>alert('Tanggapan Terkirim')</script>";
                    echo "<script>location='index.php?p=pengaduan';</script>";
                }
            }
        }
    ?>
	</div>
  		</div>
	</div>
</div>
	</tr>
        <?php  }
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div> 