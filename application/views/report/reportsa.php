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
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline12-list shadow-reset mg-t-30">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Report Saldo Akhir</h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="all-form-element-inner">
                                                <form enctype="multipart/form-data" id="cari" action="<?= base_url("report/tampilsalakhir") ?>" method="post">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <label class="login2 pull-right pull-right-pro">Range Tanggal</label>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="input-daterange input-group" id="datepicker">
                                                                    <input type="date" class="form-control" id="start" name="start" required />
                                                                    <span class="input-group-addon">to</span>
                                                                    <input type="date" class="form-control" id="end" name="end" required />
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
                                                                        <a href="report.php"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="button" onclick="mendal()">Cari</button>
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