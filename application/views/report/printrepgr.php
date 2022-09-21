    <style type="text/css">
        .spasi {
            padding-left: 5px;
            padding-right: 5px;

        }
    </style>

    <body>
        <?php
        // $username = $_SESSION['username'];
        // $query_user_login = mysql_query("select * from tb_user where username='$username'");
        // $user_login = mysql_fetch_array($query_user_login);
        ini_set('date.timezone', 'Asia/Jakarta');
        ?>

        <?php
        $mulai  = date('Y-m-d', strtotime('-1 days', strtotime($start)));

        //Mastergrup        
        $tampil2 = $this->db->query("select * from golongan WHERE id='$kode'");
        foreach ($tampil2->result() as $dataa) {
            $namagol = $dataa->namagol;
        }

        ?>
        <h3>Report Saldo Barang Jadi</h3>
        Saldo Stok Golongan <b><?php echo $namagol; ?></b> Dari <b><?php echo date('d F Y', strtotime($start)); ?></b> hingga <b><?php echo date('d F Y', strtotime($end)); ?></b>

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align: center">No</th>
                    <th rowspan="2" style="text-align: center">Kode Barang</th>
                    <th rowspan="2" colspan="1" style="text-align: center">Nama</th>
                    <th rowspan="1" colspan="3" style="text-align: center">Saldo Awal</th>
                    <th colspan="3" style="text-align: center">Masuk</th>
                    <th colspan="3" style="text-align: center">Keluar</th>
                    <th colspan="3" style="text-align: center">Saldo Akhir</th>
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
                $tampil = $this->db->query("SELECT * FROM master, riwayat  WHERE master.id=riwayat.kode && master.kdgol='$kode' && riwayat.tglform between '$mulai' AND '$end' ORDER BY no ASC");
                $tampil1 = $this->db->query("SELECT * FROM master WHERE kdgol='$kode' ORDER BY kode ASC");


                $no = 1;
                foreach ($tampil1->result() as $data) {
                    $code = $data->id;
                ?>
                    <tr style="text-align: center">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->kode; ?></td>
                        <td style="text-align: left; padding-left: 10px;"><?php echo $data->nama; ?> </td>

                        <!-- Sal Awal -->
                        <td> <?php
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
                                        echo $ts1; ?>
                        </td>
                        <td><?php echo $ts2; ?> </td>
                        <td><?php echo $ts3; ?> </td->
                            <!-- Masuk -->
                        <td><?php
                                        $masuk = $this->db->query("SELECT SUM(masuk) AS mas FROM riwayat  WHERE kode='$code' && tglform between '$mulai' AND '$end'");
                                        foreach ($masuk->result() as $ambi) {
                                            //konvert 3 satuan
                                            $tas1  = floor($ambi->mas / ($data->max1 * $data->max2));
                                            $itas  = $ambi->mas - ($tas1 * $data->max1 * $data->max2);
                                            $tas2  = floor($itas / $data->max2);
                                            $tas3  = $itas - $tas2 * $data->max2;
                                            echo  $tas1; ?></td>
                        <td><?php echo  $tas2; ?></td>
                        <td><?php echo  $tas3; ?></td>

                        <!-- Keluar -->
                        <td><?php
                                            $keluar = $this->db->query("SELECT SUM(keluar) AS kel FROM riwayat  WHERE kode='$code' && tglform between '$mulai' AND '$end'");
                                            foreach ($keluar->result() as $amb) {
                                                //konvert 3 satuan
                                                $sat1  = floor($amb->kel / ($data->max1 * $data->max2));
                                                $sis  = $amb->kel - ($sat1 * $data->max1 * $data->max2);
                                                $sat2  = floor($sis / $data->max2);
                                                $sat3  = $sis - $sat2 * $data->max2;
                                                echo $sat1; ?> </td>
                        <td><?php echo $sat2; ?> </td>
                        <td><?php echo $sat3; ?> </td>

                        <!-- Sal Akhir -->
                        <td><?php
                                                $akhirr = $saldo + $ambi->mas - $amb->kel;
                                                //konvert 3 satuan
                                                $st1  = floor($akhirr / ($data->max1 * $data->max2));
                                                $ss  = $akhirr - ($st1 * $data->max1 * $data->max2);
                                                $st2  = floor($ss / $data->max2);
                                                $st3  = $ss - $st2 * $data->max2;
                                                echo $st1;
                                            }
                                        }
                                    }
                                } ?> </td>
                        <td><?php echo $st2; ?> </td>
                        <td><?php echo $st3; ?> </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>

        <script>
            window.print();
        </script>