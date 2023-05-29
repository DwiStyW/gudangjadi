<?php
ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
?>
<div class="">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;margin-top:-250px;padding-bottom:32px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Input Produk Masuk<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <form enctype="multipart/form-data" action="<?= base_url("masuk/barang_masuk") ?>" method="post" class="form">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="<?php echo date("Y-m-d"); ?>" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="noform" type="text" class="form-control" id="q" onkeyup="search()" placeholder="Nomor Form" required />
                                                        <label class="login2 pull-left pull-right-pro" id="pesan"></label>
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
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select id="kode" name="kode" class="form-control" type="sumbit" onchange="filSatuan()" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($master as $mter) { ?>
                                                                <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->nama ?> -|
                                                                    <?= $mter->sat1 ?> |-| <?= $mter->sat2 ?> |-|
                                                                    <?= $mter->sat3 ?> |-
                                                                    <?= $mter->kode ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Batch</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="nobatch" onchange="validation()" id="nobatch" type="text" class="form-control" placeholder="Nomor Batch" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="sat1" type="number" class="form-control"
                                                            placeholder="Satuan 1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id=sat1 class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="sat2" type="number" class="form-control"
                                                            placeholder="Satuan 2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id=sat2 class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="sat3" type="number" class="form-control"
                                                            placeholder="Satuan 3">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id=sat3 class="form-control" value="">
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
                                                                <a href="<?= base_url("masuk") ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <!-- Start Form -->
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
                                                                    <th data-field="nobatch">No Batch</th>
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
                                                                    <td><?php echo $m->nobatch; ?></td>
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
                                                                    <?php if ($m->ket == "Output") { ?>
                                                                    <td><a href="<?= base_url("keluar/edit_keluar/" . $m->no) ?>"
                                                                            class="btn btn-primary btn-sm"><i
                                                                                class="fa fa-edit"></i>
                                                                            Edit </a></td>
                                                                    <td><a href="<?= base_url("keluar/hapus_keluar/" . $m->no . "/" . $m->kode) ?>"
                                                                            onclick="javascript: return confirm('Anda yakin hapus ?')"
                                                                            class="btn btn-danger btn-sm"><i
                                                                                class="fa fa-trash"></i> Hapus</a>
                                                                    </td>
                                                                    <?php } else { ?>
                                                                    <td><a href="<?= base_url("masuk/edit_masuk/" . $m->no) ?>"
                                                                            class="btn btn-primary btn-sm"><i
                                                                                class="fa fa-edit"></i>
                                                                            Edit </a></td>
                                                                    <td><a onclick="hapus(`<?=$m->no?>`,`<?=$m->noform?>`,`<?=$m->nobatch?>`,`<?=$m->kode?>`,`<?= $sats1?>`,`<?= $sats2?>`,`<?= $sats3?>`,`<?= $m->sat1?>`,`<?= $m->sat2?>`,`<?= $m->sat3?>`)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i
                                                class="fa fa-trash"></i> Hapus</a>
                                                                    </td>
                                                                    <?php } ?>

                                                                </tr>
                                                                <?php
                                                                } ?>
                                                            </tbody>
                                                        </table>
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
<?php $this->load->view('masuk/modal_hapus')?>
<!-- Data table area End-->

<!-- mobile -->

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
    // var val = document.getElementById('kode').value;
    var index = document.getElementById('kode').selectedIndex;
    var text = kode[index].text;
    // document.getElementById('kod').placeholder = val;

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

<script>
$(document).ready(function() {
    $('#q').blur(function() {
        $('#pesan').html('<img style="margin-left:10px; width:10px" src="loading.gif">');
        var q = $(this).val();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('masuk/cekduplicate') ?>',
            data: 'q=' + q,
            success: function(data) {
                $('#pesan').html(data);
            }
        })
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

<script>
    function validation(){
        var nobatch = document.getElementById("nobatch").value
        var tahunKebalik = nobatch.slice(parseInt(nobatch.length-6),parseInt(nobatch.length-4));
        var tahun = parseInt(tahunKebalik.split('').reverse().join(''));
        var bulan = nobatch.slice(parseInt(nobatch.length-4),parseInt(nobatch.length-2));

        if(parseInt(bulan)>12){
            window.alert('nomor batch tidak valid!');
            document.getElementById("nobatch").value = ""
        }
    }
</script>