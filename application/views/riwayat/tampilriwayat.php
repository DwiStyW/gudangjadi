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
        $end     = $_POST['end'];
        $code     = $_POST['kode'];
        $mulai = date('Y-m-d', strtotime('-1 days', strtotime($start)));

        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="toolbar">
                        <?php if ($code == "") {
                            $code = 0;
                        } ?>
                        <a target="_blank" href="<?= base_url("riwayat/print/" . "/" . $start . "/" . $end . "/" . $code) ?>">
                            <button class="btn btn-sm btn-success login-submit-cs" type="submit">Print</button></a>
                        <a href="<?= base_url("riwayat") ?>"><button class=" btn btn-white" type="button">Kembali</button></a>
                    </div>
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Riwayat Bahan Kemas Keluar Masuk</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                Periode :
                                <?php echo date('d F Y', strtotime($start)); ?> hingga <?php echo date('d F Y', strtotime($end)); ?>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Tgl Form</th>
                                            <th rowspan="2">No Form</th>
                                            <th rowspan="2">Kode Barang</th>
                                            <th rowspan="2">Nama Barang</th>
                                            <th colspan="3">Masuk</th>
                                            <th colspan="3">Keluar</th>
                                            <th colspan="3">Saldo Akhir</th>
                                            <th rowspan="2">Keterangan</th>
                                            <th rowspan="2">Tanggal input</th>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($riwayat as $r) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $r->tglform ?></td>
                                                <td><?= $r->noform ?></td>
                                                <td><?= $r->kode ?></td>
                                                <td><?= $r->nama ?></td>
                                                <?php
                                                $satss1  = floor($r->masuk / ($r->max1 * $r->max2));
                                                $sisa   = $r->masuk - ($satss1 * $r->max1 * $r->max2);
                                                $satss2  = floor($sisa / $r->max2);
                                                $satss3  = $sisa - $satss2 * $r->max2;
                                                ?>
                                                <td><?= $satss1 ?></td>
                                                <td><?= $satss2 ?></td>
                                                <td><?= $satss3 ?></td>
                                                <?php
                                                $sats1  = floor($r->keluar / ($r->max1 * $r->max2));
                                                $sis   = $r->keluar - ($sats1 * $r->max1 * $r->max2);
                                                $sats2  = floor($sis / $r->max2);
                                                $sats3  = $sis - $sats2 * $r->max2;
                                                ?>
                                                <td><?= $sats1 ?></td>
                                                <td><?= $sats2 ?></td>
                                                <td><?= $sats3 ?></td>
                                                <?php
                                                $sat1  = floor($r->saldo / ($r->max1 * $r->max2));
                                                $si   = $r->saldo - ($sat1 * $r->max1 * $r->max2);
                                                $sat2  = floor($si / $r->max2);
                                                $sat3  = $si - $sat2 * $r->max2;
                                                ?>
                                                <td><?= $sat1 ?></td>
                                                <td><?= $sat2 ?></td>
                                                <td><?= $sat3 ?></td>
                                                <td><?= $r->ket ?></td>
                                                <td><?= $r->tanggal ?></td>
                                            </tr>
                                        <?php } ?>
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