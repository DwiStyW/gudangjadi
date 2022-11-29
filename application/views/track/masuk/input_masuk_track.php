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

                                        <form enctype="multipart/form-data" id="data" action="<?= base_url("track/masuk_track/tambah_masuk_track") ?>" method="post" class="form">
                                            
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
                                                            <select id="kode" name="kode" class="form-control" onchange="getkode()" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($master as $mter) { ?>
                                                                    <?php if($this->uri->segment(4)==$mter->kode){?>
                                                                    <option selected value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                                <?php }else{?>
                                                                    <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                               <?php } } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function getkode(){
                                                    var kode = document.getElementById('kode').value;
                                                    window.location = '<?=base_url()?>'+'track/masuk_track/input_masuk_track/' + kode
                                                }
                                            </script>
                                            
                                            <?php $batch = $this->db->where('kode',$this->uri->segment(4))->get('detailsalqty')?>
                                            <?php 
                                            $mas = $this->db->where('kode',$this->uri->segment(4))->get('master');
                                            foreach($mas->result() as $m){
                                                $satuan1 = $m->sat1;
                                                $satuan2 = $m->sat2;
                                                $satuan3 = $m->sat3;
                                                $max1    = $m->max1;
                                                $max2    = $m->max2;
                                            }
                                            ?>
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
                                                        <select id="batch" class="form-control" onchange="qty()" name="nobatch" type="select" required>
                                                            <option type="search"></option>
                                                            <?php foreach($batch->result() as $b){?>
                                                                <option value="<?= $b->nobatch.'-'.$b->qty?>"> <?= $b->nobatch?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                    <div style="width:110px;padding-left:40px">
                                                    <label  class="login2 pull-right pull-right-pro">Isi batch:</label>
                                                    </div>
                                                    <div style="width:200px">
                                                        <h5 id="qty"></h5>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Pallet</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select id="nopallet" name="nopallet" type="select" class="form-control" required />
                                                        <option type="search"></option>
                                                        <?php 
                                                        foreach($pallet as $p){ ?>
                                                            <option value="<?= $p->kdpallet?>"><?php echo $p->kdpallet.' '. $p->status?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input id="sats1" name="sat1" type="number" class="form-control"
                                                            placeholder="Satuan 1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly class="form-control" value="<?php if($this->uri->segment(4)!=""){echo $satuan1;} ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input id="sats2" name="sat2" type="number" class="form-control"
                                                            placeholder="Satuan 2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly class="form-control" value="<?php if($this->uri->segment(4)!=""){echo $satuan2;} ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input id="sats3" name="sat3" type="number" class="form-control"
                                                            placeholder="Satuan 3">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly class="form-control" value="<?php if($this->uri->segment(4)!=""){echo $satuan3;} ?>">
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
                                                        <input name="cat" type="text" class="form-control" id="cat" value=""
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
                                                                <a href="<?= base_url("track/masuk_track") ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                <a onclick="filsalmin()" class="btn btn-sm btn-primary login-submit-cs">Save Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <!-- Start Form -->
                                        
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

<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<script>

    function qty(){
        var batch = document.getElementById('batch').value;
        var saldo = batch.slice(batch.search("-")+1,batch.length);
        var sat1  = Math.floor(saldo / (<?= $max1 * $max2 ?> ));
        var sisa  = saldo - (sat1 * <?= $max1 * $max2?>);
        var sat2  = Math.floor(sisa / <?= $max2?>);
        var sat3  = sisa - sat2 * <?= $max2 ?>;
        document.getElementById('qty').innerHTML = sat1+' <?= $satuan1?>, '+ sat2+' <?= $satuan2?>, '+ sat3+' <?= $satuan3?>';
        }
    function filsalmin(){
        var batch = document.getElementById('batch').value;
        var saldo = batch.slice(batch.search("-")+1,batch.length);
        var sal1  = document.getElementById('sats1').value;
        var sal2  = document.getElementById('sats2').value;
        var sal3  = document.getElementById('sats3').value;
        if(sal1==""){
            sal1=0;
        }
        if(sal2==""){
            sal2=0;
        }
        if(sal3==""){
            sal3=0;
        }
        var sald1 = sal1 * <?= $max1 * $max2?>;
        var sald2 = sal2 * <?= $max1 ?>;
        var total = parseInt(sald1)+parseInt(sald2)+parseInt(sal3);
        if(document.getElementById('nopallet').value != "" && document.getElementById('batch').value !=0){
            if(total <= saldo){
                document.getElementById('data').submit();
            }else{
                document.getElementById('cat').value = total;
            }
        }else{
            Swal.fire({
            icon: 'warning',
            html: "<h1><b>Peringatan!</b><h1><h5>Kode Pallet atau No Batch Kosong!</h5>",
            showConfirmButton: true,
            allowOutsideClick: false,
            width: 300,
            })
        }
    }
</script>
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
</script>

<?php if($this->uri->segment(4)!=""){?>
<script>
$(document).ready(function() {
    $("#batch").select2({
        placeholder: "Please Select",
    });
});
</script>
<?php }else{ ?>
    <script>
    $(document).ready(function() {
        $("#batch").select2({
            placeholder: "Pilih Kode barang terlebih dahulu",
        });
    });
    </script>
<?php } ?>

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