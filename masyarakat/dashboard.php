  <!-- ======= Hero Section ======= -->
  <main id="main">
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Aplikasi Pengaduan Masyarakat</h1>
          <h2 class="justify-content-center" data-aos="fade-up" data-aos-delay="400">
                <small class="text-secondary">Sistem Aplikasi Komunikasi dan Informatika untuk <br>Desa Cikeas Udik</small>
          </h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#pengaduan" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center" style="text-decoration: none;">
                <span>Ayo Laporkan</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="../assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

   <!-- ======= Header Pengaduan Section ======= -->
    <section id="pengaduan" class="about">
        <div class="row gx-0">
            <div class="card-body bg-white">
		<header class="section-header">
          <h2>Tabel Pengaduan</h2>
    	</header>
	<div class="container">
		<div class="row card-panel blue lighten-1">
  		<div class="col s6">
		  <button class="btn blue darken-1"><i class="material-icons">notifications</i></button>
	  		<p style="color: #fafafa; font-weight: bold; text-align: justify;">
			  Tabel Pengaduan disini berisikan informasi data dari Pengaduan yang Masyarakat kirimkan, 
			  Pengaduan akan tertampilkan jika sudah Tertanggapi / Terverifikasi.
			</p>
	  	</div>
		</div>
	</div>
	<!-- ======= Main Pengaduan Section ======= -->
				<div class="content">
              <div class="card-header bg-primary">
                <h3 class="text-white my-2">Lihat Pengaduan</h3>
              </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="">
                <thead class="table table-primary">
                    <tr class="text-primary">
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                        </thead>
                        <tbody style="font-family: arial; color: cornflowerblue;">
				<?php 
					$no=1;
					$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.nik='".$_SESSION['data']['nik']."' ORDER BY pengaduan.id_pengaduan DESC");
					while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $r['nik']; ?></td>
						<td><?php echo $r['nama']; ?></td>
						<td><?php echo $r['tgl_pengaduan']; ?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a class="btn blue modal-trigger" href="#tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Detail</a> 
							<a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>
				</tbody>

  <!-- Detail -->
        <div id="tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="text-primary">Detail</h4>
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
				<br>
        		<br>
        			<b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<br><b>Tanggapan</b>
				<p><?php echo $r['tanggapan']; ?></p>
            </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close btn blue">Close</a>
          </div>
      </div>
        </div>
			</tr>
				<?php	}
				?>
			</table>
        </div>
            </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Lapor Section ======= -->
    <section id="values" class="values">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Mulai Menulis Laporan</h2>
          <p>Forum Penulisan Tanggapan Masyarakat</p>
        </header>

    <div class="row">
        <table class="responsive-table" border="2" style="width: 100%;">
	<tr>
		<td><h4 class="text-primary hide-on-med-and-down">Tulis Laporan</h4></td>
	</tr>
	<tr>
		<td style="padding: 20px;">
			<form method="POST" enctype="multipart/form-data">
				<textarea class="materialize-textarea" name="laporan" placeholder="Tulis Laporan"></textarea><br><br>
				<label>Gambar</label>
				<input type="file" name="foto"><br><br>
				<br>
				<input type="submit" name="kirim" value="Send" class="btn blue darken-4">
			</form>
		</td>
  </tr>
        </table>
        
        </div>
      </div>
    </section>
    <!-- End Values Section -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</main>

<?php 
	
	 if(isset($_POST['kirim'])){
	 	$nik = $_SESSION['data']['nik'];
	 	$tgl = date('Y-m-d');


	 	$foto = $_FILES['foto']['name'];
	 	$source = $_FILES['foto']['tmp_name'];
	 	$folder = './../img/';
	 	$listeks = array('jpg','png','jpeg');
	 	$pecah = explode('.', $foto);
	 	$eks = $pecah['1'];
	 	$size = $_FILES['foto']['size'];
	 	$nama = date('dmYis').$foto;

		if($foto !=""){
		 	if(in_array($eks, $listeks)){
		 		if($size<=1000000){
					move_uploaded_file($source, $folder.$nama);
					$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','$nama','proses')");

		 			if($query){
			 			echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
			 			echo "<script>location='index.php';</script>";
		 			}

		 		}
		 		else{
		 			echo "<script>alert('Akuran Gambar Tidak Lebih Dari 100KB')</script>";
		 		}
		 	}
		 	else{
		 		echo "<script>alert('Format File Tidak Di Dukung')</script>";
		 	}
		}
		else{
			$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','noImage.png','proses')");
			if($query){
			 	echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
	 			echo "<script>location='index.php';</script>";
 			}
		}

	 }

 ?>