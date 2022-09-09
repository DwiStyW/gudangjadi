<?php 
session_start();

$logged_in = false;

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['statusjadi']) || empty($_SESSION['statusjadi'])) {	
	//redirect ke halaman login
	header('location:login.php?error=2');
	
} else {
	$logged_in = true;
}
?>