<?php 
include "koneksi.php" ;
include "cek-login.php" ;
$tglform            = $_POST['tglform'];
$tgl            	= $_POST['tgl'];
$noform	 		    = $_POST['noform'];
$kode    	 		= $_POST['kode'];
$jumlah	    	    = $_POST['jumlah'];
$adm	    	    = $_POST['adm'];

$tampil=mysql_query("SELECT * FROM riwayat WHERE noform='$noform'");
$cek = mysql_num_rows($tampil);

if ($cek>0){	
	

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
    <title>Validate| SI Gudang</title>
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
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts C3 CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- switcher CSS
		============================================ -->
    <link rel="stylesheet" href="css/switcher/color-switcher.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Color Css Files
		============================================ -->
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-one.css" title="color-one" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-two.css" title="color-two" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-three.css" title="color-three" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-four.css" title="color-four" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-five.css" title="color-five" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-six.css" title="color-six" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-seven.css" title="color-seven" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-eight.css" title="color-eight" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-nine.css" title="color-nine" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="css/switcher/color-ten.css" title="color-ten" media="screen" />
</head>

<body>
<?php
  $username = $_SESSION['username'];
  $query_user_login = mysql_query("select * from tb_user where username='$username'");
  $user_login = mysql_fetch_array($query_user_login);
  $iduser = $user_login['user_id'];
  ini_set('date.timezone', 'Asia/Jakarta');
?>
    
    <!-- Data table area Start-->
    <div class="admin-dashone-data-table-area mg-b-40">
	<br/>	
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<div class="alert alert-danger alert-mg-b alert-st-four alert-st-bg3 alert-st-bg14" role="alert">						
						<p class="message-mg-rt"><strong>No Form Duplicate!</strong> Mohon cek kembali. No form sudah di masukkan sebelumnya. Lanjutkan jika setuju. Batalkan jika ragu-ragu.</p>
					</div>
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>NO FORM DUPLICATE !!!</h1>                               
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                        <a href="insertkeluar.php?tglform=<?php echo $tglform;?>&tgl=<?php echo $tgl;?>&noform=<?php echo $noform;?>&kode=<?php echo $kode;?>&jumlah=<?php echo $jumlah;?>&adm=<?php echo $adm;?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Lanjutkan</button></a>
										<a href="masuk.php"><button class="btn btn-sm btn-danger login-submit-cs" type="submit">Batalkan</button></a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
									<thead>
										<tr>                                                    
											<th data-field="no">No</th>
											<th data-field="tglform">Tgl Form</th>
											<th data-field="noform">No Form</th>
											<th data-field="kode">Kode Barang</th>
											<th data-field="nama">Nama Barang</th>
											<th data-field="masuk">Masuk</th>
											<th data-field="keluar">Keluar</th>
											<th data-field="saldo">Ket</th>
											<th data-field="tanggal">Tgl Input</th>
											<th data-field="oleh">Oleh</th>																					
										</tr>
									</thead>
									<tbody>
										<?php					
										$tampil=mysql_query("select * from riwayat, master, tb_user WHERE riwayat.noform='$noform' && master.id=riwayat.kode && riwayat.adm=tb_user.user_id ORDER BY riwayat.no DESC ");
										
										$no=1;
										while($data=mysql_fetch_array($tampil)){												 												
										 ?>
										<tr>												                                                  
											<td><?php echo $no;?></td>											
											<td><?php echo date("d-m-Y",strtotime($data['tglform'])) ?></td>
											<td><?php echo $data['noform']; ?></td>											
											<td><?php echo $data['kode']; ?></td>
											<td><?php echo $data['nama']; ?></td>
											<td><?php echo $data['masuk'];?> <?php echo $data['satuan']; ?></td>
											<td><?php echo $data['keluar'];?> <?php echo $data['satuan']; ?></td>
											<td><?php echo $data['ket'];?></td>
											<td><?php echo $data['tanggal']; ?></td>
											<td><a href="penginput.php?user=<?php echo $data['user_id'];?>"><?php echo $data['username']; ?><a/></td>											
										</tr>
										<?php $no++;} ?>                                                
									</tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data table area End-->
    <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">                        
                    <div class="footer-copy-right">
						<p> Copyright &#169; <?php echo date("Y")?> All rights reserved. Designed by <i>IT Dept INDOSAR</p>						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    <!-- Color Switcher -->

    <!-- Color Switcher end -->
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
    <!-- switcher JS
		============================================ -->
    <script src="js/switcher/styleswitch.js"></script>
    <script src="js/switcher/switch-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>

<?php 
} else {
	?>
	<meta http-equiv="Refresh" content="0; URL=insertkeluar.php?tglform=<?php echo $tglform;?>&tgl=<?php echo $tgl;?>&noform=<?php echo $noform;?>&kode=<?php echo $kode;?>&jumlah=<?php echo $jumlah;?>&adm=<?php echo $adm;?>">
	<?php
}
?>