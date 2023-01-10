<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(isset($_POST['simpan'])){
	// print_r($_POST);
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$agama = $_POST['agama'];
	$no_wa = $_POST['no_wa'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];

	$query = mysqli_query($koneksi, "INSERT INTO tbl_siswa (nis, nama, agama, no_wa, tempat_lahir, tanggal_lahir) VALUES ($nis, '$nama', '$agama', '$no_wa', '$tempat_lahir', '$tanggal_lahir')");

	if($query){
		set_flash_message('sukses', 'Data berhasil ditambahkan!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>