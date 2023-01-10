<?php 

// panggil file yang dibutuhkan
require_once 'includes/header.php'; 
require_once 'includes/navbar.php'; 
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$query = mysqli_query($koneksi, "SELECT * FROM tbl_kelas WHERE id = 1");
$kelas = mysqli_fetch_assoc($query);
$siswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tbl_siswa"));
$guru = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(nama_guru) AS total FROM tbl_mapel"));
?>


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
		<hr>
		<?php if (check_flash_message('sukses')): ?>
	        <div class="alert alert-success alert-dismissible fade show" role="alert">
	            <?php get_flash_message() ?>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	      <?php elseif(check_flash_message('gagal')) : ?>
	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
	            <?php get_flash_message() ?>
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	    <?php endif ?>
	      <div class="row">
    <div class="col-lg-12">
          </div>
  </div>
  <div class="alert alert-success text-center" role="alert">Yuk Join Grup WhatsApp Kelas Kita<br/><a href="https://chat.whatsapp.com/" class="btn btn-sm btn-primary"><i class="fab fa-whatsapp"></i> Grup WhatsApp</a>
  </div>
			<div class="row">
			<!-- Earnings (Monthly) Card Example -->
				<div class="col-md-3 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelas</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kelas['kelas']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-smile-wink fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wali Kelas</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kelas['wali_kelas']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siswa['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Guru</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $guru['total']; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-book-open fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="card-header">Data Kelas - <?php echo $kelas['kelas'] ?></div>
						<div class="card-body">
							<form action="proses_ubah.php" method="POST">
								<div class="form-group">
									<label for="nama_kelas">Kelas </label>
									<input type="text" name="nama_kelas" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['kelas'] ?>">
								</div>
								<div class="form-group">
									<label for="wali_kelas">Wali Kelas </label>
									<input type="text" name="wali_kelas" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['wali_kelas'] ?>">
								</div>
								<div class="form-group">
									<label for="sekolah">Sekolah </label>
									<input type="text" name="sekolah" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['sekolah'] ?>">
								</div>
								<div class="form-group">
									<label for="alamat_sekolah">Alamat Sekolah </label>
									<input type="text" name="alamat_sekolah" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['alamat_sekolah'] ?>">
								</div>
								<div class="form-group">
									<label for="tahun_ajaran">Tahun Ajaran </label>
									<input type="text" name="tahun_ajaran" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['tahun_ajaran'] ?>">
								</div>
								<div class="form-group">
									<label for="semester">Semester </label>
									<input type="text" name="semester" class="form-control" autocomplete="off" required="required" value="<?php echo $kelas['semester'] ?>">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-primary" name="simpan" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-save"></i> Ubah</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>