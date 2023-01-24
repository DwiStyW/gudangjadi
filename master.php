<?php
  ini_set('date.timezone', 'Asia/Jakarta');
  ?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Master Produk Gudang<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                            <div id="toolbar">
                                <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal"
                                    data-target="#exampleModal">Input Master</button></a>
                                <a href="<?= base_url("golongan") ?>"><button
                                        class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Golongan</button></a>
                                <a href="<?= base_url("jenis") ?>"><button
                                        class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Jenis</button></a>
                                <!-- <a target="_blank" href="printmaster.php"><button class="btn btn-sm btn-success login-submit-cs" type="submit">Print Master</button></a> -->
                                <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>

                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
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
                                            <a class="btn btn-sm btn-primary"
                                                href="<?= base_url("master/editmas/$m->id/" ) ?>"><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="<?= base_url("master/hapus_master/" . $m->id) ?>"
                                                onclick="javascript: return confirm('Anda yakin hapus ?')"><i
                                                    class="fa fa-trash"></i> Hapus</a>
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
<!-- Data table area End-->

<!-- mobile -->
<div class="layarsedangmengecil">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div style="position:relative;margin-top:-300px;padding-bottom:32px;z-index: 1;margin-left:20px;
            margin-right:20px;width:auto;">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Master Produk Gudang<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                            <div id="toolbarr">
                                <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal"
                                    data-target="#exampleModal">Input Master</button></a>
                                <a href="<?= base_url("golongan") ?>"><button
                                        class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Golongan</button></a>
                                <a href="<?= base_url("jenis") ?>"><button
                                        class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                        Jenis</button></a>
                                <!-- <a target="_blank" href="printmaster.php"><button class="btn btn-sm btn-success login-submit-cs" type="submit">Print Master</button></a> -->
                                <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbarr">
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
                                            <a class="btn btn-sm btn-primary"
                                                href="<?= base_url("master/editmas/$m->id/" ) ?>"><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="<?= base_url("master/hapus_master/" . $m->id) ?>"
                                                onclick="javascript: return confirm('Anda yakin hapus ?')"><i
                                                    class="fa fa-trash"></i> Hapus</a>
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

<!-- Modal Tambah Master -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 200000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title" id="exampleModalLabel">Form Input Master</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('') . 'master/tambah_master' ?>" method="post">

                    <input type="text" name="id" class="form-control">
                    <div class="form group">
                        <label>kode Barang</label>
                        <input type="text" name="kode" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Nama barang</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Ukuran</label>
                        <input type="text" name="ukuran" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Satuan 1</label>
                        <input type="text" name="sat1" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Isi Satuan 1</label>
                        <input type="text" name="max1" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Satuan 2</label>
                        <input type="text" name="sat2" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Isi Satuan 2</label>
                        <input type="text" name="max2" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Satuan 3</label>
                        <input type="text" name="sat3" class="form-control">
                    </div>

                    <div class="form group">
                        <label>Golongan</label>
                        <select type="select" name="kdgol" class="form-control">
                            <option disabled selected value hidden>Pilih Golongan</option>
                            <?php foreach ($golongan as $g) { ?>
                            <option value="<?= $g->id ?>"><?= $g->namagol ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form group">
                        <label>Jenis</label>
                        <select type="select" name="kdjenis" class="form-control">
                            <option disabled selected value hidden>Pilih Jenis</option>
                            <?php foreach ($jenis as $j) { ?>
                            <option value="<?= $j->id ?>"><?= $j->namajenis ?></option>
                            <?php } ?>
                        </select>
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