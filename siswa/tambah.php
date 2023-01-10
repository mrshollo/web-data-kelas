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

$query1 = mysqli_query($koneksi, "SELECT kelas FROM tbl_kelas WHERE id = 1");
$kelas1 = mysqli_fetch_assoc($query1);
?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Tambah Data Siswa</h1>
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
											<label for="nis">NIS Siswa </label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">#</div>
												</div>
												<input type="number" id="nis" class="form-control" placeholder="Masukan NIS" name="nis" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="nama">Nama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</div>
												<input type="text" id="nama" class="form-control" placeholder="Masukan Nama" name="nama" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="agama">Agama Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-book-open"></i></div>
												</div>
												<select name="agama" id="agama" class="form-control">
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Buddha">Buddha</option>
													<option value="Hindu">Hindu</option>
													<option value="Konghucu">Konghucu</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="no_wa">Nomor WhatsApp</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-mobile"></i></div>
												</div>
												<input type="number" id="no_wa" class="form-control" placeholder="Masukan Nomor WhatsApp" name="no_wa" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="tempat_lahir">Tempat Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-globe"></i></div>
												</div>
												<input type="text" id="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="tanggal_lahir">Tanggal Lahir Siswa</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
												</div>
												<input type="date" id="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" autocomplete="off" required="required">
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
											<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
												</td>
											</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

  <!-- Content Row -->

  <?php
include('../lib/scripts.php');
include('../lib/footer.php');
?>
