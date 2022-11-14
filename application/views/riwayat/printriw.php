<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>

<h3>Riwayat Bahan Kemas Keluar Masuk</h3>

<?php $mulai = date('Y-m-d', strtotime('-1 days', strtotime($start))); ?>
Periode :
<?php echo date('d F Y', strtotime($start)); ?> hingga <?php echo date('d F Y', strtotime($end)); ?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th rowspan="2" style="text-align: center">No</th>
            <th rowspan="2" style="text-align: center">Tgl Form</th>
            <th rowspan="2" style="text-align: center">No Form</th>
            <th rowspan="2" style="text-align: center">Kode Barang</th>
            <th rowspan="2" style="text-align: center">Nama Barang</th>
            <th colspan="3" style="text-align: center">Masuk</th>
            <th colspan="3" style="text-align: center">Keluar</th>
            <th colspan="3" style="text-align: center">Saldo</th>
            <th rowspan="2" style="text-align: center">Keterangan</th>
            <th rowspan="2" style="text-align: center">Tanggal input</th>
        </tr>
        <?php
            $in = $this->db->query("SELECT SUM(masuk) AS salIn FROM riwayat WHERE kode='$kode' && tglform between '0001-01-01' AND '$mulai'");
            $out = $this->db->query("SELECT SUM(keluar) AS salOut FROM riwayat WHERE kode='$kode' && tglform between '0001-01-01' AND '$mulai'");
            ?>
        <tr>
            <th style="text-align: center">Sat 1</th>
            <th style="text-align: center">Sat 2</th>
            <th style="text-align: center">Sat 3</th>
            <th style="text-align: center">Sat 1</th>
            <th style="text-align: center">Sat 2</th>
            <th style="text-align: center">Sat 3</th>
            <th style="text-align: center">Sat 1</th>
            <th style="text-align: center">Sat 2</th>
            <th style="text-align: center">Sat 3</th>
        </tr>
        <?php foreach ($in->result() as $datin) {
                $dataIn = $datin->salIn;
            }
            foreach ($out->result() as $datout) {
                $dataOut = $datout->salOut;
            }
            foreach ($riwayat as $r) {
            }
            $sals = $dataIn - $dataOut;
            $sat1  = floor($sals / ($r->max1 * $r->max2));
            $sisa   = $sals - ($sat1 * $r->max1 * $r->max2);
            $sat2  = floor($sisa / $r->max2);
            $sat3  = $sisa - $sat2 * $r->max2;
            ?>
    </thead>
    <tbody>
        <tr>
            <td colspan="11" style="text-align: center">Saldo</td>
            <td style="text-align: center"><?= $sat1 ?></td>
            <td style="text-align: center"><?= $sat2 ?></td>
            <td style="text-align: center"><?= $sat3 ?></td>
            <td style="text-align: center">Saldo Awal</td>
            <td style="text-align: center"><?= $mulai ?></td>
        </tr>
        <?php
            $no = 1;
            foreach ($riwayat as $r) { ?>
        <tr>
            <?php if ($no == 1) { ?>
            <td style="text-align: center"><?= $no++ ?></td>
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
            <td style="text-align: center"><?= $satss1 ?></td>
            <td style="text-align: center"><?= $satss2 ?></td>
            <td style="text-align: center"><?= $satss3 ?></td>
            <?php
                        $sats1  = floor($r->keluar / ($r->max1 * $r->max2));
                        $sis   = $r->keluar - ($sats1 * $r->max1 * $r->max2);
                        $sats2  = floor($sis / $r->max2);
                        $sats3  = $sis - $sats2 * $r->max2;
                        ?>
            <td style="text-align: center"><?= $sats1 ?></td>
            <td style="text-align: center"><?= $sats2 ?></td>
            <td style="text-align: center"><?= $sats3 ?></td>
            <?php
                        $saldo_mutasi = $sals + $r->masuk - $r->keluar;
                        if ($r->masuk > 0) {
                            $saldo_mutasi1 = $saldo_mutasi + $r->keluar;
                        } else {
                            $saldo_mutasi1 = $saldo_mutasi + $r->masuk;
                        }
                        //konvert 3 satuan
                        $st1   = floor($saldo_mutasi / ($r->max1 * $r->max2));
                        $sissa = $saldo_mutasi - ($st1 * $r->max1 * $r->max2);
                        $st2  = floor($sissa / $r->max2);
                        $st3  = $sissa - $st2 * $r->max2;
                        ?>
            <td style="text-align: center"><?= $st1 ?></td>
            <td style="text-align: center"><?= $st2 ?></td>
            <td style="text-align: center"><?= $st3 ?></td>
            <td style="text-align: center"><?= $r->ket ?></td>
            <td style="text-align: center"><?= $r->tanggal ?></td>
            <?php } else { ?>

            <td style="text-align: center"><?= $no++ ?></td>
            <td><?= $r->tglform ?></td>
            <td><?= $r->noform ?></td>
            <td><?= $r->kode ?></td>
            <td><?= $r->nama ?></td>
            <?php
                        $stn1  = floor($r->masuk / ($r->max1 * $r->max2));
                        $ssa   = $r->masuk - ($stn1 * $r->max1 * $r->max2);
                        $stn2  = floor($ssa / $r->max2);
                        $stn3  = $ssa - $stn2 * $r->max2;
                        ?>
            <td style="text-align: center"><?= $stn1 ?></td>
            <td style="text-align: center"><?= $stn2 ?></td>
            <td style="text-align: center"><?= $stn3 ?></td>
            <?php
                        $satn1  = floor($r->keluar / ($r->max1 * $r->max2));
                        $siss   = $r->keluar - ($satn1 * $r->max1 * $r->max2);
                        $satn2  = floor($siss / $r->max2);
                        $satn3  = $siss - $satn2 * $r->max2;
                        ?>
            <td style="text-align: center"><?= $satn1 ?></td>
            <td style="text-align: center"><?= $satn2 ?></td>
            <td style="text-align: center"><?= $satn3 ?></td>
            <?php if ($no == 2) {

                            //konvert 3 satuan
                            $satu1   = floor($saldo_mutasi1 / ($r->max1 * $r->max2));
                            $sia = $saldo_mutasi1 - ($satu1 * $r->max1 * $r->max2);
                            $satu2  = floor($sia / $r->max2);
                            $satu3  = $sia - $satu2 * $r->max2;
                        ?>
            <td style="text-align: center"><?= $satu1 ?></td>
            <td style="text-align: center"><?= $satu2 ?></td>
            <td style="text-align: center"><?= $satu3 ?></td>
            <?php } else {
                            $sals1 = $saldo_mutasi1;
                            $saldo_mutasi1 = $sals1 + $r->masuk - $r->keluar;
                            $ss1   = floor($saldo_mutasi1 / ($r->max1 * $r->max2));
                            $sisas = $saldo_mutasi1 - ($ss1 * $r->max1 * $r->max2);
                            $ss2  = floor($sisas / $r->max2);
                            $ss3  = $sisas - $ss2 * $r->max2;
                        ?>
            <td style="text-align: center"><?= $ss1 ?></td>
            <td style="text-align: center"><?= $ss2 ?></td>
            <td style="text-align: center"><?= $ss3 ?></td>
            <?php } ?>
            <td style="text-align: center"><?= $r->ket ?></td>
            <td><?= $r->tanggal ?></td>
            <?php } ?>
        </tr>
        <?php }
            $allin = $this->db->query("SELECT SUM(masuk) AS sumIn FROM riwayat WHERE  keluar='0'&& kode='$kode' && tglform between '$start' AND '$end'");
            $allout = $this->db->query("SELECT SUM(keluar) AS sumOut FROM riwayat WHERE masuk='0' && kode='$kode' && tglform between '$start' AND '$end'");
            foreach ($allin->result() as $m) {
                $totalM = $m->sumIn;
            }
            foreach ($allout->result() as $k) {
                $totalK = $k->sumOut;
            } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <?php
                $stts1  = floor($totalM / ($r->max1 * $r->max2));
                $sit = $totalM - ($stts1 * $r->max1 * $r->max2);
                $stts2  = floor($sit / $r->max2);
                $stts3  = $sit - $stts2 * $r->max2;
                ?>
            <td style="text-align: center"><?= $stts1 ?></td>
            <td style="text-align: center"><?= $stts2 ?></td>
            <td style="text-align: center"><?= $stts3 ?></td>
            <?php
                $satuan1  = floor($totalK / ($r->max1 * $r->max2));
                $susuk = $totalK - ($satuan1 * $r->max1 * $r->max2);
                $satuan2  = floor($susuk / $r->max2);
                $satuan3  = $susuk - $satuan2 * $r->max2;
                ?>
            <td style="text-align: center"><?= $satuan1 ?></td>
            <td style="text-align: center"><?= $satuan2 ?></td>
            <td style="text-align: center"><?= $satuan3 ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
    </tbody>
</table>
<script>
window.print();
</script>