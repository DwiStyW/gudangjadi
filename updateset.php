<?php 
include "koneksi.php";

$username   = $_POST['user'];
$nama	    = $_POST['nama'];
$password	= md5($_POST['pass']);
$no 		= $_GET['id'];

$query = mysql_query("UPDATE tb_user SET username='$username', fullname='$nama', password='$password' WHERE user_id='$no'");

if ($query) {
	// jika berhasil menyimpan
	header('location: logoutset.php');
} else {
	// jika gagal menyimpan
	header('location: index.php?msg=2');
}
?>