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
                        <h1>Input Bahan keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <form enctype="multipart/form-data" id="data" action="<?= base_url("track/keluar_track/tambah_keluar_track") ?>" method="post" class="form">
                                            
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
                                                                foreach ($master as $mter) {?>
                                                                    <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                               <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php $batch = $this->db->where('kode',$this->uri->segment(4))->group_by("nobatch")->get('detailsal')?>
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
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Batch</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select id="batch" class="form-control" name="nobatch" type="select" required>
                                                            <option type="search"></option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Pallet</label>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <select id="pallet" name="nopallet" type="select" class="form-control" required />
                                                        <option type="search"></option>
                                                        
                                                        </select>
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                    <div style="width:110px;padding-left:40px">
                                                    <label  class="login2 pull-right pull-right-pro">Isi:</label>
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
                                            <input type="text" id="jumlah">
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="<?= base_url("track/keluar_track") ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                                                <button type="submit" class="btn btn-sm btn-primary login-submit-cs">Save Change</button>
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

    // function qty(){
    //     var saldo = document.getElementById('saldo').value;
    //     var sat1  = Math.floor(saldo / (<?= $max1 * $max2 ?> ));
    //     var sisa  = saldo - (sat1 * <?= $max1 * $max2?>);
    //     var sat2  = Math.floor(sisa / <?= $max2?>);
    //     var sat3  = sisa - sat2 * <?= $max2 ?>;
    //     document.getElementById('qty').innerHTML = sat1+' <?= $satuan1?>, '+ sat2+' <?= $satuan2?>, '+ sat3+' <?= $satuan3?>';
    //     }
    function filsalmin(){
        var saldo = document.getElementById('jumlah').value;
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
        if(document.getElementById('nopallet').value == "" && document.getElementById('batch').value !=""){
            if(total > saldo || total<0){
                document.getElementById('data').submit();
            }else{
                Swal.fire({
            icon: 'warning',
            html: "<h1><b>Peringatan!</b><h1><h5>Saldo tidak mencukupi!</h5>",
            showConfirmButton: true,
            allowOutsideClick: false,
            width: 300,
            })
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<script>
$(document).ready(function() {
    $('#kode').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_batch');?>",
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
                $("#pallet").select2({
                    placeholder: "No Selected",
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
                
                var htmlq = '';
                htmlq = '';
                $('#qty').html(htmlq);
            }
        });
        return false;
    });

    $('#batch').change(function() {
        var id = $(this).val();
        var kode = document.getElementById('kode').value;
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_pallet');?>",
            method: "POST",
            data: {
                id: id,
                kode: kode
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var i;
                html = '<option selected type="search"></option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].nopallet + '>' + data[i]
                        .nopallet + '</option>';
                }
                $('#pallet').html(html);
            }
        });
        return false;
    });

    $('#pallet').change(function() {
        var id = $(this).val();
        var kode = document.getElementById('kode').value;
        var batch= document.getElementById('batch').value;
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_qty');?>",
            method: "POST",
            data: {
                id: id,
                kode: kode,
                batch: batch
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var html1 = '';
                var jumlah = data[0].jumlah;
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
                }
                html1 = jumlah;
                $('#jumlah').val(html1);
                $('#qty').html(html);
                console.log(jumlah);
            }
        });
        return false;
    });


});
</script>
<script>
$(document).ready(function() {
    $("#kode").select2({
        placeholder: "Please Select",
    });
    $("#batch").select2({
        placeholder: "No Selected",
    });
    $("#pallet").select2({
        placeholder: "No Selected",
    });
});
</script>
<script>
$(function() {
    $("#kode").change(function() {
        $("#batch").select2('val', 'all');
        $("#pallet").select2('val', 'all');
    });
    $("#batch").change(function() {
        $("#pallet").select2('val', 'all');
        $("#pallet").select2({
            placeholder: "Please Select",
        });
    })
})
</script>
