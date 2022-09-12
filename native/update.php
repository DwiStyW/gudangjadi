<?php 
include "koneksi.php";
include "cek-login.php" ;
ini_set('date.timezone', 'Asia/Jakarta');
$mode = $_GET['mode'];

switch ($mode) {
	case 1:
		$no         = $_POST['no'];
		$kode 		= $_POST['kode'];
		$nama	    = $_POST['nama'];
		$ukuran	    = $_POST['ukuran'];
		$sat1    	= $_POST['sat1'];
		$max1    	= $_POST['max1'];
		$sat2    	= $_POST['sat2'];
		$max2    	= $_POST['max2'];
		$sat3    	= $_POST['sat3'];
		$golongan  	= $_POST['golongan'];
		$jenis  	= $_POST['jenis'];

		$query 		= mysql_query("UPDATE MASTER SET kode='$kode', nama='$nama', ukuran='$ukuran', sat1='$sat1', max1='$max1', sat2='$sat2', max2='$max2', sat3='$sat3', kdgol='$golongan', kdjenis='$jenis' WHERE id='$no'");
		$query1 	= mysql_query("UPDATE SALDO SET kode='$kode' WHERE no='$no'");
		 
		if ($query&&$query1){
			echo "<script>alert('Data Master Barang Berhasil diubah!'); window.location = 'master.php'</script>";	
		} else {
			echo "<script>alert('Data Master Barang Gagal diubah!'); window.location = 'master.php'</script>";	
		}

	break;

	case 2:
		$no         = $_POST['no'];
		$kdgol	 	= $_POST['kdgol'];
		$namagol	= $_POST['namagol'];

		$query = mysql_query("UPDATE golongan SET kdgol='$kdgol', namagol='$namagol' WHERE id='$no'");
		 
		if ($query){
			echo "<script>alert('Data Berhasil diubah!'); window.location = 'golongan.php'</script>";	
		} else {
			echo "<script>alert('Data Gagal diubah!'); window.location = 'golongan.php'</script>";	
		} 

	break;

	case 3:
		$no         = $_POST['no'];
		$kdjenis	= $_POST['kdjenis'];
		$namajenis	= $_POST['namajenis'];

		$query = mysql_query("UPDATE jenis SET kdjenis='$kdjenis', namajenis='$namajenis' WHERE id='$no'");
		 
		if ($query){
			echo "<script>alert('Data Berhasil diubah!'); window.location = 'jenis.php'</script>";	
		} else {
			echo "<script>alert('Data Gagal diubah!'); window.location = 'jenis.php'</script>";	
		} 

	break;

	case 4:
		$no         = $_POST['no'];
		$date    	= $_POST['tgl'];
		$kode 		= $_POST['kode'];
		$noform	    = $_POST['noform'];
		$sat1	    = $_POST['sats1'];
		$sat2	    = $_POST['sats2'];
		$sat3	    = $_POST['sats3'];
		$tglform    = $_POST['tglform'];
		$adm		= $_POST['adm'];
		$cat	    = $_POST['cat'];

		$tampil2=mysql_query("select * from master WHERE id='$kode'");
		$data2=mysql_fetch_array($tampil2);		
		//konvert 3 Satuan
			$sats1	= $sat1*$data2['max1']*$data2['max2'];
			$sats2	= $sat2*$data2['max2'];
			$jumlah = $sats1+$sats2+$sat3;

		$tampil1=mysql_query("select * from riwayat WHERE no='$no'");
		$data1=mysql_fetch_array($tampil1);

		$tampil=mysql_query("select * from saldo WHERE no='$kode'");
		$data=mysql_fetch_array($tampil);
			
		$awal=$data1['masuk'];

		$update=$data['saldo']-$awal+$jumlah;
		$ket="revisiIN";

		if ($update<0) {
			echo "<script>alert('JUMLAH STOK MINUS !!!'); window.location = 'masuk.php'</script>"; } 
		else {
			$query1 = mysql_query("UPDATE saldo SET saldo='$update', tanggal='$date', tglform='$tglform' WHERE no='$kode'");
			if ($query1){
				$query2 = mysql_query("UPDATE riwayat SET noform='$noform', kode='$kode', masuk='$jumlah', tglform='$tglform' , saldo='$update', tanggal='$date', ket='$ket', adm='$adm', cat='$cat'
						  WHERE no='$no'");
				if ($query2){
				$query = mysql_query("UPDATE masuk SET noform='$noform', kode='$kode', jumlah='$jumlah', tglform='$tglform' , saldo='$update', tanggal='$date', adm='$adm', cat='$cat'
				WHERE no='$no'");
				echo "<script>alert('Data Barang Masuk Berhasil dirubah!'); window.location = 'masuk.php'</script>";	
				}
			} else {
				echo "<script>alert('Data Barang Masuk Gagal dirubah!'); window.location = 'masuk.php'</script>";	
			}
		}

	break;

	case 5:
		$no         = $_POST['no'];
		$date    	= $_POST['tgl'];
		$kode 		= $_POST['kode'];
		$noform	    = $_POST['noform'];
		$sat1	    = $_POST['sats1'];
		$sat2	    = $_POST['sats2'];
		$sat3	    = $_POST['sats3'];
		$tglform    = $_POST['tglform'];
		$adm		= $_POST['adm'];

		$tampil2=mysql_query("select * from master WHERE id='$kode'");
		$data2=mysql_fetch_array($tampil2);		
		//konvert 3 Satuan
			$sats1	= $sat1*$data2['max1']*$data2['max2'];
			$sats2	= $sat2*$data2['max2'];
			$jumlah = $sats1+$sats2+$sat3;

		$tampil1=mysql_query("select * from riwayat WHERE no='$no'");
		$data1=mysql_fetch_array($tampil1);

		$tampil=mysql_query("select * from saldo WHERE no='$kode'");
		$data=mysql_fetch_array($tampil);
			
		$awal=$data1['keluar'];

		$update=$data['saldo']+$awal-$jumlah;
		$ket="revisiOUT";
			
		if ($update<0) {
			echo "<script>alert('JUMLAH STOK MINUS !!!'); window.location = 'keluar.php'</script>";
		} else {
		$query1 = mysql_query("UPDATE saldo SET saldo='$update', tanggal='$date', tglform='$tglform'
		 WHERE no='$kode'");
			if ($query1){
				$query2 = mysql_query("UPDATE riwayat SET noform='$noform', kode='$kode', keluar='$jumlah', tglform='$tglform' , saldo='$update', tanggal='$date', ket='$ket', adm='$adm'
						  WHERE no='$no'");
				if ($query2){
				$query = mysql_query("UPDATE keluar SET noform='$noform', kode='$kode', jumlah='$jumlah', tglform='$tglform' , saldo='$update', tanggal='$date', adm='$adm'
				WHERE no='$no'");
				echo "<script>alert('Data Barang Keluar Berhasil dirubah!'); window.location = 'keluar.php'</script>";	
				}
			} else {
				echo "<script>alert('Data Barang Keluar Gagal dirubah!'); window.location = 'keluar.php'</script>";	
			}
		}
	break;

}

?>