<?php 
// panggil file yang dibutuhkan
require_once '../lib/header.php'; 
require_once '../lib/navbar.php'; 
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: ../login.php');
}

$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tbl_users");
?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="clearfix">
						<h1 class="h3 mb-4 text-gray-800 float-left">Manajemen Akun</h1>
						<a href="tambah.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Akun</a>
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
						<div class="card-header">Daftar Akun</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Username</th>
										</tr>
									</thead>
									<tbody>
										<?php while($akun = mysqli_fetch_assoc($query)) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $akun['nama'] ?></td>
												<td><?php echo $akun['username'] ?></td>
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

