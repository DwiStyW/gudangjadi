<?php
ini_set('date.timezone', 'Asia/Jakarta');
?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Barang Jadi Keluar<h1>
                        <div style="width:100%; padding-right:20px">
                                    <form action="<?= base_url('keluar/index')?>" method="post">
                                    <div style="display:flex; flex:wrap">
                                        <div style="width:100%">
                                            <?php if(isset($keyword)){?>
                                                <input type="text" name="keyword" value="<?= $keyword?>" placeholder="Cari Produk Keluar..." class="form-control">
                                            <?php }else{ ?>
                                                <input type="text" name="keyword" placeholder="Cari Produk Keluar..." class="form-control">
                                                <?php } ?>
                                        </div>
                                        <div style="width:auto">
                                            <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <?php if($keyword != null){?>
                                    <form action="<?=base_url('keluar/index')?>" method="post">
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
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <a href="<?= base_url("keluar/input_keluar") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan
                                        Keluar</button></a>
                                <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tglform">Tgl Form</th>
                                        <th data-field="noform">No Form</th>
                                        <th data-field="nobatch">No SPPB</th>
                                        <th data-field="kode">Kode Barang</th>
                                        <th data-field="nama">Nama Barang</th>
                                        <th data-field="satuan1">Satuan 1</th>
                                        <th data-field="satuan2">Satuan 2</th>
                                        <th data-field="satuan3">Satuan 3</th>
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="oleh">Oleh</th>
                                        <th data-field="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($keluar as $k) {
                                    ?>
                                        <tr>
                                            <td><?php echo ++$start; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($k->tanggalform)); ?></td>
                                            <td><?php echo $k->noform ?></td>
                                            <td><?php echo $k->nobatch ?></td>
                                            <td><?php echo $k->kode ?></td>
                                            <td><?php echo $k->nama ?></td>
                                            <?php
                                            //Perhitungan 3 Satuan

                                            $sats1  = floor($k->keluar / ($k->max1 * $k->max2));
                                            $sisa   = $k->keluar - ($sats1 * $k->max1 * $k->max2);
                                            $sats2  = floor($sisa / $k->max2);
                                            $sats3  = $sisa - $sats2 * $k->max2;

                                            ?>
                                            <td><?php echo $sats1; ?> <?php echo $k->sat1; ?></td>
                                            <td><?php echo $sats2; ?> <?php echo $k->sat2; ?></td>
                                            <td><?php echo $sats3; ?> <?php echo $k->sat3; ?></td>
                                            <td><?php echo $k->tanggal; ?></td>
                                            <td><a href="<?= base_url("penginput/user/" . $k->adm) ?>"><?php echo $k->username; ?><a />
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url("keluar/edit_keluar/" . $k->no) ?>"><i class="fa fa-edit"></i> Edit</a>
                                                <a onclick="hapus(`<?=$k->no?>`,`<?=$k->noform?>`,`<?=$k->nobatch?>`,`<?=$k->kode?>`,`<?= $sats1?>`,`<?= $sats2?>`,`<?= $sats3?>`,`<?= $k->sat1?>`,`<?= $k->sat2?>`,`<?= $k->sat3?>`)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i
                                                class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <div style="width:100%;margin-top:20px; display:flex; flex:wrap" class="justify-content-between">
                                <form action="<?= base_url('keluar') ?>" id="go" method="post">
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
                        <h1>Barang Jadi Keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbarr">
                                <a href="<?= base_url("keluar/input_keluar") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan
                                        Keluar</button></a>
                                <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbarr">
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
                                        <th data-field="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($keluar as $k) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($k->tglform)); ?></td>
                                            <td><?php echo $k->noform ?></td>
                                            <td><?php echo $k->kode ?></td>
                                            <td><?php echo $k->nama ?></td>
                                            <?php
                                            //Perhitungan 3 Satuan

                                            $sats1  = floor($k->keluar / ($k->max1 * $k->max2));
                                            $sisa   = $k->keluar - ($sats1 * $k->max1 * $k->max2);
                                            $sats2  = floor($sisa / $k->max2);
                                            $sats3  = $sisa - $sats2 * $k->max2;

                                            ?>
                                            <td><?php echo $sats1; ?> <?php echo $k->sat1; ?></td>
                                            <td><?php echo $sats2; ?> <?php echo $k->sat2; ?></td>
                                            <td><?php echo $sats3; ?> <?php echo $k->sat3; ?></td>
                                            <td><?php echo $k->tanggal; ?></td>
                                            <td><a href="<?= base_url("penginput/user/" . $k->adm) ?>"><?php echo $k->username; ?><a />
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url("keluar/edit_keluar/" . $m->no) ?>"><i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <a class="btn btn-sm btn-danger" href="<?= base_url("keluar/hapus_keluar/" . $m->no . "/" . $m->kode) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</a>
                                                <!-- <a class="btn btn-sm btn-primary" href="editkeluar.php?hal=edit&kd=<?php echo $data['no']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="hapuskeluar.php?hal=<?php echo $data['kode']; ?>&kd=<?php echo $data['no']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-wrench"></i> Hapus</a> -->
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

<?php $this->load->view('keluar/modal_hapus')?>

<script>
    function go() {
        document.getElementById('go').submit()
    }
</script>

<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<?php if ($this->session->flashdata('sukses')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            position: 'top-end',
            title: '<?= $this->session->flashdata('sukses') ?>',
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