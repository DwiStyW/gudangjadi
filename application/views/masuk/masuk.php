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
                                <h1>Barang Jadi Masuk</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <a href="<?= base_url("masuk/input_masuk") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan Masuk</button></a>
                                    <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="tglform">Tgl Form</th>
                                            <th data-field="noform">No Form</th>
                                            <th data-field="kode">Kode Barang</th>
                                            <th data-field="nama">Nama Barang</th>
                                            <th data-field="satuan1">Satuan 1</th>
                                            <th data-field="satuan2">Satuan 2</th>
                                            <th data-field="satuan3">Satuan 3</th>
                                            <th data-field="tanggal">Tgl Input</th>
                                            <th data-field="oleh">Oleh</th>
                                            <th data-field="suplai">Supplier</th>
                                            <th data-field="cat">Catatan</th>
                                            <th data-field="aksi">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($masuk as $m) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($m->tglform)); ?></td>
                                                <td><?php echo $m->noform; ?></td>
                                                <td><?php echo $m->kode; ?></td>
                                                <td><?php echo $m->nama; ?></td>
                                                <?php
                                                //Perhitungan 3 Satuan

                                                $sats1  = floor($m->masuk / ($m->max1 * $m->max2));
                                                $sisa   = $m->masuk - ($sats1 * $m->max1 * $m->max2);
                                                $sats2  = floor($sisa / $m->max2);
                                                $sats3  = $sisa - $sats2 * $m->max2;

                                                ?>
                                                <td><?php echo $sats1; ?> <?php echo $m->sat1 ?></td>
                                                <td><?php echo $sats2; ?> <?php echo $m->sat2 ?></td>
                                                <td><?php echo $sats3; ?> <?php echo $m->sat3 ?></td>
                                                <td><?php echo $m->tanggal; ?></td>
                                                <td><a href="<?= base_url("penginput/user/" . $m->adm) ?>"><?php echo $m->username ?></td>
                                                <td><?php echo $m->suplai ?></td>
                                                <td><?php echo $m->cat ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="<?= base_url("masuk/edit_masuk/" . $m->no) ?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url("masuk/hapus_masuk/" . $m->no . "/" . $m->kode) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
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

    <script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
    <?php if ($this->session->flashdata('sukses')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                position: 'top-end',
                title: '<?= $this->session->flashdata('sukses') ?>',
                showConfirmButton: false,
                timer: 3000,
                allowOutsideClick: false,
                timerProgressBar: true
            })
        </script>
    <?php endif ?>

    <?php if ($this->session->flashdata('gagal')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                position: 'top-end',
                title: '<?= $this->session->flashdata('gagal') ?>',
                showConfirmButton: false,
                timer: 3000,
                allowOutsideClick: false,
                timerProgressBar: true
            })
        </script>
    <?php
    endif ?>