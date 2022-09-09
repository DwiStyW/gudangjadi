<?php
include "koneksi.php";
$conn = mysqli_connect('localhost', 'root', '', 'gudangjadi');

$noform = mysqli_real_escape_string($conn, $_POST['q']);
$sql = "select * from riwayat where noform = '$noform'";
$process = mysqli_query($conn, $sql);
$num = mysqli_num_rows($process);
if($num != 0){
	echo " &#10060; No Form Duplicate!!! Cek tabel di bawah.";
}
?>