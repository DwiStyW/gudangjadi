<?php
ini_set('date.timezone', 'Asia/Jakarta');
?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Master Barang Gudang<h1>
                        <div style="width:100%; padding-right:20px">
                                    <form action="<?= base_url('master/index')?>" method="post">
                                    <div style="display:flex; flex:wrap">
                                        <div style="width:100%">
                                            <?php if(isset($keyword)){?>
                                                <input type="text" name="keyword" value="<?= $keyword?>" placeholder="Cari Barang Keluar..." class="form-control">
                                            <?php }else{ ?>
                                                <input type="text" name="keyword" placeholder="Cari Barang Keluar..." class="form-control">
                                                <?php } ?>
                                        </div>
                                        <div style="width:auto">
                                            <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <?php if($keyword != null){?>
                                    <form action="<?=base_url('master/index')?>" method="post">
                                    <input type="hidden" name="keyword" value="">
                                        <div style="width:auto">
                                        <button class="btn btn-light" type="submit">Reset</button>
                                        </div>
                                    </form>
                                    <?php } ?>
                                </div>
                                </div>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                            <div id="toolbar">
                            <a href="<?= base_url("master/input_master") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input
                                        Master</button></a>
                                <a href="<?= base_url("golongan") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Golongan</button></a>
                                <a href="<?= base_url("jenis") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Jenis</button></a>
                                <!-- <a target="_blank" href="printmaster.php"><button class="btn btn-sm btn-success login-submit-cs" type="submit">Print Master</button></a> -->
                                <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="kode">Kode Barang</th>
                                        <th data-field="name">Nama Barang</th>
                                        <th data-field="ukuran">Ukuran</th>
                                        <th data-field="sat1">Sat 1</th>
                                        <th data-field="isi1">Isi 1</th>
                                        <th data-field="sat2">Sat 2</th>
                                        <th data-field="isi2">Isi 2</th>
                                        <th data-field="sat3">Sat 3</th>
                                        <th data-field="kdgol">Golongan</th>
                                        <th data-field="jenis">Jenis</th>
                                        <th data-field="exp">ExpDate</th>
                                        <th data-field="aksi">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($master as $m) {
                                    ?>
                                        <tr>
                                            <td><?php echo ++$start; ?></td>
                                            <td><?php echo $m->kode ?></td>
                                            <td><?php echo $m->nama; ?></td>
                                            <td><?php echo $m->ukuran ?></td>
                                            <td><?php echo $m->sat1 ?></td>
                                            <td><?php echo $m->max1 ?></td>
                                            <td><?php echo $m->sat2 ?></td>
                                            <td><?php echo $m->max2 ?></td>
                                            <td><?php echo $m->sat3 ?></td>
                                            <td><?php echo $m->namagol ?></td>
                                            <td><?php echo $m->namajenis ?></td>
                                            <td><?php echo $m->expdate ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url("master/editmas/$m->id/") ?>"><i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <a class="btn btn-sm btn-danger" href="<?= base_url("master/hapus_master/" . $m->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <div style="width:100%;margin-top:20px; display:flex; flex:wrap" class="justify-content-between">
                                <form action="<?= base_url('master') ?>" id="go" method="post">
                                <div style="width:100px">
                                    <select class="form-control" name="range" onchange="go()">
                                        <option disabled selected value>Row</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="all">Show All</option>
                                    </select>
                                    </div>
                                </form>
                                <?=$this->pagination->create_links();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data table area End-->

<!-- mobile -->
<div class="layarsedangmengecil">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div style="position:relative;margin-top:-300px;padding-bottom:32px;z-index: 1;margin-left:20px;
            margin-right:20px;width:auto;">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Master Barang Gudang<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                            <div id="toolbarr">
                                <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal" data-target="#exampleModal">Input Master</button></a>
                                <a href="<?= base_url("golongan") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Golongan</button></a>
                                <a href="<?= base_url("jenis") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Jenis</button></a>
                                <!-- <a target="_blank" href="printmaster.php"><button class="btn btn-sm btn-success login-submit-cs" type="submit">Print Master</button></a> -->
                                <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbarr">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="kode">Kode Barang</th>
                                        <th data-field="name">Nama Barang</th>
                                        <th data-field="ukuran">Ukuran</th>
                                        <th data-field="sat1">Sat 1</th>
                                        <th data-field="isi1">Isi 1</th>
                                        <th data-field="sat2">Sat 2</th>
                                        <th data-field="isi2">Isi 2</th>
                                        <th data-field="sat3">Sat 3</th>
                                        <th data-field="kdgol">Golongan</th>
                                        <th data-field="jenis">Jenis</th>
                                        <th data-field="aksi">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($master as $m) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $m->kode ?></td>
                                            <td><?php echo $m->nama; ?></td>
                                            <td><?php echo $m->ukuran ?></td>
                                            <td><?php echo $m->sat1 ?></td>
                                            <td><?php echo $m->max1 ?></td>
                                            <td><?php echo $m->sat2 ?></td>
                                            <td><?php echo $m->max2 ?></td>
                                            <td><?php echo $m->sat3 ?></td>
                                            <td><?php echo $m->namagol ?></td>
                                            <td><?php echo $m->namajenis ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url("master/editmas/$m->id/") ?>"><i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <a class="btn btn-sm btn-danger" href="<?= base_url("master/hapus_master/" . $m->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php $no++;
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
<script>
    function go() {
        document.getElementById('go').submit();
    }
</script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<?php if ($this->session->flashdata('berhasil')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            position: 'top-end',
            title: '<?= $this->session->flashdata('berhasil') ?>',
            showConfirmButton: false,
            timer: 1500,
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
            timer: 1500,
            allowOutsideClick: false,
            timerProgressBar: true
        })
    </script>
<?php
endif ?>