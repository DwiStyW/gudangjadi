<?php
ini_set('date.timezone', 'Asia/Jakarta');
$mulai  = date('Y-m-d', strtotime('-1 days', strtotime($start)));
//Mastergrup        
$tampil2 = $this->db->query("SELECT * FROM golongan WHERE id='$kode'");
foreach ($tampil2->result() as $gol) {
    $namagol = $gol->namagol;
}
?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container " style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Report Saldo Barang Jadi</h1>

                    </div>
                </div>
                <div id="toolbar">
                    <a target="_blank" href="<?= base_url("golongan/printrepgr/" . $start . "/" . $end . "/" . $kode) ?>">
                        <button class="btn btn-sm btn-success login-submit-cs" type="submit">Print</button></a>
                    <a href="<?= base_url("golongan/filgolongan") ?>"><button class="btn btn-sm btn-white" type="button">Kembali</button></a>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar" style="margin-bottom:20px">
                                Saldo Stok Golongan <b><?php echo $namagol; ?></b> Dari
                                <b><?php echo date('d F Y', strtotime($start)); ?></b> hingga
                                <b><?php echo date('d F Y', strtotime($end)); ?></b>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
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
                                    // $tampil = mysqli_query($conn, "SELECT * FROM master, riwayat  WHERE master.kode=riwayat.kode && master.kdgol='$kode' && riwayat.tglform between '$mulai' AND '$end' ORDER BY no ASC");
                                    $tampil1 = $this->db->query("SELECT * FROM master WHERE kdgol='$kode' ORDER BY kode ASC");

                                    $no = 1;
                                    foreach ($tampil1->result() as $data) {
                                        $code = $data->kode;
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data->kode; ?></td>
                                            <td><?php echo $data->nama; ?> </td>

                                            <!-- Sal Awal -->
                                            <?php
                                            $in = $this->db->query("SELECT SUM(masuk) AS salIn FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");
                                            $out = $this->db->query("SELECT SUM(keluar) AS salOut FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");

                                            foreach ($in->result() as $ambil) {
                                                foreach ($out->result() as $ambil1) {
                                                    $saldo = $ambil->salIn - $ambil1->salOut;
                                                    //konvert 3 satuan
                                                    $ts1  = floor($saldo / ($data->max1 * $data->max2));
                                                    $its  = $saldo - ($ts1 * $data->max1 * $data->max2);
                                                    $ts2  = floor($its / $data->max2);
                                                    $ts3  = $its - $ts2 * $data->max2;
                                            ?>
                                                    <td> <?php echo $ts1; ?></td>
                                                    <td><?php echo $ts2; ?> </td>
                                                    <td><?php echo $ts3; ?> </td>

                                                    <!-- Masuk -->
                                                    <?php
                                                    $masuk = $this->db->query("SELECT SUM(masuk) AS mas FROM riwayat  WHERE kode='$code' && tglform between '$mulai' AND '$end'");
                                                    foreach ($masuk->result() as $ambi) {
                                                        //konvert 3 satuan
                                                        $tas1  = floor($ambi->mas / ($data->max1 * $data->max2));
                                                        $itas  = $ambi->mas - ($tas1 * $data->max1 * $data->max2);
                                                        $tas2  = floor($itas / $data->max2);
                                                        $tas3  = $itas - $tas2 * $data->max2;
                                                    } ?>
                                                    <td><?php echo  $tas1; ?></td>
                                                    <td><?php echo  $tas2; ?></td>
                                                    <td><?php echo  $tas3; ?></td>

                                                    <!-- Keluar -->
                                                    <?php
                                                    $keluar = $this->db->query("SELECT SUM(keluar) AS kel FROM riwayat  WHERE kode='$code' && tglform between '$mulai' AND '$end'");
                                                    foreach ($keluar->result() as $amb) {
                                                        //konvert 3 satuan
                                                        $sat1  = floor($amb->kel / ($data->max1 * $data->max2));
                                                        $sis  = $amb->kel - ($sat1 * $data->max1 * $data->max2);
                                                        $sat2  = floor($sis / $data->max2);
                                                        $sat3  = $sis - $sat2 * $data->max2;
                                                    ?>
                                                        <td><?php echo $sat1; ?> </td>
                                                        <td><?php echo $sat2; ?> </td>
                                                        <td><?php echo $sat3; ?> </td>

                                                        <!-- Sal Akhir -->
                                                        <?php
                                                        $akhirr = $saldo + $ambi->mas - $amb->kel;
                                                        //konvert 3 satuan
                                                        $st1  = floor($akhirr / ($data->max1 * $data->max2));
                                                        $ss  = $akhirr - ($st1 * $data->max1 * $data->max2);
                                                        $st2  = floor($ss / $data->max2);
                                                        $st3  = $ss - $st2 * $data->max2;
                                                        ?>
                                                        <td><?php echo $st1; ?> </td>
                                                        <td><?php echo $st2; ?> </td>
                                                        <td><?php echo $st3; ?> </td>
                                            <?php    }
                                                }
                                            } ?>
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