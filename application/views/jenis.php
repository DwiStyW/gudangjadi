<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Main Menu area start-->

    <!-- Data table area Start-->
    <div class="admin-dashone-data-table-area mg-b-40">
        <br />
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Master Jenis</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal" data-target="#exampleModal">Input Jenis</button>
                                    <a href="<?= base_url("master") ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="kode">Kode Jenis</th>
                                            <th data-field="name">Nama Jenis</th>
                                            <th data-field="aksi">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jenis as $j) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $j->kdjenis; ?></td>
                                                <td><?php echo $j->namajenis; ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#editmodal" data-id="<?= $j->id ?>" data-kdjenis="<?= $j->kdjenis ?>" data-namajenis="<?= $j->namajenis ?>" id="tomboledit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url("jenis/hapus_jenis/" . $j->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-wrench"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
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

    <!-- Modal Tambah jenis -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title" id="exampleModalLabel">Form Tambah Jenis</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'jenis/tambah_jenis' ?>" method="post">

                        <div class="form group">
                            <label>kode Jenis</label>
                            <input type="text" id="kdjenis" name="kdjenis" class="form-control">
                        </div>

                        <div class="form group">
                            <label>Nama Jenis</label>
                            <input type="text" id="namajenis" name="namajenis" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal -->

    <!-- Modal Edit Jenis -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title" id="exampleModalLabel">Form Edit Jenis</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'jenis/update_jenis' ?>" method="post">

                        <input type="hidden" id="id" name="id" class="form-control">

                        <div class="form group">
                            <label>kode Jenis</label>
                            <input type="text" id="kdjenis" name="kdjenis" class="form-control">
                        </div>

                        <div class="form group">
                            <label>Nama Jenis</label>
                            <input type="text" id="namajenis" name="namajenis" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal -->

    <!-- get data -->
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <script>
        $(document).on("click", "#tomboledit", function() {
            let id = $(this).data('id');
            let kdjenis = $(this).data('kdjenis');
            let namajenis = $(this).data('namajenis');

            $(".modal-body #id").val(id);
            $(".modal-body #kdjenis").val(kdjenis);
            $(".modal-body #namajenis").val(namajenis);

        });
    </script>