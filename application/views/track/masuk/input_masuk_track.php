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
                        <h1>Input Bahan Masuk<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

<<<<<<< HEAD
                                        <form enctype="multipart/form-data" id="data"
                                            action="<?= base_url("track/masuk_track/tambah_masuk_track") ?>"
                                            method="post" class="form">

=======
                                        <form enctype="multipart/form-data" id="data" action="<?= base_url("track/masuk_track/tambah_masuk_track") ?>" method="post" class="form">
                                            
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                            <!-- <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="noform" type="text" class="form-control" id="q" onkeyup="search()" placeholder="Nomor Form" required />
                                                        <label class="login2 pull-left pull-right-pro" id="pesan"></label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- kode barang -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Kode
                                                            Barang</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select id="kode" name="kode" class="form-control" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($master as $mter) { ?>
<<<<<<< HEAD
                                                                <option type="search"></option>
                                                                <?php if ($this->uri->segment(4) == $mter->kode) { ?>
                                                                <option selected value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                                <?php } else { ?>
                                                                <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                                <?php }
                                                                } ?>
=======
                                                                    <option type="search"></option>
                                                                    <?php if($this->uri->segment(4)==$mter->kode){?>
                                                                    <option selected value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                                <?php }else{?>
                                                                    <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                               <?php } } ?>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                        
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                            <!-- <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="<?= date($tglform) ?>" required />
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Batch</label>
                                                    </div>
                                                    <div class="col-lg-5">
<<<<<<< HEAD
                                                        <select id="batch" class="form-control" name="nobatch"
                                                            type="select" required>
=======
                                                        <select id="batch" class="form-control"  name="nobatch" type="select" required>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756

                                                        </select>
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
<<<<<<< HEAD
                                                        <div style="width:150px;padding-left:10px">
                                                            <label class="login2 pull-right pull-right-pro">belum
                                                                dipallet:</label>
                                                        </div>
                                                        <div style="width:200px">
                                                            <h5 id="qty"></h5>
                                                        </div>
=======
                                                    <div style="width:150px;padding-left:10px">
                                                    <label  class="login2 pull-right pull-right-pro">belum dipallet:</label>
                                                    </div>
                                                    <div style="width:200px">
                                                        <h5 id="qty"></h5>
                                                    </div>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
<<<<<<< HEAD
                                                        <label class="login2 pull-right pull-right-pro">No
                                                            Pallet</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select id="nopallet" name="nopallet" type="select"
                                                            class="form-control" required />
                                                        <option type="search"></option>
                                                        <?php
                                                        foreach ($pallet as $p) { ?>
                                                        <option value="<?= $p->kdpallet ?>">
                                                            <?php echo $p->kdpallet . ' ' . $p->status ?></option>
=======
                                                        <label class="login2 pull-right pull-right-pro">No Pallet</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select id="nopallet" name="nopallet" type="select" class="form-control" required />
                                                        <option type="search"></option>
                                                        <?php 
                                                        foreach($pallet as $p){ ?>
                                                            <option value="<?= $p->kdpallet?>"><?php echo $p->kdpallet.' '. $p->status?></option>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
<<<<<<< HEAD
                                                        <input name="tglform" type="date" class="form-control"
                                                            id="tglform" value="" required />
=======
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="" required />
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="sats1" name="sat1" type="number" class="form-control"
                                                            placeholder="Satuan 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="sats2" name="sat2" type="number" class="form-control"
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
                                                        <input id="sats3" name="sat3" type="number" class="form-control"
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
<<<<<<< HEAD
                                                        <input name="cat" type="text" class="form-control" id="cat"
                                                            value="" placeholder="Catatan" />
=======
                                                        <input name="cat" type="text" class="form-control" id="cat" value=""
                                                            placeholder="Catatan" />
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                                        <input type="hidden" name="jumlah" id="jumlah">
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                            
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
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
<<<<<<< HEAD
                                                                <a href="<?= base_url("track/masuk_track") ?>"><button
                                                                        class="btn btn-white"
                                                                        type="button">Kembali</button></a>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-primary login-submit-cs">Save
                                                                    Change</button>
=======
                                                                <a href="<?= base_url("track/masuk_track") ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                <button type="submit" class="btn btn-sm btn-primary login-submit-cs">Save Change</button>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <!-- Start Form -->
<<<<<<< HEAD
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
                                                                    <!-- <th data-field="noform">No Form</th> -->
                                                                    <th data-field="kode">Kode Barang</th>
                                                                    <th data-field="nama">Nama Barang</th>
                                                                    <th data-field="nobatch">No Batch</th>
                                                                    <th data-field="nopallet">No Pallet</th>
                                                                    <th data-field="status">Stat Pallet</th>
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
                                                                    <!-- <td><?php echo $m->noform; ?></td> -->
                                                                    <td><?php echo $m->kode; ?></td>
                                                                    <td><?php echo $m->nama; ?></td>
                                                                    <td><?php echo $m->nobatch; ?></td>
                                                                    <td><?php echo $m->nopallet ?></td>
                                                                    <td><?php echo $m->statpallet ?></td>
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
                                                                    <td><a href="<?= base_url("masuk/hapus_masuk/" . $m->no . "/" . $m->kode) ?>"
                                                                            onclick="javascript: return confirm('Anda yakin hapus ?')"
                                                                            class="btn btn-danger btn-sm">
                                                                            <i class="fa fa-trash"></i> Hapus
                                                                        </a>
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
=======
                                        
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
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

<!-- mobile -->

<<<<<<< HEAD
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
=======
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<script>
$(document).ready(function() {
    $("#kode").select2({
        placeholder: "Please Select",
    });
});
$(document).ready(function() {
    $("#nopallet").select2({
        placeholder: "Please Select",
    });
});
$(document).ready(function() {
<<<<<<< HEAD
    $("#batch").select2({
        placeholder: "Pilih Kode barang terlebih dahulu",
    });
});
=======
        $("#batch").select2({
            placeholder: "Pilih Kode barang terlebih dahulu",
        });
    });
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
</script>

<script>
$(document).ready(function() {
    $('#kode').change(function() {
        var id = $(this).val();
        $.ajax({
<<<<<<< HEAD
            url: "<?php echo site_url('track/masuk_track/get_batch'); ?>",
=======
            url: "<?php echo site_url('track/masuk_track/get_batch');?>",
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $("#batch").select2({
                    placeholder: "Please Select",
                });

                var html = '';
                var i;
                html = '<option selected type="search"></option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].nobatch + '>' + data[i]
                        .nobatch + '</option>';
                }
                $('#batch').html(html);

                var htmlp = '';
                htmlp = '<option selected type="search"></option>';
                $('#pallet').html(htmlp);
<<<<<<< HEAD

                var htmlq = '';
                htmlq = '';

=======
                
                var htmlq = '';
                htmlq = '';
                
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                $('#qty').html(htmlq);
            }
        });
        return false;
    });

    $('#batch').change(function() {
        var id = $(this).val();
        var kode = document.getElementById('kode').value;
        $.ajax({
<<<<<<< HEAD
            url: "<?php echo site_url('track/masuk_track/get_qty'); ?>",
=======
            url: "<?php echo site_url('track/masuk_track/get_qty');?>",
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
            method: "POST",
            data: {
                id: id,
                kode: kode,
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var jumlah = data[0].jumlah;
<<<<<<< HEAD
                var max1 = data[0].max1;
                var max2 = data[0].max2;
                var sat1 = data[0].sat1;
                var sat2 = data[0].sat2;
                var sat3 = data[0].sat3;

                var jum1 = Math.floor(data[0].jumlah / (max1 * max2));
                var sisa = jumlah - (jum1 * max1 * max2);
                var jum2 = Math.floor(sisa / max2);
                var jum3 = sisa - jum2 * max2;

                if (jumlah != null) {
                    html = "<h5>" + jum1 + " " + sat1 + " " + jum2 + " " + sat2 + " " +
                        jum3 + " " + sat3 + "</h5>";
=======
                var max1   = data[0].max1;
                var max2   = data[0].max2;
                var sat1   = data[0].sat1;
                var sat2   = data[0].sat2;
                var sat3   = data[0].sat3;
                
                var jum1  = Math.floor(data[0].jumlah / (max1 * max2 ));
                var sisa  = jumlah - (jum1 * max1 * max2);
                var jum2  = Math.floor(sisa / max2);
                var jum3  = sisa - jum2 * max2;

                if(jumlah!=null){
                html = "<h5>"+jum1+" "+sat1+" "+jum2+" "+sat2+" "+jum3+" "+sat3+"</h5>";
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
                }
                html1 = jumlah;
                html2 = data[0].tglform;
                $('#tglform').val(html2);
                $('#jumlah').val(html1);
                $('#qty').html(html);
                console.log(html2);
            }
        });
        return false;
    });
});
</script>
<script>
<<<<<<< HEAD
$(function() {
=======
    $(function() {
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
    $("#kode").change(function() {
        $("#batch").select2('val', 'all');
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