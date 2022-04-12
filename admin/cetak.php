<div class="container-fluid">
<style type="text/css" media="print">
@page {
    size: auto; 
    margin: 0;  
}
table tr td,
table tr th {
			font-size: 9pt;
}
</style>
	<center>
		<br>
		<h4 class="mt-5"><strong>Generate Laporan Pengaduan</strong></h4>
		<h6 class="mb-5">DESA CIKEAS UDIK
            <br>
            KAB. BOGOR, JAWA BARAT
		</h6>
	</center>
<h3 class="my-4 text-center">Laporan Pengaduan Masyarakat</h2>
<div class="text-center">
    <table class="table table-bordered text-center" width="100%" cellspacing="0">
        <thead class="table table-dark">
		<td>No</td>
		<td>NIK Pelapor</td>
		<td>Nama Pelapor</td>
		<td>Nama Petugas</td>
		<td>Pesan</td>
		<td>Tanggapan</td>
		<td>Status</td>
		<td>Foto</td>

	</tr>
	<tbody>
	<?php 
		include '../conn/link.php';
		include '../conn/koneksi.php';
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tgl_pengaduan DESC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['nama_petugas']; ?></td>
			<td><?php echo $r['isi_laporan']; ?></td>
			<td><?php echo $r['tanggapan']; ?></td>
			<td><?php echo $r['status']; ?></td>
			<td>
			<?php 
				if($r['foto']=="kosong"){ ?>
					<img src="../img/noImage.png" width="100">
			<?php	}else{ ?>
				<img width="100" src="../img/<?php echo $r['foto']; ?>">
			<?php }
				?>
			</td>
		</tr>
		</tbody>
	<?php	}
	 ?>
</table>
</div>
</div>
<div class="float-right mr-5 my-5">
    <p>CIKEAS UDIK, <?php echo date('d F Y'); ?></p>
    <p class="ml-2">Ditanda-tangani oleh :</p>
    <p class="float-right mr-5 mt-5"><strong><?php echo ucwords($_SESSION['data']['nama_petugas']); ?></strong></p>
</div>
<script type="text/javascript">
	window.print();
</script>