<!-- Container-fluid -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
</div>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header bg-gradient-primary py-3">
        <h6 class="m-0 font-weight-bold text-light">Laporan</h6>
    </div>
	<div class="col-md-5 mt-3 ml-2">
    	<a href="cetak.php" class="btn btn-sm btn-primary">
			<i class="fa fa-print fa-sm text-white-50 mr-1"></i>
			Generate Laporan
		</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
              <tr>
				<th>No</th>
				<th>NIK Pelapor</th>
				<th>Nama Pelapor</th>
				<th>Nama Petugas</th>
				<th>Tgl Masuk</th>
				<th>Tgl Ditanggapi</th>
				<th>Status</th>
				<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tgl_pengaduan DESC");
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
				<a href="#laporan<?php echo $r['id_tanggapan'] ?>" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#laporan<?php echo $r['id_tanggapan'] ?>">
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

        <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="laporan<?php echo $r['id_tanggapan'] ?>" tabindex="-1" role="dialog" aria-labelledby="tanggapanLabel" aria-hidden="true">
<div id="laporan?id_tanggapan=<?php echo $r['id_tanggapan'] ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-success">
        <h5 class="modal-title text-light" id="exampleModalLabel">Laporan</h5>
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
		<p>" <?php echo $r['isi_laporan']; ?> "</p>
		<br><b>Tanggapan</b>
	</div>
		<p><?php echo $r['tanggapan']; ?></p>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn btn-success">Close</button>
    </div>
		</tr>
            <?php  }
            ?>
        </tbody>
</table>        