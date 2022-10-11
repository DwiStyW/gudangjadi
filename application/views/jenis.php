<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Master Jenis<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal"
                                    data-target="#exampleModal">Input Jenis</button>
                                <a href="<?= base_url("master") ?>"><button class="btn btn-white"
                                        type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
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
                                            <a class="btn btn-sm btn-primary" href="#" data-toggle="modal"
                                                data-target="#editmodal" data-id="<?= $j->id ?>"
                                                data-kdjenis="<?= $j->kdjenis ?>" data-namajenis="<?= $j->namajenis ?>"
                                                id="tomboledit"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="<?= base_url("jenis/hapus_jenis/" . $j->id) ?>"
                                                onclick="javascript: return confirm('Anda yakin hapus ?')"><i
                                                    class="fa fa-wrench"></i> Hapus</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 200000;">
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
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 200000;">
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