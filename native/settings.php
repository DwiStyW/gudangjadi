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
    <title>Settings | SI Gudang</title>
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
  ini_set('date.timezone', 'Asia/Jakarta');
?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php include('menu.php'); ?>
    
    <!-- Contact Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
						<form enctype="multipart/form-data" action="updateset.php?id=<?php echo $user_login['user_id'];?>" method="post">
                            <div class="col-lg-6">
                                <?php 
									$user_id = $user_login['user_id'];									
									$tampil=mysql_query("select * from tb_user WHERE user_id='$user_id'");
									while($data=mysql_fetch_array($tampil)){				
								?>
								<div class="login-bg">
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="login-title">
                                                <center><h1>Settings</h1></center>
                                            </div>
                                        </div>
                                    </div>
									<br/>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Username</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                    <div class="login-input-area register-mg-rt">
                                                        <input type="text" class="form-control" id="user" name="user" value="<?php echo $data['username']; ?>" />                                                        
                                                    </div>                                                   
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Full Name</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                    <div class="login-input-area register-mg-rt">
                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['fullname']; ?>" />                                                        
                                                    </div>                                                   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Password</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="password" class="form-control" id="pass" name="pass"/>                                                
                                            </div>
                                        </div>
                                    </div>                                    
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <div class="login-button-pro">                                                
												<button type="submit" class="login-button login-button-lg">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
									<?php } ?>
                            </div>
                        </form>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
            <!-- Contact End-->
	
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