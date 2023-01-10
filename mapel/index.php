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

$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tbl_mapel");
?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Mata Pelajaran</h1>
						<a href="tambah.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Data</a>
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
					<div class="card">
						<div class="card-header">Daftar Mata Pelajaran</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Mata Pelajaran</th>
											<th>Nama Guru</th>
											<th>Hari</th>
											<th>Jumlah Jam</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php while($mapel = mysqli_fetch_assoc($query)) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $mapel['mapel']; ?></td>
												<td><?php echo $mapel['nama_guru']; ?></td>
												<td><?php echo $mapel['hari']; ?></td>
												<td><?php echo $mapel['jumlah_jam']; ?> Jam Pelajaran (<?php echo $mapel['jumlah_jam'] * 45 . " Menit"; ?>)</td>
												<td>
													<a href="ubah.php?id=<?php echo $mapel['id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Ubah</a>
													<a href="hapus.php?id=<?php echo $mapel['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</a>
												</td>
											</tr>
										<?php endwhile; ?>
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

