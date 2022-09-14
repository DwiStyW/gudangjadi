<?php
// include "koneksi.php";
// include "cek-login.php";

// $timeout = 10; // Set timeout menit
// $logout_redirect_url = "logout.php"; // Set logout URL



// $timeout = $timeout * 60; // Ubah menit ke detik
// if (isset($_SESSION['start_time'])) {
//     $elapsed_time = time() - $_SESSION['start_time'];
//     if ($elapsed_time >= $timeout) {
//         session_destroy();
//         echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
//     }
// }
// $_SESSION['start_time'] = time();
?>

<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- Data table area Start-->
    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Input Master Barang</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <?php foreach ($master as $m) : ?>
                                                <form enctype="multipart/form-data" action="<?= base_url('master/update_master') ?>" method="post">

                                                    <input name="id" type="hidden" class="form-control" id="id" value="<?php echo $m->id; ?>" readonly="readonly" />

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Kode barang</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="kode" type="text" class="form-control" id="kode" value="<?php echo $m->kode; ?>" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Nama barang</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $m->nama; ?>" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Ukuran</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="ukuran" type="text" class="form-control" id="ukuran" value="<?php echo $m->ukuran; ?>" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- 3 Satuan -->
                                                    <br />
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="sat1" type="text" class="form-control" id="sat1" value="<?php echo $m->sat1; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Isi Satuan 1</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="max1" type="text" class="form-control" id="max1" value="<?php echo $m->max1; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="sat2" type="text" class="form-control" id="sat2" value="<?php echo $m->sat2; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Isi Satuan 2</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="max2" type="text" class="form-control" id="max2" value="<?php echo $m->max2; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="sat3" type="text" class="form-control" id="sat3" value="<?php echo $m->sat3; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Golongan</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="form-select-list">
                                                                    <select id="kdgol" name="kdgol" class="form-control">
                                                                        <?php foreach ($golongan as $g) {
                                                                            if ($m->kdgol == $g->id) { ?>
                                                                                <option selected value=<?= $g->id ?>><?= $g->namagol ?></option>
                                                                            <?php } else { ?>
                                                                                <option value=<?= $g->id ?>><?= $g->namagol ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Jenis</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="form-select-list">
                                                                    <select id="kdjenis" name="kdjenis" class="form-control">
                                                                        <?php foreach ($jenis as $j) {
                                                                            if ($m->kdjenis == $j->id) { ?>
                                                                                <option selected value=<?= $j->id ?>><?= $j->namajenis ?></option>
                                                                            <?php } else { ?>
                                                                                <option value=<?= $j->id ?>><?= $j->namajenis ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <a href="<?= base_url('master') ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            <?php endforeach; ?>
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