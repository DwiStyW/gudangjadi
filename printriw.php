<?php 
include "koneksi.php" ;
include "cek-login.php" ;

$timeout = 10; // Set timeout menit
$logout_redirect_url = "logout.php"; // Set logout URL


 
$timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<!doctype html>
<html class="no-js" lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Print Riwayat | SI Gudang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    
   

<body>
<?php
  $username = $_SESSION['username'];
  $query_user_login = mysqli_query($conn,"select * from tb_user where username='$username'");
  $user_login = mysqli_fetch_array($query_user_login);
  ini_set('date.timezone', 'Asia/Jakarta');
?>


<?php	
	$start  = $_GET['start'];
	$end     = $_GET['end'];
	$code     = $_GET['kode'];									
	$mulai= date('Y-m-d', strtotime('-1 days', strtotime($start)));
?>           
				
<h3>Riwayat Bahan Kemas Keluar Masuk</h3>

Periode :
<?php echo date('d F Y', strtotime($start));?> hingga <?php	echo date('d F Y', strtotime($end));?>

<table border="1" width="100%" style="text-align: center">
	<thead>
        <tr>
            <th rowspan="2" style="text-align: center">No</th>
            <th rowspan="2" style="text-align: center">Tgl Form</th>
            <th rowspan="2" style="text-align: center">No Form</th>
            <th rowspan="2" style="text-align: center">Kode Barang</th>
            <th rowspan="2" colspan="1" style="text-align: center">Nama Barang</th>
            <th colspan="3" style="text-align: center">Masuk</th>
            <th colspan="3" style="text-align: center">Keluar</th>
            <th colspan="3" style="text-align: center">Saldo Akhir</th>
            <th rowspan="2" style="text-align: center">Keterangan</th>
            <th rowspan="2" style="text-align: center">Tanggal input</th>
        </tr>
        <tr>
            <th style="text-align: center">Sat 1</th>
            <th style="text-align: center">Sat 2</th>
            <th style="text-align: center">Sat 3</th>
            <th style="text-align: center">Sat 1</th>
            <th style="text-align: center">Sat 2</th>
            <th style="text-align: center">Sat 3</th>
            <th style="text-align: center">Sat 1</th>
            <th style="text-align: center">Sat 2</th>
            <th style="text-align: center">Sat 3</th>
        </tr>
    </thead>					
	<tbody>
		<?php					
		$tampil=mysqli_query($conn,"select * from riwayat, master WHERE riwayat.kode='$code' && master.id=riwayat.kode && tglform between '$start' AND '$end' ORDER BY riwayat.tglform ASC, riwayat.masuk DESC ");
		$tam=mysqli_query($conn,"select * from master WHERE id='$code'");
		$tes=mysqli_fetch_array($tam);
		
		$in=mysqli_query($conn,"SELECT SUM(masuk) AS salIn FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");
		$out=mysqli_query($conn,"SELECT SUM(keluar) AS salOut FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");
		$salawal=mysqli_query($conn,"SELECT * FROM riwayat WHERE kode='$code' && tglform='$start'");
		
		$ambil=mysqli_fetch_array($in);
		$ambil1=mysqli_fetch_array($out);
		$sals=$ambil['salIn']-$ambil1['salOut'];
		
		$no=1;
		$dat=mysqli_fetch_array($salawal);										
		 ?>
		 <!-- Saldo Awal -->
		<tr>
			<td></td>											
			<td></td>
			<td></td>											
			<td></td>
			<td style="text-align: left; padding-left: 10px">Saldo</td>
            <td></td>
			<td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
			<td><?php 
            //konvert 3 satuan
                $satss1  = floor($sals/($tes['max1']*$tes['max2']));
                $sisa   = $sals-($satss1*$tes['max1']*$tes['max2']);
                $satss2  = floor($sisa/$tes['max2']);
                $satss3  = $sisa-$satss2*$tes['max2'];
            echo $satss1;?>  
			</td>
            <td><?php echo $satss2; ?></td>
            <td><?php echo $satss3; ?></td>
			<td>Saldo</td>
			<td></td>
		</tr>
		<?php while($data=mysqli_fetch_array($tampil)){												 												
		 ?>
		<tr>
		<?php 	
			if($no==1){ 
		?>
			<td><?php echo $no;?></td>											
			<td><?php echo $data['tglform']; ?></td>
			<td><?php echo $data['noform']; ?></td>											
			<td><?php echo $data['kode']; ?></td>
			<td style="text-align: left; padding-left: 10px"><?php echo $data['nama']; ?></td>
            
			<td><?php 
            //konvert 3 satuan
                $sat1  = floor($data['masuk']/($tes['max1']*$tes['max2']));
                $sisaa   = $data['masuk']-($sat1*$tes['max1']*$tes['max2']);
                $sat2  = floor($sisaa/$tes['max2']);
                $sat3  = $sisaa-$sat2*$tes['max2'];
                echo $sat1;?></td>
            <td><?php echo $sat2;?></td>
            <td><?php echo $sat3;?></td>
			<td><?php 
            //konvert 3 satuan
                $saat1  = floor($data['keluar']/($tes['max1']*$tes['max2']));
                $sis   = $data['keluar']-($saat1*$tes['max1']*$tes['max2']);
                $saat2  = floor($sis/$tes['max2']);
                $saat3  = $sis-$saat2*$tes['max2'];
                echo $saat1;?> </td>
            <td><?php echo $saat2;?></td>
            <td><?php echo $saat3;?></td>
			<td><?php 
				$saldo_mutasi=$sals+$data['masuk']-$data['keluar'] ;
				//konvert 3 satuan
                $st1   = floor($saldo_mutasi/($tes['max1']*$tes['max2']));
                $sissa = $saldo_mutasi-($st1*$tes['max1']*$tes['max2']);
                $st2  = floor($sissa/$tes['max2']);
                $st3  = $sissa-$st2*$tes['max2'];
                  echo $st1;?> </td>
            <td><?php echo $st2;?></td>
            <td><?php echo $st3;?></td>
			<td><?php echo $data['ket']; ?></td>
			<td><?php echo $data['tanggal']; ?></td>
		
		<?php 
			}										
			else{ 
		?>	
			<td><?php echo $no;?></td>											
			<td><?php echo $data['tglform']; ?></td>
			<td><?php echo $data['noform']; ?></td>											
			<td><?php echo $data['kode']; ?></td>
			<td style="text-align: left; padding-left: 10px"><?php echo $data['nama']; ?></td>
			<td><?php 
            //konvert 3 satuan
                $stee1  = floor($data['masuk']/($tes['max1']*$tes['max2']));
                $sia    = $data['masuk']-($stee1*$tes['max1']*$tes['max2']);
                $stee2  = floor($sia/$tes['max2']);
                $stee3  = $sia-$stee2*$tes['max2'];
                echo $stee1;?> </td>
            <td><?php echo $stee2;?> </td>
            <td><?php echo $stee3;?> </td>
            <td><?php 
            //konvert 3 satuan
                $see1  = floor($data['keluar']/($tes['max1']*$tes['max2']));
                $saah  = $data['keluar']-($see1*$tes['max1']*$tes['max2']);
                $see2  = floor($saah/$tes['max2']);
                $see3  = $saah-$see2*$tes['max2'];
                echo $see1;?> </td>
            <td><?php echo $see2;?> </td>
            <td><?php echo $see3;?> </td>
			<?php 
			if($no==2){		
				$saldo_mutasi1=$saldo_mutasi+$data['masuk']-$data['keluar'] ;
				
                //konvert 3 satuan
                $ss1  = floor($saldo_mutasi1/($tes['max1']*$tes['max2']));
                $sii = $saldo_mutasi1-($ss1*$tes['max1']*$tes['max2']);
                $ss2  = floor($sii/$tes['max2']);
                $ss3  = $sii-$ss2*$tes['max2']; ?>
            <td><?php echo $ss1; ?></td>
            <td><?php echo $ss2; ?></td>
            <td><?php echo $ss3; ?></td>
			<?php }
			else {	
				 $sals1=$saldo_mutasi1;
				 $saldo_mutasi1=$sals1+$data['masuk']-$data['keluar'] ;
			     //konvert 3 satuan
                $ss1  = floor($saldo_mutasi1/($tes['max1']*$tes['max2']));
                $sii = $saldo_mutasi1-($ss1*$tes['max1']*$tes['max2']);
                $ss2  = floor($sii/$tes['max2']);
                $ss3  = $sii-$ss2*$tes['max2']; ?>
            <td><?php echo $ss1; ?></td>
            <td><?php echo $ss2; ?></td>
            <td><?php echo $ss3; ?></td>
			<?php } ?>
			
			<td><?php echo $data['ket']; ?></td>
			<td><?php echo $data['tanggal']; ?></td>
		</tr>
		<?php 
			}
		
		$no++;}
		?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
            <td style="text-align: left; padding-left: 10px">Total</td>
			<td><?php 
			$allin=mysqli_query($conn,"SELECT SUM(masuk) AS sumIn FROM riwayat WHERE  keluar='0'&& kode='$code' && tglform between '$start' AND '$end'");
			$allout=mysqli_query($conn,"SELECT SUM(keluar) AS sumOut FROM riwayat WHERE masuk='0' && kode='$code' && tglform between '$start' AND '$end'");
			$take=mysqli_fetch_array($allin);
			$take1=mysqli_fetch_array($allout);
             //konvert 3 satuan
                $stts1  = floor($take['sumIn']/($tes['max1']*$tes['max2']));
                $sit = $take['sumIn']-($stts1*$tes['max1']*$tes['max2']);
                $stts2  = floor($sit/$tes['max2']);
                $stts3  = $sit-$stts2*$tes['max2']; 
			    echo $stts1;?></td>
            <td><?php echo $stts2;?></td>
            <td><?php echo $stts3;?></td>
			<td><?php 
                //konvert 3 satuan
                $ts1  = floor($take1['sumOut']/($tes['max1']*$tes['max2']));
                $its = $take1['sumOut']-($ts1*$tes['max1']*$tes['max2']);
                $ts2  = floor($its/$tes['max2']);
                $ts3  = $its-$ts2*$tes['max2'];
                echo $ts1;?></td>
            <td><?php echo $ts2;?></td>
            <td><?php echo $ts3;?></td>
			<td></td>
            <td></td>
            <td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
 </table>
	            
<br/>
	<p>Copyright &#169; <?php echo date("Y")?> All rights reserved. Designed by <i>IT Dept INDOSAR</i></p>                    

<script>
	window.print();
</script>
    <!-- Footer End-->
    <!-- Chat Box Start-->
    
    <!-- Chat Box End-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/Chart.min.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- map JS
		============================================ -->
    <script src="js/map/raphael.min.js"></script>
    <script src="js/map/jquery.mapael.js"></script>
    <script src="js/map/france_departments.js"></script>
    <script src="js/map/world_countries.js"></script>
    <script src="js/map/usa_states.js"></script>
    <script src="js/map/map-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>