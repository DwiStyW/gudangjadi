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
    <title>Input Master | SI Gudang</title>
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
  $query_user_login = mysqli_query($conn,"select * from tb_user where username='$username'");
  $user_login = mysqli_fetch_array($query_user_login);
  ini_set('date.timezone', 'Asia/Jakarta');
?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php include('menu.php'); ?>

    <!-- Data table area Start-->
    <div class="basic-form-area mg-b-15">
                <div class="container-fluid">                                     
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Input Master Barang Jadi</h1>                                        
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">											
                                                <div class="all-form-element-inner">
													<form enctype="multipart/form-data" action="insert.php?mode=1.php" method="post">
                                                    
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Kode Barang</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="kode" type="text" class="form-control" id="kode" placeholder="Kode Barang" required/>																	
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Nama Barang</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Barang" required/>																	
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Ukuran</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="ukuran" type="text" class="form-control" id="ukuran" placeholder="Ukuran" required/>																	
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Nama Golongan</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select id="gol" name="gol" class="form-control">
                                                                            <option></option>
                                                                            <?php
                                                                            $query1 = mysqli_query($conn,"SELECT * FROM GOLONGAN");
                                                                            while ($data1  = mysqli_fetch_array($query1)) {
                                                                            ?>
                                                                            <option value="<?php echo $data1['id'];?>"><?php echo $data1['kdgol'];?> <?php echo $data1['namagol'];?></option>
                                                                            <?php }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                                          
                                                            </div>
                                                        </div>
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Nama Jenis</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select id="jenis" name="jenis" class="form-control">
                                                                            <option></option>
                                                                            <?php
                                                                            $query2 = mysqli_query($conn,"SELECT * FROM JENIS");
                                                                            while ($data2  = mysqli_fetch_array($query2)) {
                                                                            ?>
                                                                            <option value="<?php echo $data2['id'];?>"><?php echo $data2['kdjenis'];?> <?php echo $data2['namajenis'];?></option>
                                                                            <?php }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                                          
                                                            </div>
                                                        </div>

                                                     <!-- 3 Satuan -->
                                                    <br/>   
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="sat1" type="text" class="form-control" id="sat1" placeholder="Satuan1"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Isi Satuan 1</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="max1" type="text" class="form-control" id="max1" placeholder="Isi 1"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="sat2" type="text" class="form-control" id="sat2" placeholder="Satuan2"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Isi Satuan 2</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="max2" type="text" class="form-control" id="max2" placeholder="Isi 2"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="sat3" type="text" class="form-control" id="sat3" placeholder="Satuan3"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <a href="master.php"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														
                                                    </form>
													
                                                </div>
                                            </div>
                                        </div>
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
	<!--
    <div class="ec-colorswitcher">
        <a class="ec-handle" href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
        <h3>Style Switcher</h3>
        <div class="ec-switcherarea">
            <div class="base-color">
                <h6>Background Color</h6>
                <ul class="ec-switcher">
                    <li>
                        <a href="#" class="cs-color-1 styleswitch" data-rel="color-one"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-2 styleswitch" data-rel="color-two"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-3 styleswitch" data-rel="color-three"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-4 styleswitch" data-rel="color-four"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-5 styleswitch" data-rel="color-five"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-6 styleswitch" data-rel="color-six"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-7 styleswitch" data-rel="color-seven"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-8 styleswitch" data-rel="color-eight"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-9 styleswitch" data-rel="color-nine"></a>
                    </li>
                    <li>
                        <a href="#" class="cs-color-10 styleswitch" data-rel="color-ten"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	-->
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