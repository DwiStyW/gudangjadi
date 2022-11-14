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
    $mulai = date('Y-m-d', strtotime('-1 days', strtotime($start)));
    ?>

    <h3>Report Saldo Barang Jadi</h3>
    Saldo Stok Dari <b><?php echo date('d F Y', strtotime($start)); ?></b> hingga <b><?php echo date('d F Y', strtotime($end)); ?></b>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th style="text-align: center">No</th>
                <!-- <th style="text-align: center">Golongan</th> -->
                <th style="text-align: center">Kode Barang</th>
                <th style="text-align: center">Nama</th>
                <th style="text-align: center">Urai</th>
                <th style="text-align: center">Satuan 1</th>
                <th style="text-align: center">Satuan 2</th>
                <th style="text-align: center">Satuan 3</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tampil = $this->db->query("SELECT * FROM master, riwayat  WHERE master.kode=riwayat.kode && riwayat.tglform between '$mulai' AND '$end' ORDER BY kdgol ASC, riwayat.kode ASC");
            $tampil1 = $this->db->query("SELECT * FROM master ORDER BY kode ASC");

            $no = 1;
            foreach ($tampil1->result() as $data) {
                $code = $data->kode;

                //SaldoAwal
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

                        //Masuk
                        $masuk = $this->db->query("SELECT SUM(masuk) AS mas FROM riwayat  WHERE kode='$code' && tglform between '$start' AND '$end'");
                        foreach ($masuk->result() as $ambi) {
                            //konvert 3 satuan
                            $tas1  = floor($ambi->mas / ($data->max1 * $data->max2));
                            $itas  = $ambi->mas - ($tas1 * $data->max1 * $data->max2);
                            $tas2  = floor($itas / $data->max2);
                            $tas3  = $itas - $tas2 * $data->max2;

                            //Keluar
                            $keluar = $this->db->query("SELECT SUM(keluar) AS kel FROM riwayat  WHERE kode='$code' && tglform between '$start' AND '$end'");
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
                                    <td rowspan="4" class="text-center"> <?php echo $no; ?></td>
                                    <?php
                                    $kdgrup = $data->kdgol;
                                    //Mastergrup        
                                    $tampil2 = $this->db->query("select * from golongan WHERE id='$kdgrup'");
                                    foreach ($tampil2->result() as $data2); ?>
                                    <!-- <td rowspan="4" style="padding-left:7px"> <?php echo $data2->kdgol; ?> <?php echo $data2->namagol; ?></td> -->
                                    <td rowspan="4" class="text-center"> <?php echo $data->kode; ?></td>
                                    <td rowspan="4" style="padding-left:7px"> <?php echo $data->nama; ?></td>
                                    <td style="padding-left:7px"> S.Awal </td>
                                    <!-- Saldo Awal -->
                                    <td class="text-center"> <?php echo $ts1; ?> </td>
                                    <td class="text-center"> <?php echo $ts2; ?> </td>
                                    <td class="text-center"><?php echo $ts3; ?> </td>
                                </tr>
                                <tr>
                                    <!-- MASUK -->
                                    <td style="padding-left:7px">Masuk</td>
                                    <td class="text-center"><?php echo  $tas1; ?></td>
                                    <td class="text-center"><?php echo  $tas2; ?></td>
                                    <td class="text-center"><?php echo  $tas3; ?></td>
                                </tr>
                                <tr>
                                    <!-- KELUAR -->
                                    <td style="padding-left:7px">Keluar</td>
                                    <td class="text-center"><?php echo $sat1; ?> </td>
                                    <td class="text-center"><?php echo $sat2; ?> </td>
                                    <td class="text-center"><?php echo $sat3; ?> </td>
                                </tr>
                                <tr>
                                    <td style="padding-left:7px">S.Akhir</td>
                                    <td class="text-center"><?php echo $st1; ?> </td>
                                    <td class="text-center"><?php echo $st2; ?> </td>
                                    <td class="text-center"><?php echo $st3; ?> </td>
                                <tr>
                <?php $no++;
                            }
                        }
                    }
                }
            } ?>
        </tbody>
    </table>
    <br />
    <p>Copyright &#169; <?php echo date("Y") ?> All rights reserved. Designed by <i>IT Dept INDOSAR</i></p>

    <script>
        window.print();
    </script>