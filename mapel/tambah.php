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
?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Tambah Data Mata Pelajaran</h1>
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
									<form action="proses_tambah.php" method="POST">
										<div class="form-group">
											<label for="nama_mapel">Mata Pelajaran </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-book"></i></div>
												</div>
												<input type="text" id="nama_mapel" class="form-control" placeholder="Masukan Mata Pelajaran" name="nama_mapel" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="hari">Hari </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-clock"></i></div>
												</div>
												<input type="text" id="hari" class="form-control" placeholder="Masukan Hari" name="hari" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="jumlah_jam">Jumlah Jam </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-clock"></i></div>
												</div>
												<input type="number" id="jumlah_jam" class="form-control" placeholder="Masukan Jumlah Jam" name="jumlah_jam" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="nama_guru">Nama Guru </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="nama_guru" class="form-control" placeholder="Masukan Nama Guru" name="nama_guru" autocomplete="off" required="required">
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
