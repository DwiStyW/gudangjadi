<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    // $iduser = $user_login['user_id'];
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
                                <h1>Edit Input Bahan</h1>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <?php foreach ($riwayat as $r) : ?>
                                                <form enctype="multipart/form-data" action="<?= base_url("masuk/update_masuk") ?>" method="post">
                                                    <input name="no" type="hidden" class="form-control" id="no" value="<?php echo $r->no; ?>" />
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Tanggal Form</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="tglform" type="date" class="form-control" id="tglform" value="<?php echo $r->tglform; ?>" required />

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $query = $this->db->query("SELECT * FROM master WHERE id = '$r->kode'");
                                                    foreach ($query->result() as $master) {
                                                        $nama = $master->nama;
                                                        $max1 = $master->max1;
                                                        $max2 = $master->max2;
                                                    }
                                                    ?>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Nama barang</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="name" type="text" class="form-control" id="name" value="<?php echo $nama; ?> -|<?= $master->sat1 ?>|-|<?= $master->sat2 ?>|-|<?= $master->sat3 ?>|-|<?= $master->kode ?>|" readonly="readonly" />
                                                                <input name="kode" type="hidden" class="form-control" id="kode" value="<?php echo $r->kode ?>" readonly="readonly" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">No Form</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="noform" type="text" class="form-control" id="noform" value="<?php echo $r->noform; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    // Perhitungan 3 Satuan
                                                    $sats1  = floor($r->masuk / ($max1 * $max2));
                                                    $sisa   = $r->masuk - ($sats1 * $max1 * $max2);
                                                    $sats2  = floor($sisa / $max2);
                                                    $sats3  = $sisa - $sats2 * $max2;
                                                    ?>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <input name="sats1" type="number" class="form-control" value="<?= $sats1 ?>" placeholder="Satuan 1">
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <input readonly id=sat1 class="form-control" value="<?= $master->sat1 ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <input name="sats2" type="number" class="form-control" value="<?= $sats2 ?>" placeholder="Satuan 2">
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <input readonly id=sat2 class="form-control" value="<?= $master->sat2 ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <input name="sats3" type="number" class="form-control" value="<?= $sats3 ?>" placeholder="Satuan 3">
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <input readonly id=sat3 class="form-control" value="<?= $master->sat3 ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Tanggal Input</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="tgl" type="text" class="form-control" id="tgl" value="<?php echo date("Y-m-d h:i:s"); ?>" readonly="readonly" />
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Catatan</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <input name="cat" value="<?php echo $r->cat ?>" type="text" class="form-control" id="cat" placeholder="Catatan" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-9">
                                                                <input name="adm" type="hidden" class="form-control" id="adm" value="<?= $this->session->userdata('user_id');; ?>" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <a href="<?= base_url('masuk') ?>"><button class="btn btn-white" type="button">Kembali</button></a>
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