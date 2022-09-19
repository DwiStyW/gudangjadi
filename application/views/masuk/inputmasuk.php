<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    date_default_timezone_set('Asia/Jakarta');
    ?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Input Bahan Masuk<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <form enctype="multipart/form-data"
                                            action="<?= base_url("masuk/barang_masuk") ?>" method="post" class="form">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="tglform" type="date" class="form-control"
                                                            id="tglform" value="<?php echo date("Y-m-d"); ?>"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="noform" type="text" class="form-control" id="q"
                                                            onkeyup="search()" placeholder="Nomor Form" required />
                                                        <label class="login2 pull-left pull-right-pro"
                                                            id="pesan"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- kode barang -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Kode
                                                            Barang</label>
                                                    </div>
                                                    <div class="col-lg-8" style="width:73%">
                                                        <div class="form-select-list">
                                                            <select id="kode" name="kode" class="form-control"
                                                                onchange="filSatuan()" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                    $no = 1;
                                                                    foreach ($master as $mter) { ?>
                                                                <option value="<?= $mter->id ?>"><?= $mter->nama ?> -|
                                                                    <?= $mter->sat1 ?> |-| <?= $mter->sat2 ?> |-|
                                                                    <?= $mter->sat3 ?> |- <?= $mter->kode ?></option>
                                                                <?php }
                                                                    echo "<script>var satuan1 =$mter->sat1 </script>"; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="sat1" name="sat1" type="number" class="form-control"
                                                            id="sat1" placeholder="Satuan 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="sat2" type="number" class="form-control" id="sat2"
                                                            placeholder="Satuan 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="sat3" type="number" class="form-control" id="sat3"
                                                            placeholder="Satuan 3">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Input</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="tgl" type="text" class="form-control" id="tgl"
                                                            value="<?php echo date("Y-m-d h:i:s"); ?>"
                                                            readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Catatan</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="cat" type="text" class="form-control" id="cat"
                                                            placeholder="Catatan" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <input name="adm" type="hidden" class="form-control" id="adm"
                                                            value="<?= $this->session->userdata('user_id'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="<?= base_url("masuk") ?>"><button
                                                                        class="btn btn-white"
                                                                        type="button">Kembali</button></a>
                                                                <button class="btn btn-sm btn-primary login-submit-cs"
                                                                    type="submit">Save Change</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Start Form -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="sparkline8-hd">
                                                        <div class="main-sparkline8-hd">
                                                            <h1>Form sudah input</h1>
                                                        </div>
                                                    </div>
                                                    <div class="sparkline8-graph">
                                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                                            <table data-toggle="table">
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
                                                                        <th data-field="satuan3">ket</th>
                                                                        <th data-field="tanggal">Tgl Input</th>
                                                                        <th data-field="aksi" colspan=2>Aksi</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list">
                                                                    <?php
                                                                        $no = 1;
                                                                        foreach ($masuk as $m) {
                                                                        ?>
                                                                    <tr>
                                                                        <td><?php echo $no++; ?></td>
                                                                        <td><?php echo date("d-m-Y", strtotime($m->tglform)); ?>
                                                                        </td>
                                                                        <td><?php echo $m->noform; ?></td>
                                                                        <td><?php echo $m->kode; ?></td>
                                                                        <td><?php echo $m->nama; ?></td>
                                                                        <?php
                                                                                if ($m->masuk == 0) {

                                                                                    //Perhitungan 3 Satuan
                                                                                    $sats1  = floor($m->keluar / ($m->max1 * $m->max2));
                                                                                    $sisa   = $m->keluar - ($sats1 * $m->max1 * $m->max2);
                                                                                    $sats2  = floor($sisa / $m->max2);
                                                                                    $sats3  = $sisa - $sats2 * $m->max2;
                                                                                } else {

                                                                                    //Perhitungan 3 Satuan
                                                                                    $sats1  = floor($m->masuk / ($m->max1 * $m->max2));
                                                                                    $sisa   = $m->masuk - ($sats1 * $m->max1 * $m->max2);
                                                                                    $sats2  = floor($sisa / $m->max2);
                                                                                    $sats3  = $sisa - $sats2 * $m->max2;
                                                                                }
                                                                                ?>
                                                                        <td><?php echo $sats1; ?> <?php echo $m->sat1 ?>
                                                                        </td>
                                                                        <td><?php echo $sats2; ?> <?php echo $m->sat2 ?>
                                                                        </td>
                                                                        <td><?php echo $sats3; ?> <?php echo $m->sat3 ?>
                                                                        </td>
                                                                        <td><?php echo $m->ket; ?></td>
                                                                        <td><?php echo $m->tanggal; ?></td>
                                                                        <td><a href="#"> Edit </a></td>
                                                                        <td><a href="#"
                                                                                onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</a>
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
                                        <!-- End Form -->

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
<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<script>
function search() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("q");
    filter = input.value.toUpperCase();
    ul = document.getElementById("list");
    li = ul.getElementsByTagName("tr");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("td")[2];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function filSatuan() {
    var kode = document.getElementById('kode').options;
    var index = document.getElementById('kode').selectedIndex;
    var text = kode[index].text;

    var potong1 = text.slice(text.search("-") + 3, text.length);
    var sat1 = potong1.slice(0, potong1.search("-") - 1);
    document.getElementById('sat1').placeholder = sat1;

    var potong2 = potong1.slice(potong1.search("-") + 3, text.length);
    var sat2 = potong2.slice(0, potong2.search("-") - 1);
    document.getElementById('sat2').placeholder = sat2;

    var potong3 = potong2.slice(potong2.search("-") + 3, text.length);
    var sat3 = potong3.slice(0, potong3.search("-") - 1);
    document.getElementById('sat3').placeholder = sat3;
}
</script>

<script>
$(document).ready(function() {
    $("#kode").select2({
        placeholder: "Please Select",
    });
});
</script>


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