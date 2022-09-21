<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>

    <h3>Riwayat Bahan Kemas Keluar Masuk</h3>

    <?php $mulai = date('Y-m-d', strtotime('-1 days', strtotime($start))); ?>
    Periode :
    <?php echo date('d F Y', strtotime($start)); ?> hingga <?php echo date('d F Y', strtotime($end)); ?>

    <table border="1" width="100%" style="text-align: center">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Tgl Form</th>
                <th rowspan="2">No Form</th>
                <th rowspan="2">Kode Barang</th>
                <th rowspan="2">Nama Barang</th>
                <th colspan="3">Masuk</th>
                <th colspan="3">Keluar</th>
                <th colspan="3">Saldo</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Tanggal input</th>
            </tr>
            <?php
            $in = $this->db->query("SELECT SUM(masuk) AS salIn FROM riwayat WHERE kode='$kode' && tglform between '0001-01-01' AND '$mulai'");
            $out = $this->db->query("SELECT SUM(keluar) AS salOut FROM riwayat WHERE kode='$kode' && tglform between '0001-01-01' AND '$mulai'");
            ?>
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
                <td colspan="11">Saldo</td>
                <td><?= $sat1 ?></td>
                <td><?= $sat2 ?></td>
                <td><?= $sat3 ?></td>
                <td>Saldo Awal</td>
                <td><?= $mulai ?></td>
            </tr>
            <?php
            $no = 1;
            foreach ($riwayat as $r) { ?>
                <tr>
                    <?php if ($no == 1) { ?>
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
                        <td><?= $st1 ?></td>
                        <td><?= $st2 ?></td>
                        <td><?= $st3 ?></td>
                        <td><?= $r->ket ?></td>
                        <td><?= $r->tanggal ?></td>
                    <?php } else { ?>

                        <td><?= $no++ ?></td>
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
                        <td><?= $stn1 ?></td>
                        <td><?= $stn2 ?></td>
                        <td><?= $stn3 ?></td>
                        <?php
                        $satn1  = floor($r->keluar / ($r->max1 * $r->max2));
                        $siss   = $r->keluar - ($satn1 * $r->max1 * $r->max2);
                        $satn2  = floor($siss / $r->max2);
                        $satn3  = $siss - $satn2 * $r->max2;
                        ?>
                        <td><?= $satn1 ?></td>
                        <td><?= $satn2 ?></td>
                        <td><?= $satn3 ?></td>
                        <?php if ($no == 2) {

                            //konvert 3 satuan
                            $satu1   = floor($saldo_mutasi1 / ($r->max1 * $r->max2));
                            $sia = $saldo_mutasi1 - ($satu1 * $r->max1 * $r->max2);
                            $satu2  = floor($sia / $r->max2);
                            $satu3  = $sia - $satu2 * $r->max2;
                        ?>
                            <td><?= $satu1 ?></td>
                            <td><?= $satu2 ?></td>
                            <td><?= $satu3 ?></td>
                        <?php } else {
                            $sals1 = $saldo_mutasi1;
                            $saldo_mutasi1 = $sals1 + $r->masuk - $r->keluar;
                            $ss1   = floor($saldo_mutasi1 / ($r->max1 * $r->max2));
                            $sisas = $saldo_mutasi1 - ($ss1 * $r->max1 * $r->max2);
                            $ss2  = floor($sisas / $r->max2);
                            $ss3  = $sisas - $ss2 * $r->max2;
                        ?>
                            <td><?= $ss1 ?></td>
                            <td><?= $ss2 ?></td>
                            <td><?= $ss3 ?></td>
                        <?php } ?>
                        <td><?= $r->ket ?></td>
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
                <td><?= $stts1 ?></td>
                <td><?= $stts2 ?></td>
                <td><?= $stts3 ?></td>
                <?php
                $satuan1  = floor($totalK / ($r->max1 * $r->max2));
                $susuk = $totalK - ($satuan1 * $r->max1 * $r->max2);
                $satuan2  = floor($susuk / $r->max2);
                $satuan3  = $susuk - $satuan2 * $r->max2;
                ?>
                <td><?= $satuan1 ?></td>
                <td><?= $satuan2 ?></td>
                <td><?= $satuan3 ?></td>
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