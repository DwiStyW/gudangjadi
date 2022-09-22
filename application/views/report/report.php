<body onload='search()'>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    // $iduser = $user_login['user_id'];
    ini_set('date.timezone', 'Asia/Jakarta');
    date_default_timezone_set('Asia/Jakarta');
    ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Data table area Start-->
    <div>
        <div class="admin-dashone-data-table-area mg-b-40">
            <div class="container " style="position:relative;margin-top:-250px;padding-bottom:100px;z-index: 1">
                <div class="d-flex">
                    <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                        <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                            <h1>Report All</h1>
                        </div>
                    </div>
                    <div style="background-color:#fff">
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form enctype="multipart/form-data" id="cari"
                                                action="<?= base_url("report/tampilreport") ?>" method="post">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Range
                                                                Tanggal</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="input-daterange input-group" id="datepicker">
                                                                <input type="date" class="form-control" id="start"
                                                                    name="start" required />
                                                                <span class="input-group-addon">to</span>
                                                                <input type="date" class="form-control" id="end"
                                                                    name="end" required />
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
                                                                    <a href="<?= base_url() ?>"><button
                                                                            class="btn btn-white"
                                                                            type="button">Kembali</button></a>
                                                                    <button
                                                                        class="btn btn-sm btn-primary login-submit-cs"
                                                                        onclick="mendal()" type="button">Cari</button>
                                                                    <a
                                                                        href="<?= base_url("report/report_saldo_akhir") ?>"><button
                                                                            class="btn btn-sm btn-warning"
                                                                            type="button">Saldo Akhir Stock
                                                                        </button></a>
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
    </div>
    <!-- Data table area End-->

    <script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
    <script>
    function mendal() {
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;
        const s = new Date(start);
        const e = new Date(end);
        if (s.getTime() > e.getTime() || start == "" || end == "") {
            Swal.fire(
                'Peingatan!',
                'Pastikan anda memasukkan tanggal dengan benar.',
                'error'
            )
        } else {
            document.getElementById("cari").submit();
        }
    }
    </script>