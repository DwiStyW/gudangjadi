<?php
include "koneksi.php";
ini_set('date.timezone', 'Asia/Jakarta');
$no 		= $_GET['kd'];
$kode 		= $_GET['hal'];
$date	= date("Y-m-d h:i:s");

$tampil1=mysql_query("select * from riwayat WHERE no='$no'");
while($data1=mysql_fetch_array($tampil1)){
$awal=$data1['keluar'];
	$tampil=mysql_query("select * from saldo WHERE kode='$kode'");
	while($data=mysql_fetch_array($tampil)){
	$hasil=$data['saldo']+$awal;
	$query1 = mysql_query("UPDATE saldo SET saldo='$hasil', tanggal='$date'
	 WHERE kode='$kode'");
	}
}
$query2 = mysql_query("DELETE FROM riwayat WHERE no='$no'");
$query = mysql_query("DELETE FROM keluar WHERE no='$no'");

if ($query2){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'keluar.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'keluar.php'</script>";	
}
?>