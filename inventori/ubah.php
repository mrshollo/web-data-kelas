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
$query = mysqli_query($koneksi, "SELECT * FROM tbl_inventori WHERE id = $id");
$inventori = mysqli_fetch_assoc($query);
?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Ubah Data Inventori</h1>
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
									<form action="proses_ubah.php?id=<?php echo $inventori['id'] ?>" method="POST">
										<div class="form-group">
											<label for="nama_barang">Nama Barang </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-box"></i></div>
												</div>
												<input type="text" id="nama_barang" class="form-control" placeholder="Masukan Nama Barang" name="nama_barang" autocomplete="off" required="required" value="<?php echo $inventori['nama'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="jumlah_barang">Jumlah Barang </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-at"></i></div>
												</div>
												<input type="number" id="jumlah_barang" class="form-control" placeholder="Masukan Jumlah Barang" name="jumlah_barang" autocomplete="off" required="required" value="<?php echo $inventori['jumlah'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="kondisi_barang">Kondisi Barang </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-at"></i></div>
												</div>
												<select name="kondisi_barang" id="kondisi_barang" class="form-control">
													<option value="Baik" <?php echo $inventori['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
													<option value="Rusak Ringan" <?php echo $inventori['kondisi'] == 'Rusak Ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
													<option value="Rusak Parah" <?php echo $inventori['kondisi'] == 'Rusak Parah' ? 'selected' : '' ?>>Rusak Parah</option>
												</select>
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
