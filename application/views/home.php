<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container " style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Saldo Barang Jadi</h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">

                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>

                                    <th data-field="no">No</th>
                                    <th data-field="grup">Golongan</th>
                                    <th data-field="subgrup">Jenis</th>
                                    <th data-field="kode">Kode Barang</th>
                                    <th data-field="nama">Nama Barang</th>
                                    <th data-field="satuan1">Satuan 1</th>
                                    <th data-field="satuan2">Satuan 2</th>
                                    <th data-field="satuan3">Satuan 3</th>
                                    <th data-field="tglform">Tgl Form Terakhir</th>
                                    <th data-field="tanggal">Tanggal Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $tampil = mysqli_query($conn, "SELECT * from saldo, master WHERE master.kode=saldo.kode");

                                    // $no = 1;
                                    // while ($data = mysqli_fetch_array($tampil)) {
                                    $no = 1;
                                    foreach ($saldo as $s) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $s->namagol ?></td>
                                        <td><?= $s->namajenis ?></td>
                                        <td><?php echo $s->kode ?></td>
                                        <td><?php echo $s->nama ?></td>
                                        <?php
                                            //Perhitungan 3 Satuan
                                            $sats1  = floor($s->saldo / ($s->max1 * $s->max2));
                                            $sisa   = $s->saldo - ($sats1 * $s->max1 * $s->max2);
                                            $sats2  = floor($sisa / $s->max2);
                                            $sats3  = $sisa - $sats2 * $s->max2;
                                            ?>
                                        <td><?php echo $sats1; ?> <?php echo $s->sat1; ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $s->sat2; ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $s->sat3; ?></td>
                                        <td><?= $s->tglform ?></td>
                                        <td><?= $s->tanggal ?></td>
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
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-150px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Riwayat Bahan Masuk Keluar</h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tglform">Tgl Form</th>
                                        <th data-field="noform">No Form</th>
                                        <th data-field="nama">Nama Barang</th>
                                        <th data-field="satuan1">Satuan 1</th>
                                        <th data-field="satuan2">Satuan 2</th>
                                        <th data-field="satuan3">Satuan 3</th>
                                        <th data-field="saldo">Ket</th>
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="adm">Oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($riwayat as $r) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($r->tglform)); ?></td>
                                        <td><?php echo $r->noform; ?></td>
                                        <td><?php echo $r->nama; ?></td>
                                        <?php
                                            if ($r->masuk == 0) {
                                                $total = $r->keluar;
                                            } else {
                                                $total = $r->masuk;
                                            }

                                            //Perhitungan 3 Satuan
                                            $sats1  = floor($total / ($r->max1 * $r->max2));
                                            $sisa   = $total - ($sats1 * $r->max1 * $r->max2);
                                            $sats2  = floor($sisa / $r->max2);
                                            $sats3  = $sisa - $sats2 * $r->max2;
                                            ?>
                                        <td><?php echo $sats1; ?> <?php echo $r->sat1; ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $r->sat2; ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $r->sat3; ?></td>
                                        <td><?php echo $r->ket; ?></td>
                                        <td><?php echo $r->tanggal; ?></td>
                                        <td><a
                                                href="penginput.php?user=<?php echo $r->user_id; ?>"><?php echo $r->username; ?></a>
                                        </td>
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
<!-- Data mobile-->
<div class="layarsedangmengecil">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div style="position:relative;margin-top:-400px;padding-bottom:290px;
            z-index: 1;margin-left:20px;margin-right:20px;width:auto">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="container">
                        <h4 class="mt-3 mb-3 ml-3"><b>Saldo Barang Jadi</b></h4>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">

                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>

                                    <th data-field="no">No</th>
                                    <th data-field="grup">Golongan</th>
                                    <th data-field="subgrup">Jenis</th>
                                    <th data-field="kode">Kode Barang</th>
                                    <th data-field="nama">Nama Barang</th>
                                    <th data-field="satuan1">Satuan 1</th>
                                    <th data-field="satuan2">Satuan 2</th>
                                    <th data-field="satuan3">Satuan 3</th>
                                    <th data-field="tglform">Tgl Form Terakhir</th>
                                    <th data-field="tanggal">Tanggal Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $tampil = mysqli_query($conn, "SELECT * from saldo, master WHERE master.kode=saldo.kode");

                                    // $no = 1;
                                    // while ($data = mysqli_fetch_array($tampil)) {
                                    $no = 1;
                                    foreach ($saldo as $s) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $s->namagol ?></td>
                                        <td><?= $s->namajenis ?></td>
                                        <td><?php echo $s->kode ?></td>
                                        <td><?php echo $s->nama ?></td>
                                        <?php
                                            //Perhitungan 3 Satuan
                                            $sats1  = floor($s->saldo / ($s->max1 * $s->max2));
                                            $sisa   = $s->saldo - ($sats1 * $s->max1 * $s->max2);
                                            $sats2  = floor($sisa / $s->max2);
                                            $sats3  = $sisa - $sats2 * $s->max2;
                                            ?>
                                        <td><?php echo $sats1; ?> <?php echo $s->sat1; ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $s->sat2; ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $s->sat3; ?></td>
                                        <td><?= $s->tglform ?></td>
                                        <td><?= $s->tanggal ?></td>
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
    <div class="admin-dashone-data-table-area mg-b-40">
        <div style="position:relative;margin-top:-240px;padding-bottom:32px;
            z-index: 1;margin-left:20px;margin-right:20px;width:auto">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="container">
                        <h4 class="mt-3 mb-3 ml-3"><b>Riwayat Bahan Masuk Keluar</b></h4>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tglform">Tgl Form</th>
                                        <th data-field="noform">No Form</th>
                                        <th data-field="nama">Nama Barang</th>
                                        <th data-field="satuan1">Satuan 1</th>
                                        <th data-field="satuan2">Satuan 2</th>
                                        <th data-field="satuan3">Satuan 3</th>
                                        <th data-field="saldo">Ket</th>
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="adm">Oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($riwayat as $r) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($r->tglform)); ?></td>
                                        <td><?php echo $r->noform; ?></td>
                                        <td><?php echo $r->nama; ?></td>
                                        <?php
                                            if ($r->masuk == 0) {
                                                $total = $r->keluar;
                                            } else {
                                                $total = $r->masuk;
                                            }

                                            //Perhitungan 3 Satuan
                                            $sats1  = floor($total / ($r->max1 * $r->max2));
                                            $sisa   = $total - ($sats1 * $r->max1 * $r->max2);
                                            $sats2  = floor($sisa / $r->max2);
                                            $sats3  = $sisa - $sats2 * $r->max2;
                                            ?>
                                        <td><?php echo $sats1; ?> <?php echo $r->sat1; ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $r->sat2; ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $r->sat3; ?></td>
                                        <td><?php echo $r->ket; ?></td>
                                        <td><?php echo $r->tanggal; ?></td>
                                        <td><a
                                                href="penginput.php?user=<?php echo $r->user_id; ?>"><?php echo $r->username; ?></a>
                                        </td>
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