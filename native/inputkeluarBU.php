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
    <title>Input Bahan Keluar | SI Gudang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type='text/javascript' src='ajax.js'></script>
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
    <script src="jquery.js"></script>
    <script>
    $(document).ready(function(){
        $('#q').blur(function(){
            $('#pesan').html('<img style="margin-left:10px; width:10px" src="loading.gif">');
            var q = $(this).val();

            $.ajax({
                type    : 'POST',
                url     : 'cekduplicate.php',
                data    : 'q='+q,
                success : function(data){
                    $('#pesan').html(data);
                }
            })

        });
    });
    </script>
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

<body onload='search()'>
<?php
  $username = $_SESSION['username'];
  $query_user_login = mysql_query("select * from tb_user where username='$username'");
  $user_login = mysql_fetch_array($query_user_login);
  $iduser = $user_login['user_id'];
  ini_set('date.timezone', 'Asia/Jakarta');
  date_default_timezone_set('Asia/Jakarta');
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
                                        <h1>Input Bahan Keluar</h1>                                        
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">											
                                                <div class="all-form-element-inner">
													<?php if(!isset($_POST['submit'])){ ?>
                                                    <form enctype="multipart/form-data" action="insert.php?mode=3.php" method="post">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Tanggal Form</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="tglform" type="date" class="form-control" id="tglform" placeholder="Tanggal" value="<?php echo date("Y-m-d");?>" required/> 											
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">No Form</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="noform" type="text" class="form-control" id="q" placeholder="Nomor Form" required/>
                                                                    <label class="login2 pull-left pull-right-pro" id="pesan"></label>						
                                                                </div>
                                                            </div>
                                                        </div>
														<!-- kode barang -->
														<div class="form-group-inner">   
															<div class="row">
																<div class="col-lg-3">
																	<label class="login2 pull-right pull-right-pro">Kode Barang</label>
																</div>
																<div class="col-lg-9">
																	<div class="form-select-list">
																		<select id="kode" name="kode" class="form-control">
                                                                            <option value=""></option>
                                                                            <?php
                                                                            // ambil data dari database
                                                                            $link = mysqli_connect('localhost', 'root', '', 'gudangjadi');
                                                                            $query = "SELECT * FROM master ORDER BY nama";
                                                                            $hasil = mysqli_query($link, $query);
                                                                            while ($row = mysqli_fetch_array($hasil)) {
                                                                                ?>
                                                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?> | <?php echo $row['sat1'] ?> | <?php echo $row['sat2'] ?> | <?php echo $row['sat3'] ?>  | <?php echo $row['kode'] ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
																	</div>
																</div>				
															</div>
														</div>
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="sat1" type="number" class="form-control" id="sat1" placeholder="Satuan 1">                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="sat2" type="number" class="form-control" id="sat2" placeholder="Satuan 2">                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="sat3" type="number" class="form-control" id="sat3" placeholder="Satuan 3">
                                                                </div>
                                                            </div>
                                                        </div>

														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Tanggal Input</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input name="tgl" type="text" class="form-control" id="tgl" value="<?php echo date("Y-m-d h:i:s");?>" readonly="readonly"/> 
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-9">
                                                                    <input name="adm" type="hidden" class="form-control" id="adm" value="<?php echo $iduser;?>" /> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <a href="keluar.php"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>														
                                                    </form>
                                                    <?php } else { 
                                                        header('HTTP/1.1 302 Found');
                                                        header('Location: insertkeluar.php');
                                                    } ?>
													<!-- Start Form -->														
													<div class="container">
														<div class="row">
															<div class="col-lg-12"> 
																<div class="sparkline8-hd">
																	<div class="main-sparkline8-hd">
																		<h1>Form sudah input</h1>                               
																	</div>
																</div>
																<div class="sparkline8-graph">
																	<div class="datatable-dashv1-list custom-datatable-overright">
																		<table id="tampil" data-toggle="table">												
																		</table>
																	</div>
																</div>
															</div>	
														</div>
													</div>
													<!-- End Form -->	
																
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
    <script type="text/javascript">
        
        var rupiah = document.getElementById('jumlah');

        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^.\d]/g, '').toString(),
            split           = number_string.split('.'),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{1,3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? ',' : '';
                rupiah += separator + ribuan.join(',');
            }

            rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah);
        }
    </script>
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
	<!-- JS Search
		============================================ -->
	<link rel="stylesheet" href="bootstrap.min.css"/>
	<link rel="stylesheet" href="select2-master/dist/css/select2.min.css"/>
	<script src="jquery-2.1.4.min.js"></script>
	<script src="select2-master/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function () {
			$("#kode").select2({
				placeholder: "Please Select"
			});                
		});
	</script>
</body>

</html>