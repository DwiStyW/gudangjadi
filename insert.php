<?php 
include "koneksi.php";
include "cek-login.php" ;
ini_set('date.timezone', 'Asia/Jakarta');
$mode = $_GET['mode'];

switch ($mode) {
	case 1:
	//INSERT MASTER
		$kode	 		    = $_POST['kode'];
		$nam    	 		= $_POST['nama'];
		$nama    	 		= preg_replace('/[^A-Za-z0-9\()  ]/', '', $nam);
		$ukuran	    	    = $_POST['ukuran'];
		$gol	    	    = $_POST['gol'];
		$jenis	    	    = $_POST['jenis'];
		$sat1	    	    = $_POST['sat1'];
		$max1	    	    = $_POST['max1'];
		$sat2	    	    = $_POST['sat2'];
		$max2	    	    = $_POST['max2'];
		$sat3	    	    = $_POST['sat3'];
		$date				= date("Y-m-d h:i:s");

		//Cek Duplikat
		$cekdouble = mysqli_query($conn,"select * from MASTER where kode='$kode'");
		$cek = mysqli_num_rows($cekdouble);
		if($cek > 0){
			echo "<script>alert('Data Barang Double!!!! Cek kembali kode barang !'); window.location = 'master.php'</script>";
		} else {
			$query = mysqli_query($conn,"INSERT INTO master (id, kode, nama, ukuran, sat1, max1, sat2, max2, sat3, kdgol, kdjenis, tgl) 
			VALUES ('', '$kode', '$nama', '$ukuran', '$sat1', '$max1', '$sat2', '$max2', '$sat3', '$gol', '$jenis', '$date')");
			$query1 = mysqli_query($conn,"INSERT INTO saldo (no, kode, saldo, tglform, tanggal) 
			VALUES ('', '$kode', '', '', '$date')");
			if ($query&&$query1){
				echo "<script>alert('Data Master Barang Berhasil dimasukan!'); window.location = 'master.php'</script>";	
			} else {
				echo "<script>alert('Data Master Barang Gagal dimasukan! Cek Kembali Kode Barang!'); window.location = 'master.php'</script>";	
			}		
		}
		
	break;

	case 2:
	//INSERT Barang Masuk
		$tglform            = $_POST['tglform'];
		$tgl            	= $_POST['tgl'];
		$noform	 		    = $_POST['noform'];
		$koder    	 		= $_POST['kode'];
		$sat1	    	    = $_POST['sat1'];
		$sat2	    	    = $_POST['sat2'];
		$sat3	    	    = $_POST['sat3'];
		$adm	    	    = $_POST['adm'];
		
		$cat	    	    = $_POST['cat'];

		$cekdouble = mysqli_query($conn,"select * from riwayat where tanggal='$tgl'");
		$cek = mysqli_num_rows($cekdouble);
		if($cek > 0){
			echo "<script>alert('Data Barang Double!!!!'); window.location = 'inputbahanBU.php'</script>";
		} else {

			$tampil1=mysqli_query($conn,"select * from master WHERE id='$koder'");
			$data1=mysqli_fetch_array($tampil1);
			$kode=$data1['kode'];

			//konvert 3 Satuan
			$sats1	= $sat1*$data1['max1']*$data1['max2'];
			$sats2	= $sat2*$data1['max2'];
			$jumlah = $sats1+$sats2+$sat3;


			$tampil=mysqli_query($conn,"select * from saldo WHERE kode='$kode'");
			$data=mysqli_fetch_array($tampil);
			$hasil=$data['saldo']+$jumlah;

			$query1 = mysqli_query($conn,"UPDATE saldo SET saldo='$hasil', tglform='$tglform', tanggal='$tgl'
			 WHERE kode='$kode'");

			if ($query1){
				$ket="Input";
				$query = mysqli_query($conn,"INSERT INTO riwayat (no, tglform, kode, noform, masuk, keluar, saldo, ket, tanggal, adm, cat) 
				VALUES ('', '$tglform', '$koder', '$noform', '$jumlah', '', '$hasil', '$ket' , '$tgl', '$adm', '$cat')");
				
				if ($query){
				$query2 = mysqli_query($conn,"INSERT INTO masuk (no, tglform, noform, kode, jumlah, tanggal, saldo, adm, cat) 
				VALUES ('', '$tglform', '$noform', '$koder', '$jumlah', '$tgl', '$hasil', '$adm',  '$cat')");
				echo "<script>alert('Data Barang Berhasil dimasukan!'); window.location = 'inputbahanBU.php'</script>";
				}
				
			} else {
				echo "<script>alert('Data Barang Gagal dimasukan!'); window.location = 'inputbahanBU.php'</script>";	
			}
		}

	break;

	case 3:
	//INSERT BARANG KELUAR
		$tglform            = $_POST['tglform'];
		$tgl            	= $_POST['tgl'];
		$noform	 		    = $_POST['noform'];
		$koder    	 		= $_POST['kode'];
		$sat1	    	    = $_POST['sat1'];
		$sat2	    	    = $_POST['sat2'];
		$sat3	    	    = $_POST['sat3'];
		$adm	    	    = $_POST['adm'];

		$cekdouble = mysqli_query($conn,"select * from riwayat where tanggal='$tgl'");
		$cek = mysqli_num_rows($cekdouble);
		if($cek > 0){
			echo "<script>alert('Data Barang Double!!!!'); window.location = 'inputkeluarBU.php'</script>";
		} else {
			$tampil1=mysqli_query($conn,"select * from master WHERE id='$koder'");
			$data1=mysqli_fetch_array($tampil1);
			$kode=$data1['kode'];
			//konvert 3 Satuan
			$sats1	= $sat1*$data1['max1']*$data1['max2'];
			$sats2	= $sat2*$data1['max2'];
			$jumlah = $sats1+$sats2+$sat3;

			$tampil=mysqli_query($conn,"select * from saldo WHERE kode='$kode'");
			$data=mysqli_fetch_array($tampil);
			$hasil=$data['saldo']-$jumlah;

			if ($hasil<0) {
				echo "<script>alert('JUMLAH STOK MINUS !!!'); window.location = 'keluar.php'</script>";
			} else {

				$query1 = mysqli_query($conn,"UPDATE saldo SET saldo='$hasil', tglform='$tglform', tanggal='$tgl'
				 WHERE kode='$kode'");

				if ($query1){
					$ket="Output";
					$query2 = mysqli_query($conn,"INSERT INTO riwayat (no, tglform, kode, noform, masuk, keluar, saldo, ket, tanggal, adm) 
					VALUES ('', '$tglform', '$koder', '$noform', '', '$jumlah', '$hasil', '$ket','$tgl','$adm')");
					
					if ($query2){
					$query = mysqli_query($conn,"INSERT INTO keluar (no, tglform, noform, kode, jumlah, tanggal,saldo, adm) 
					VALUES ('', '$tglform', '$noform', '$koder', '$jumlah', '$tgl', $hasil,'$adm')");
					echo "<script>alert('Data Barang Keluar Berhasil dimasukan!'); window.location = 'inputkeluarBU.php'</script>";	
					}
				} else {
					echo "<script>alert('Data Barang Keluar Gagal dimasukan!'); window.location = 'inputkeluarBU.php'</script>";	
				}
			}
		}

	break;

	case 4 :
	//master golongan
		$kdgol	 		    = $_POST['kdgol'];
		$namagol  	 		= preg_replace('/[^A-Za-z0-9\()  ]/', '', $_POST['namagol']);
		
		$query = mysqli_query($conn,"INSERT INTO golongan (id, kdgol, namagol) VALUES ('', '$kdgol', '$namagol')");

		if ($query){
			echo "<script>alert('Data Master Golongan Berhasil dimasukan!'); window.location = 'golongan.php'</script>";	
		} else {
			echo "<script>alert('Data Master Golongan Gagal dimasukan! Cek Kembali Nama Golongan!'); window.location = 'golongan.php'</script>";	
		}

	break;

	case 5 :
	// master jenis
		$kdjenis	 		    = $_POST['kdjenis'];
		$namajenis  	 		= preg_replace('/[^A-Za-z0-9\()  ]/', '', $_POST['namajenis']);
		
		$query = mysqli_query($conn,"INSERT INTO jenis (id, kdjenis, namajenis) VALUES ('', '$kdjenis', '$namajenis')");

		if ($query){
			echo "<script>alert('Data Master Jenis Berhasil dimasukan!'); window.location = 'jenis.php'</script>";	
		} else {
			echo "<script>alert('Data Master Jenis Gagal dimasukan! Cek Kembali Nama Jenis!'); window.location = 'jenis.php'</script>";	
		}
	break;

}

?>