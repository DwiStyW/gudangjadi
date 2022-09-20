<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    // $iduser = $user_login['user_id'];
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Data table area Start-->
    <div class="admin-dashone-data-table-area mg-b-40">
        <br />
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>History Input User</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="tglform">Tgl Form</th>
                                            <th data-field="noform">No Form</th>
                                            <th data-field="kode">Kode Barang</th>
                                            <th data-field="nama">Nama Barang</th>
                                            <th data-field="masuk">Masuk</th>
                                            <th data-field="keluar">Keluar</th>
                                            <th data-field="Ket">Ket</th>
                                            <th data-field="tanggal">Tgl Input</th>
                                            <th data-field="oleh">Oleh</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penginput as $p) {
                                            $query = $this->db->query("SELECT * FROM master WHERE master.id = '$p->kode'");
                                            foreach ($query->result() as $m) {
                                                $kode = $m->kode;
                                                $nama = $m->nama;
                                                $sat3 = $m->sat3;
                                            }
                                            $query1 = $this->db->query("SELECT * FROM tb_user WHERE tb_user.user_id = '$p->adm'");
                                            foreach ($query1->result() as $u) {
                                                $username = $u->username;
                                            }
                                            if ($p->kode == $m->id) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($p->tglform)) ?></td>
                                                    <td><?php echo $p->noform; ?></td>
                                                    <td><?php echo $kode ?></td>
                                                    <td><?php echo $nama ?></td>
                                                    <td><?php echo $p->masuk ?> <?php echo $sat3 ?></td>
                                                    <td><?php echo $p->keluar; ?> <?php echo $sat3 ?></td>
                                                    <td><?php echo $p->ket; ?></td>
                                                    <td><?php echo $p->tanggal; ?></td>
                                                    <td><?php echo $username; ?></td>

                                                </tr>
                                        <?php
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