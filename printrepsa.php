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
    <title>Print Saldo Akhir Stock | SI Gudang</title>
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
    <style type="text/css">
        .spasi{
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>

<body>
<?php
  $username = $_SESSION['username'];
  $query_user_login = mysql_query("select * from tb_user where username='$username'");
  $user_login = mysql_fetch_array($query_user_login);
  ini_set('date.timezone', 'Asia/Jakarta');
?>
<?php	$start  = $_GET['start'];
		$end    = $_GET['end']; 
		$mulai= date('Y-m-d', strtotime('-1 days', strtotime($start)));
?>

<h3>Report Saldo Barang Jadi</h3>
Saldo Stok Dari <b><?php echo date('d F Y', strtotime($start));?></b> hingga <b><?php echo date('d F Y', strtotime($end));?></b>

<table border="1" width="100%">
	<thead>
        <tr>
          <th style="text-align: center">No</th>
          <th style="text-align: center">Golongan</th>
          <th style="text-align: center">Kode Barang</th>
          <th style="text-align: center">Nama</th>
          <th style="text-align: center">Urai</th>
          <th style="text-align: center">Satuan 1</th>
          <th style="text-align: center">Satuan 2</th>
          <th style="text-align: center">Satuan 3</th>
        </tr>
    </thead>
	<tbody>
        <?php
        $tampil = mysql_query("SELECT * FROM master, riwayat  WHERE master.id=riwayat.kode && riwayat.tglform between '$mulai' AND '$end' ORDER BY kdgol ASC, kode ASC");
        $tampil1 = mysql_query("SELECT * FROM master ORDER BY kdgol ASC, nama ASC");

        $no = 1;
        while ($data = mysql_fetch_array($tampil1)) {
          $code = $data['id'];

        //SaldoAwal
          $in = mysql_query("SELECT SUM(masuk) AS salIn FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");
          $out = mysql_query("SELECT SUM(keluar) AS salOut FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");

          while ($ambil = mysql_fetch_array($in)) {
          while ($ambil1 = mysql_fetch_array($out)) {
              $saldo = $ambil['salIn'] - $ambil1['salOut'];

        //Masuk
            $masuk = mysql_query("SELECT SUM(masuk) AS mas FROM riwayat  WHERE kode='$code' && tglform between '$start' AND '$end'");
            while ($ambi = mysql_fetch_array($masuk)) {
        //Keluar
            $keluar = mysql_query("SELECT SUM(keluar) AS kel FROM riwayat  WHERE kode='$code' && tglform between '$start' AND '$end'");
            while ($amb = mysql_fetch_array($keluar)) {

        // Saldo Akhir
            $akhirr = $saldo + $ambi['mas'] - $amb['kel'];
            //konvert 3 satuan
            $st1  = floor($akhirr / ($data['max1'] * $data['max2']));
            $ss  = $akhirr - ($st1 * $data['max1'] * $data['max2']);
            $st2  = floor($ss / $data['max2']);
            $st3  = $ss - $st2 * $data['max2'];

        ?>
  <tr>
    <td><?php echo $no; ?></td>
    <?php
    $kdgrup = $data['kdgol'];
    //Mastergrup        
    $tampil2 = mysql_query("select * from golongan WHERE id='$kdgrup'");
    $data2 = mysql_fetch_array($tampil2); ?>
    <td><?php echo $data2['kdgol']; ?> <?php echo $data2['namagol']; ?></td>
    <td><?php echo $data['kode']; ?></td>
    <td><?php echo $data['nama']; ?></td>
    <td>Saldo Akhir </td>
    <!-- Saldo Akhir -->
    <td><?php echo $st1; ?> </td>
    <td><?php echo $st2; ?> </td>
    <td><?php echo $st3; ?> </td>
  </tr>
  
        <?php $no++;
                }
              }
            }
          }
        } ?>
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