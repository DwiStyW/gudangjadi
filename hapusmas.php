<?php
include "koneksi.php";
$no 	= $_GET['kd'];

$query = mysqli_query($conn,"DELETE FROM master WHERE id='$no'");
$query1 = mysqli_query($conn,"DELETE FROM saldo WHERE no='$no'");
if ($query&&$query1){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'master.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'master.php'</script>";	
}
?>