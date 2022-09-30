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
                <th style="text-align: center">Golongan</th>
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
            $tampil1 = $this->db->query("SELECT * FROM master ORDER BY kdgol ASC, nama ASC");

            $no = 1;
            foreach ($tampil1->result() as $data) {
                $code = $data->id;

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
    <br />
    <p>Copyright &#169; <?php echo date("Y") ?> All rights reserved. Designed by <i>IT Dept INDOSAR</i></p>

    <script>
        window.print();
    </script>
