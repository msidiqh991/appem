<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

 <!-- Content Row -->
 <div class="row">

<!-- On Laporan --> 
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						Laporan Masuk
					</div>
				<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 	?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmmember; ?></div>
                	</div>
                		<div class="col-auto">
                    <i class="fa fa-exclamation-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Verified Laporan -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
						Laporan Selesai
					</div>
				<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='selesai'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 	?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmmember; ?></div>
                    	</div>
                    <div class="col-auto">
                        <i class="fa fa-check fa-2x text-gray-300"></i>
                    </div>
            	</div>
            </div>
        </div>
    </div>

<!-- Akun Masyarakat -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
						Jumlah Masyarakat
					</div>
				<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM masyarakat");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 	?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmmember; ?></div>
                    	</div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
            	</div>
            </div>
        </div>
    </div>

<!-- Akun Petugas Admin -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
						Admin dan Petugas
					</div>
				<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM petugas");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 	?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmmember; ?></div>
                    	</div>
                    <div class="col-auto">
                        <i class="fa fa-user-secret fa-2x text-gray-300"></i>
                    </div>
            	</div>
            </div>
        </div>
    </div>

<!-- Desc. -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
						Aplikasi Pengaduan Masyarakat
					</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <small class="text-dark">Edited by <strong>Muhammad Sidiq</strong></small>
                    </div>
                    	</div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
            	</div>
            </div>
        </div>
    </div>
</div>
	</div>
		</div>
<!-- End of Content Wrapper -->


