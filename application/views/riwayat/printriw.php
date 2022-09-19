<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>

    <h3>Riwayat Bahan Kemas Keluar Masuk</h3>

    Periode :
    <?php echo date('d F Y', strtotime($start)); ?> hingga <?php echo date('d F Y', strtotime($end)); ?>

    <table border="1" width="100%" style="text-align: center">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center">No</th>
                <th rowspan="2" style="text-align: center">Tgl Form</th>
                <th rowspan="2" style="text-align: center">No Form</th>
                <th rowspan="2" style="text-align: center">Kode Barang</th>
                <th rowspan="2" colspan="1" style="text-align: center">Nama Barang</th>
                <th colspan="3" style="text-align: center">Masuk</th>
                <th colspan="3" style="text-align: center">Keluar</th>
                <th colspan="3" style="text-align: center">Saldo Akhir</th>
                <th rowspan="2" style="text-align: center">Keterangan</th>
                <th rowspan="2" style="text-align: center">Tanggal input</th>
            </tr>
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
    <script>
        window.print();
    </script>