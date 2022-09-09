<?php
include "koneksi.php";

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);
 
$data = mysqli_query($conn,"SELECT * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
$dataa = mysqli_fetch_array($data);
 
if($cek > 0){
	// kalau username dan password sudah terdaftar di database
	// buat session dengan nama username dengan isi nama user yang login
   
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $dataa['role'];
	$_SESSION['user_id'] = $dataa['user_id'];
	$_SESSION['statusjadi'] = "MASUK";
	
	// redirect ke halaman users [menampilkan semua users]
	header('location:index.php');
} else {
	// kalau username ataupun password tidak terdaftar di database
	
	header('location:login.php?error=1');
}
?>