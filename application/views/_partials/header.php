<?php
//auto logout 10 menit
$timeout = 10000; // Set timeout menit
$logout_redirect_url = base_url("auth/logout"); // Set logout URL



$timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
  $elapsed_time = time() - $_SESSION['start_time'];
  if ($elapsed_time >= $timeout) {
    session_destroy();
    echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
  }
}
$_SESSION['start_time'] = time(); ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Saldo Bahan Kemas | SI Gudang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
    <!-- charts C3 CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/c3.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/form/all-type-forms.css">
    <!-- switcher CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/switcher/color-switcher.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-1.3.2.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-ui-1.7.2.custom.min.js"></script>
    <!-- Color Css Files
		============================================ -->
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-one.css"
        title="color-one" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-two.css"
        title="color-two" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-three.css"
        title="color-three" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-four.css"
        title="color-four" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-five.css"
        title="color-five" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-six.css"
        title="color-six" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-seven.css"
        title="color-seven" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-eight.css"
        title="color-eight" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-nine.css"
        title="color-nine" media="screen" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url() ?>assets/css/switcher/color-ten.css"
        title="color-ten" media="screen" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/select2-master/dist/css/select2.min.css" />
    <!-- <link id="pagestyle" href="<?= base_url()?>assets/css/soft-design-system-no-tb.css" rel="stylesheet" /> -->

</head>