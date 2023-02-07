<?php
ini_set('date.timezone', 'Asia/Jakarta');
$mulai = date('Y-m-d', strtotime('-1 days', strtotime($start)));
?>
<div>
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container " style="position:relative;margin-top:-250px;padding-bottom:51px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Report All</h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div id="toolbar">
                        <a target="_blank" href="<?= base_url("track/report/printrepall/" . $start . "/" . $end) ?>">
                            <button class="btn btn-sm btn-success login-submit-cs" type="submit">Print</button></a>
                        <a href="<?= base_url("track/report/repall") ?>"><button class="btn btn-sm btn-white" type="button">Kembali</button></a>
                    </div>
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                Saldo Stok Dari <b><?php echo date('d F Y', strtotime($start)); ?></b> hingga
                                <b><?php echo date('d F Y', strtotime($end)); ?></b>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Golongan</th> -->
                                        <th>Kode Barang</th>
                                        <th>Nama</th>
                                        <th>Urai</th>
                                        <th>Satuan 1</th>
                                        <th>Satuan 2</th>
                                        <th>Satuan 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = $this->db->query("SELECT * FROM master, riwayattrack  WHERE master.kode=riwayattrack.kode && riwayattrack.tglform between '$start' AND '$end' ORDER BY kdgol ASC, riwayattrack.kode ASC");
                                    $tampil1 = $this->db->query("SELECT * FROM master ORDER BY kode ASC");

                                    $no = 1;
                                    foreach ($tampil1->result() as $data) {
                                        $code = $data->kode;

                                        //SaldoAwal
                                        $in = $this->db->query("SELECT SUM(masuk) AS salIn FROM riwayattrack WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");
                                        $out = $this->db->query("SELECT SUM(keluar) AS salOut FROM riwayattrack WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");

                                        foreach ($in->result() as $ambil);
                                        foreach ($out->result() as $ambil1);
                                        $saldo = $ambil->salIn - $ambil1->salOut;
                                        //konvert 3 satuan
                                        $ts1  = floor($saldo / ($data->max1 * $data->max2));
                                        $its  = $saldo - ($ts1 * $data->max1 * $data->max2);
                                        $ts2  = floor($its / $data->max2);
                                        $ts3  = $its - $ts2 * $data->max2;

                                        //Masuk
                                        $masuk = $this->db->query("SELECT SUM(masuk) AS mas FROM riwayattrack  WHERE kode='$code' && tglform between '$start' AND '$end'");
                                        foreach ($masuk->result() as $ambi) {
                                            //konvert 3 satuan
                                            $tas1  = floor($ambi->mas / ($data->max1 * $data->max2));
                                            $itas  = $ambi->mas - ($tas1 * $data->max1 * $data->max2);
                                            $tas2  = floor($itas / $data->max2);
                                            $tas3  = $itas - $tas2 * $data->max2;

                                            //Keluar
                                            $keluar = $this->db->query("SELECT SUM(keluar) AS kel FROM riwayattrack  WHERE kode='$code' && tglform between '$start' AND '$end'");
                                            foreach ($keluar->result() as $amb) {
                                                //konvert 3 satuan
                                                $sat1  = floor($amb->kel / ($data->max1 * $data->max2));
                                                $sis  = $amb->kel - ($sat1 * $data->max1 * $data->max2);
                                                $sat2  = floor($sis / $data->max2);
                                                $sat3  = $sis - $sat2 * $data->max2;

                                                // Saldo Akhir
                                                $akhirr = $saldo + $ambi->mas - $amb->kel;
                                                //konvert 3 satuan
                                                $st1  = floor($akhirr / ($data->max1 * $data->max2));
                                                $ss  = $akhirr - ($st1 * $data->max1 * $data->max2);
                                                $st2  = floor($ss / $data->max2);
                                                $st3  = $ss - $st2 * $data->max2;

                                    ?>
                                                <tr>
                                                    <td rowspan="4"><?php echo $no; ?></td>
                                                    <?php
                                                    $kdgrup = $data->kdgol;
                                                    //Mastergrup        
                                                    $tampil2 = $this->db->query("select * from golongan WHERE id='$kdgrup'");
                                                    foreach ($tampil2->result() as $data2); ?>
                                                    <!-- <td><?php echo $data2->kdgol; ?> <?php echo $data2->namagol; ?></td> -->
                                                    <td rowspan="4"><?php echo $data->kode; ?></td>
                                                    <td rowspan="4"><?php echo $data->nama; ?></td>
                                                    <td>Saldo Awal </td>
                                                    <!-- Saldo Awal -->
                                                    <td><?php echo $ts1; ?> </td>
                                                    <td><?php echo $ts2; ?> </td>
                                                    <td><?php echo $ts3; ?> </td>
                                                </tr>
                                                <tr>
                                                    <!-- MASUK -->
                                                    <td>Masuk</td>
                                                    <td><?php echo  $tas1; ?></td>
                                                    <td><?php echo  $tas2; ?></td>
                                                    <td><?php echo  $tas3; ?></td>
                                                </tr>
                                                <tr>
                                                    <!-- KELUAR -->
                                                    <td>Keluar</td>
                                                    <td><?php echo $sat1; ?> </td>
                                                    <td><?php echo $sat2; ?> </td>
                                                    <td><?php echo $sat3; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>Saldo Akhir</td>
                                                    <td><?php echo $st1; ?> </td>
                                                    <td><?php echo $st2; ?> </td>
                                                    <td><?php echo $st3; ?> </td>
                                                <tr>
                                        <?php $no++;
                                            }
                                        }
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