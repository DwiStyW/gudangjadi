    <div class="layarlebar">
        <div class="admin-dashone-data-table-area mg-b-40">
            <div class="container" style="position:relative;top:-250px;z-index: 1">
                <div class="d-flex">
                    <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                        <div class="container">
                            <h4 class="mt-3 mb-3 ml-3"><b>Master Barang Gudang</b></h4>
                        </div>
                    </div>
                    <div style="background-color:#fff">
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright"
                                style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                                <div id="toolbar">
                                    <a href="inputmas.php"><button class="btn btn-sm btn-primary login-submit-cs"
                                            type="submit">Input Master</button></a>
                                    <a href="<?= base_url("golongan") ?>"><button
                                            class="btn btn-sm btn-primary login-submit-cs" type="submit">Master
                                            Golongan</button></a>
                                    <a href="jenis.php"><button class="btn btn-sm btn-primary login-submit-cs"
                                            type="submit">Master Jenis</button></a>
                                    <!-- <a target="_blank" href="printmaster.php"><button class="btn btn-sm btn-success login-submit-cs" type="submit">Print Master</button></a> -->
                                    <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true"
                                    data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"
                                    data-click-to-select="true" data-toolbar="#toolbar">
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