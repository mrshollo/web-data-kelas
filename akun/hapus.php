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
$query = mysqli_query($koneksi, "DELETE FROM tbl_users WHERE id = $id");
if($query){
	set_flash_message('sukses', 'Akun berhasil dihapus!');
	header('Location: index.php');
} else die("gagal!" . mysqli_error($koneksi));

?>