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

  <div class="row">
    <div class="col-lg-12">
          </div>
  </div>
  <div class="alert alert-success text-center" role="alert">Yuk Join Grup WhatsApp<br/><a href="#" class="btn btn-sm btn-primary"><i class="fab fa-whatsapp"></i> Grup WhatsApp</a>
  </div>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengguna</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">3.290</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sisa Saldo</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 1.778</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-wallet fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Deposit</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 4.505.000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pesanan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 3.828.462</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-3">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Profil Saya</h6>
    </div>
    <div class="card-body">
      <div class="pull-right">
        <div class="text-right">
          <a class="btn btn-info" href="user/setting"><i class="fa fa-cog fa-spin fa-fw"></i> Pengaturan Akun</a>
        </div>
      </div><br/>
      <hr/>
      <h5 class="m-t-20 m-b-5"><b>Ollo</b></h5>
      <p class="text-muted m-b-0">
        <b>Email</b> : asepcode06@gmail.com<br/>
        <b>Sisa Saldo</b> : Rp 1.778<br/>
        <b>Terdaftar</b> : 2019-12-26<br/>
      </p>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <br/>
            <table id="news" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal & Waktu</th>
                  <th>Type</th>
                  <th>Isi</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
    <!-- <div class="row"> -->
    <div class="col-md-6 mb-3">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Log Activity</h6>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <br/>
            <table id="log" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal & Waktu</th>
                  <th>Isi</th>
                </tr>
              </thead>
            </table>
          </div>
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