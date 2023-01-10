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
						<h1 class="h3 mb-4 text-gray-800 float-left">Tambah Akun</h1>
						<a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
					</div>
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
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
								</div>
								<div class="card-body">
									<form action="proses_tambah.php" method="POST">
										<div class="form-group">
											<label for="nama">Nama Lengkap </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" name="nama" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="username">Username </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="username" class="form-control" placeholder="Masukan Username" name="username" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="password">Password </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-lock"></i></div>
												</div>
												<input type="password" id="password" class="form-control" placeholder="Masukan Password" name="password" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="password2">Konfirmasi Password </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-lock"></i></div>
												</div>
												<input type="password" id="password2" class="form-control" placeholder="Ulangi Password" name="password2" autocomplete="off" required="required">
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

