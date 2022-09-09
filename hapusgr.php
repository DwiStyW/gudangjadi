<?php
include "koneksi.php";
$no 	= $_GET['kd'];

$query = mysql_query("DELETE FROM grup WHERE id='$no'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'grup.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'grup.php'</script>";	
}
?>