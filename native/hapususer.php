<?php
include "koneksi.php";
ini_set('date.timezone', 'Asia/Jakarta');
$no 		= $_GET['kd'];
$kode 		= $_GET['hal'];
$date	= date("Y-m-d h:i:s");

$tampil1=mysql_query("select * from riwayat WHERE no='$no'");
$data1=mysql_fetch_array($tampil1);
$awal=$data1['masuk'];
$tglform=$data1['tglform'];
$tglform=$data1['noform'];
	$tampil=mysql_query("select * from saldo WHERE kode='$kode'");
	$data=mysql_fetch_array($tampil);
	$hasil=$data['saldo']-$awal;

if ($hasil<0) {
	echo "<script>alert('JUMLAH STOK MINUS !!!'); window.location = 'masuk.php'</script>";
} else {	
	$query1 = mysql_query("UPDATE saldo SET saldo='$hasil', tanggal='$date' WHERE kode='$kode'");	
	$query2 = mysql_query("DELETE FROM riwayat WHERE no='$no'");
	$query = mysql_query("DELETE FROM masuk WHERE no='$no'");

	if ($query2){
		echo "<script>alert('Data Berhasil dihapus!'); window.location = 'masuk.php'</script>";	
	} else {
		echo "<script>alert('Data Gagal dihapus!'); window.location = 'masuk.php'</script>";	
	}
}
?>