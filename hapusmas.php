<?php
include "koneksi.php";
$no 	= $_GET['kd'];

$query = mysql_query("DELETE FROM master WHERE id='$no'");
$query1 = mysql_query("DELETE FROM saldo WHERE no='$no'");
if ($query&&$query1){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'master.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'master.php'</script>";	
}
?>