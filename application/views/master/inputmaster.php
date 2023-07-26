<!-- Data table area Start-->
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="container">
                        <h4 class="mt-3 mb-3 ml-3"><b>Input Master Produk</b></h4>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad" style="margin-left:10px;margin-right:10px;padding-bottom:10px;padding-top:10px;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                            <form enctype="multipart/form-data" action="<?= base_url('master/tambah_master') ?>" method="post">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Kode
                                                                barang</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="kode" type="text" class="form-control" placeholder="masukkan kode" id="kode" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Nama
                                                                barang</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="nama" type="text" class="form-control" id="nama" placeholder="masukkan nama" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Ukuran</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="ukuran" type="text" class="form-control" placeholder="masukkan ukuran" id="ukuran" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 3 Satuan -->
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Satuan
                                                                1</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="sat1" type="text" class="form-control" placeholder="masukkan satuan 1" id="sat1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Isi Satuan
                                                                1</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="max1" type="number" class="form-control" placeholder="masukkan isi satuan 1" id="max1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Satuan
                                                                2</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="sat2" type="text" class="form-control" placeholder="masukkan satuan 2" id="sat2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Isi Satuan
                                                                2</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="max2" type="number" class="form-control" placeholder="masukkan isi satuan 2" id="max2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Satuan
                                                                3</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="sat3" type="text" class="form-control" placeholder="masukkan satuan 3" id="sat3" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Golongan</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select id="kdgol" name="kdgol" class="form-control">
                                                                    <option disabled selected value>Pilih Golongan</option>
                                                                    <?php foreach ($golongan as $g) { ?>
                                                                        <option value="<?=$g->id?>"><?=$g->namagol?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Jenis</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="form-select-list">
                                                                <select id="kdjenis" name="kdjenis" class="form-control">
                                                                <option disabled selected value>Pilih Jenis</option>
                                                                    <?php foreach ($jenis as $j) { ?>
                                                                        <option value="<?=$j->id?>"><?=$j->namajenis?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">ExpDate(Bulan)</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input name="expdate" type="text" class="form-control" placeholder="masukkan expdate (Bulan)" id="expdate" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group-inner" style="margin-top:10px;">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-9">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <a href="<?= base_url('master') ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data table area End-->
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<?php if ($this->session->flashdata('peringatan')) : ?>
    <script>
        Swal.fire(
            '<?= $this->session->flashdata('peringatan') ?>',
            '',
            'error'
        )
    </script>
<?php
endif ?>