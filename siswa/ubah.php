<?php 
// panggil file yang dibutuhkan
require_once '../lib/header.php'; 
require_once '../lib/navbar.php'; 
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['id'])){
	header('Location: index.php');
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id = $id");
$siswa = mysqli_fetch_assoc($query);
?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Ubah Data Siswa</h1>
						<a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
								</div>
								<div class="card-body">
									<form action="proses_ubah.php?id=<?php echo $siswa['id'] ?>" method="POST">
										<div class="form-group">
											<label for="nis">NIS Siswa </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">#</div>
												</div>
												<input type="number" id="nis" class="form-control" placeholder="Masukan NIS" name="nis" autocomplete="off" required="required" value="<?php echo $siswa['nis'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="nama">Nama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="nama" class="form-control" placeholder="Masukan Nama" name="nama" autocomplete="off" required="required" value="<?php echo $siswa['nama'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="agama">Agama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-book-open"></i></div>
												</div>
												<select name="agama" id="agama" class="form-control">
													<option value="Kristen" <?php echo $siswa['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
													<option value="Islam" <?php echo $siswa['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
													<option value="Buddha" <?php echo $siswa['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
													<option value="Hindu" <?php echo $siswa['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
													<option value="Konghucu" <?php echo $siswa['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="no_wa">Nomor WhatsApp</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-mobile"></i></div>
												</div>
												<input type="number" id="no_wa" class="form-control" placeholder="Masukan Nomor WhatsApp" name="no_wa" autocomplete="off" required="required" value="<?php echo $siswa['no_wa'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="tempat_lahir">Tempat Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-globe"></i></div>
												</div>
												<input type="text" id="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" autocomplete="off" required="required" value="<?php echo $siswa['tempat_lahir'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="tanggal_lahir">Tanggal Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" autocomplete="off" required="required" value="<?php echo $siswa['tanggal_lahir'] ?>">
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
											<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
  <!-- Content Row -->

  <?php
include('../lib/scripts.php');
include('../lib/footer.php');
?>
