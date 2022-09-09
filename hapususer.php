<?php
include "koneksi.php";
ini_set('date.timezone', 'Asia/Jakarta');
$no 		= $_GET['kd'];
$kode 		= $_GET['hal'];
$date	= date("Y-m-d h:i:s");

$tampil1=mysqli_query($conn,"select * from riwayat WHERE no='$no'");
$data1=mysqli_fetch_array($tampil1);
$awal=$data1['masuk'];
$tglform=$data1['tglform'];
$tglform=$data1['noform'];
	$tampil=mysqli_query($conn,"select * from saldo WHERE kode='$kode'");
	$data=mysqli_fetch_array($tampil);
	$hasil=$data['saldo']-$awal;

if ($hasil<0) {
	echo "<script>alert('JUMLAH STOK MINUS !!!'); window.location = 'masuk.php'</script>";
} else {	
	$query1 = mysqli_query($conn,"UPDATE saldo SET saldo='$hasil', tanggal='$date' WHERE kode='$kode'");	
	$query2 = mysqli_query($conn,"DELETE FROM riwayat WHERE no='$no'");
	$query = mysqli_query($conn,"DELETE FROM masuk WHERE no='$no'");

	if ($query2){
		echo "<script>alert('Data Berhasil dihapus!'); window.location = 'masuk.php'</script>";	
	} else {
		echo "<script>alert('Data Gagal dihapus!'); window.location = 'masuk.php'</script>";	
	}
}
?>