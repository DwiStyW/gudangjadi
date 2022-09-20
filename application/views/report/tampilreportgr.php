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
    <div class="admin-dashone-data-table-area mg-b-40">
        <br />
        <?php $start  = $_POST['start'];
        $end    = $_POST['end'];
        $mulai  = date('Y-m-d', strtotime('-1 days', strtotime($start)));
        $kode   = $_POST['kode'];

        //Mastergrup        
        $tampil2 = mysqli_query($conn, "select * from golongan WHERE id='$kode'");
        $data2 = mysqli_fetch_array($tampil2);

        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Report Saldo Barang Jadi</h1>
                            </div>
                        </div>
                        <div id="toolbar">
                            <a target="_blank"
                                href="printrepgr.php?start=<?php echo $start; ?>&end=<?php echo $end; ?>&kode=<?php echo $kode; ?>">
                                <button class="btn btn-sm btn-success login-submit-cs" type="submit">Print</button></a>
                            <a href="reportgr.php"><button class="btn btn-sm btn-white"
                                    type="button">Kembali</button></a>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    Saldo Stok Golongan <b><?php echo $data2['namagol']; ?></b> Dari
                                    <b><?php echo date('d F Y', strtotime($start)); ?></b> hingga
                                    <b><?php echo date('d F Y', strtotime($end)); ?></b>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true"
                                    data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"
                                    data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kode Barang</th>
                                            <th rowspan="2" colspan="1">Nama</th>
                                            <th rowspan="1" colspan="3">Saldo Awal</th>
                                            <th colspan="3">Masuk</th>
                                            <th colspan="3">Keluar</th>
                                            <th colspan="3">Saldo Akhir</th>
                                        </tr>
                                        <tr>
                                            <th>Sat 1</th>
                                            <th>Sat 2</th>
                                            <th>Sat 3</th>
                                            <th>Sat 1</th>
                                            <th>Sat 2</th>
                                            <th>Sat 3</th>
                                            <th>Sat 1</th>
                                            <th>Sat 2</th>
                                            <th>Sat 3</th>
                                            <th>Sat 1</th>
                                            <th>Sat 2</th>
                                            <th>Sat 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $tampil = mysqli_query($conn, "SELECT * FROM master, riwayat  WHERE master.id=riwayat.kode && master.kdgol='$kode' && riwayat.tglform between '$mulai' AND '$end' ORDER BY no ASC");
                                        $tampil1 = mysqli_query($conn, "SELECT * FROM master WHERE kdgol='$kode' ORDER BY kode ASC");

                                        $no = 1;
                                        while ($data = mysqli_fetch_array($tampil1)) {
                                            $code = $data['id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['kode']; ?></td>
                                            <td><?php echo $data['nama']; ?> </td>


                                        </tr>
                                        <?php
                                        } ?>
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