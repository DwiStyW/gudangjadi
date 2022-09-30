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
                        <h1>Report Saldo Akhir Stok</h1>
                    </div>
                </div>
                <div id="toolbar">
                    <a target="_blank" href="<?= base_url("report/printsa/" . $start . "/" . $end) ?>">
                        <button class="btn btn-sm btn-success login-submit-cs" type="submit">Print</button></a>
                    <a href="<?= base_url("report/report_saldo_akhir") ?>"><button class="btn btn-sm btn-white"
                            type="button">Kembali</button></a>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                Saldo Stok Dari <b><?php echo date('d F Y', strtotime($start)); ?></b> hingga
                                <b><?php echo date('d F Y', strtotime($end)); ?></b>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Golongan</th>
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
                                        $tampil = $this->db->query("SELECT * FROM master, riwayat  WHERE master.kode=riwayat.kode && riwayat.tglform between '$mulai' AND '$end' ORDER BY kdgol ASC, riwayat.kode ASC");
                                        $tampil1 = $this->db->query("SELECT * FROM master ORDER BY kdgol ASC, nama ASC");

                                        $no = 1;
                                        foreach ($tampil1->result() as $data) {
                                            $code = $data->kode;

                                            //SaldoAwal
                                            $in = $this->db->query("SELECT SUM(masuk) AS salIn FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");
                                            $out = $this->db->query("SELECT SUM(keluar) AS salOut FROM riwayat WHERE kode='$code' && tglform between '0001-01-01' AND '$mulai'");

                                            foreach ($in->result() as $ambil) {
                                                foreach ($out->result() as $ambil1) {
                                                    $saldo = $ambil->salIn - $ambil1->salOut;

                                                    //Masuk
                                                    $masuk = $this->db->query("SELECT SUM(masuk) AS mas FROM riwayat  WHERE kode='$code' && tglform between '$start' AND '$end'");
                                                    foreach ($masuk->result() as $ambi) {
                                                        //Keluar
                                                        $keluar = $this->db->query("SELECT SUM(keluar) AS kel FROM riwayat  WHERE kode='$code' && tglform between '$start' AND '$end'");
                                                        foreach ($keluar->result() as $amb) {

                                                            // Saldo Akhir
                                                            $akhirr = $saldo + $ambi->mas - $amb->kel;
                                                            //konvert 3 satuan
                                                            $st1  = floor($akhirr / ($data->max1 * $data->max2));
                                                            $ss  = $akhirr - ($st1 * $data->max1 * $data->max2);
                                                            $st2  = floor($ss / $data->max2);
                                                            $st3  = $ss - $st2 * $data->max2;

                                        ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <?php
                                                                $kdgrup = $data->kdgol;
                                                                //Mastergrup        
                                                                $tampil2 = $this->db->query("select * from golongan WHERE id='$kdgrup'");
                                                                foreach ($tampil2->result() as $data2); ?>
                                        <td><?php echo $data2->kdgol; ?> <?php echo $data2->namagol; ?></td>
                                        <td><?php echo $data->kode; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td>Saldo Akhir </td>
                                        <!-- Saldo Akhir -->
                                        <td><?php echo $st1; ?> </td>
                                        <td><?php echo $st2; ?> </td>
                                        <td><?php echo $st3; ?> </td>
                                    </tr>

                                    <?php $no++;
                                                        }
                                                    }
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