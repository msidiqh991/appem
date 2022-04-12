<!-- Container-fluid -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Tanggapan</h1>
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tanggapan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
              <tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Petugas</th>
				<th>Tgl Masuk</th>
				<th>Tgl Ditanggapi</th>
				<th>Status</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tanggapan.id_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['nama_petugas']; ?></td>
			<td><?php echo $r['tgl_pengaduan']; ?></td>
			<td><?php echo $r['tgl_tanggapan']; ?></td>
			<td><?php echo $r['status']; ?></td>
			<td><a class="btn blue modal-trigger" href="#more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">More</a> <a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=tanggapan_hapus&id_tanggapan=<?php echo $r['id_tanggapan'] ?>">Hapus</a></td>
		

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="more?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="orange-text">Detail</h4>
            <div class="col s12">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
            	<p>Petugas : <?php echo $r['nama_petugas']; ?></p>
				<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
				<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
				<?php 
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
				<br><b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<br><b>Respon</b>
				<p><?php echo $r['tanggapan']; ?></p>
            </div>

          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>               

<!-- Container-fluid -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Hasil Tanggapan</h1>
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tanggapan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Petugas</th>
						<th>Tanggal Masuk</th>
						<th>Tanggal Ditanggapi</th>
						<th>Status</th>
						<th>Opsi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
		<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tanggapan.id_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
                    <tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $r['nik']; ?></td>
						<td><?php echo $r['nama']; ?></td>
						<td><?php echo $r['nama_petugas']; ?></td>
						<td><?php echo $r['tgl_pengaduan']; ?></td>
						<td><?php echo $r['tgl_tanggapan']; ?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a href="#respon?id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tanggapan">
                                <span class="icon text-white-50">
                                    <i class="fa fa-eye"></i>
                                </span>
                            	<span class="text">Detail</span>
                            </a>
							<a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=tanggapan_hapus&id_tanggapan=<?php echo $r['id_tanggapan'] ?>" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </a>
						</td>
                    </tr>
                </tbody>
            </table>
        </div>
    	</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="tanggapan" tabindex="-1" role="dialog" aria-labelledby="tanggapanLabel" aria-hidden="true">
<div id="respon?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title text-light" id="exampleModalLabel">Tanggapan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<p>NIK : <?php echo $r['nik']; ?></p>
        <p>Dari : <strong><?php echo $r['nama']; ?></strong></p>
        <p>Petugas : <strong><?php echo $r['nama_petugas']; ?></strong></p>
		<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
		<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
			<?php 
				if($r['foto']=="kosong"){ ?>
					<img src="../img/noImage.png" width="100">
			<?php	}else{ ?>
				<img width="100" src="../img/<?php echo $r['foto']; ?>">
			<?php }
				?>
	<div class="my-2">
		<br><b>Pesan</b>
	</div>
		<p><?php echo $r['isi_laporan']; ?></p>
	<div class="my-2">
		<br><b>Tanggapan</b>
	</div>
		<p><?php echo $r['tanggapan']; ?></p>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn btn-primary">Close</button>
    </div>
<!-- Command Line For Fix Bug -->
<!-- <?php  }
	?> -->
    </div>
	</div>
  	</div>
</div>
</div>
