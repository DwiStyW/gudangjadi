<?php
ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
?>
<div class="">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;margin-top:-250px;padding-bottom:32px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Input Produk Keluar</h1>
                        <div style="display:flex; flex:wrap;padding-right:20px">
                            <div style="width:auto">
                                <div data-target="#scanKeluar" data-toggle="modal" name="submit" class="btn btn-sm btn-warning">Scan Pallet</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <form enctype="multipart/form-data" id="data" action="<?=base_url("track/keluar_track/tambah_keluar_track")?>" method="post" class="form">
                                            <input type="hidden" id="jumlah" name="isi_pallet" value="<?= $detailsal['qty']?>">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Form</label>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <?php
                                                        $kode=$detailsal['kode'];
                                                        $noform = $this->db->query("SELECT * FROM detailsalqty where ket='OUT' and kode='$kode'");
                                                        if($noform->num_rows()>0){?>
                                                        <select id="noform" name="noform" type="select" class="form-control" required />
                                                        <option type="search"></option>
                                                        <?php
                                                        foreach($noform->result() as $sppb){?>
                                                            <option value="<?= $sppb->noform?>"><?= $sppb->noform?></option>
                                                        <?php } ?>
                                                        </select>
                                                        <?php }else{ ?>
                                                            <select id="noform" name="noform" type="select" class="form-control" disabled required>
                                                                <option value selected disabled>Tidak ada permintaan</option>
                                                            </select>
                                                        <?php } ?>

                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                    <div style="width:110px;padding-left:40px">
                                                    <label  class="login2 pull-right pull-right-pro">permintaan:</label>
                                                    </div>
                                                    <div style="width:200px">
                                                    <h5 id="keluaran"></h5>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Kode
                                                            Barang</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <input id="kodetok" class="form-control" value="<?= "|". $detailsal['kode']."|-".$detailsal['nama'] ?>" readonly required>
                                                            <input id="kode" name="kode" value="<?=$detailsal['kode']?>" hidden>
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
                                                        <input id="batch" class="form-control" name="nobatch" value="<?= $detailsal['nobatch']?>" readonly type="text" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Pallet</label>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input id="pallet" name="nopallet" type="select" class="form-control" value="<?= $detailsal['nopallet']?>" readonly required />
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                    <div style="width:110px;padding-left:40px">
                                                    <label  class="login2 pull-right pull-right-pro">Isi:</label>
                                                    </div>
                                                    <div style="width:200px">
                                                    <?php
                                                    $master = $this->db->query("SELECT * FROM master where kode='$kode'");
                                                    foreach($master->result() as $m){
                                                        $sat1 = $m->sat1;
                                                        $sat2 = $m->sat2;
                                                        $sat3 = $m->sat3;
                                                    }
                                                    ?>
                                                    <h5><?= $detailsal['sats1']." ".$sat1." ".$detailsal['sats2']." ".$sat2." ".$detailsal['sats3']." ".$sat3 ?></h5>
                                                    </div>
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
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="" readonly required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="sats1" name="sat1" type="number" value="<?= $detailsal['sats1']?>" class="form-control"
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
                                                        <input id="sats2" name="sat2" type="number" value="<?= $detailsal['sats2']?>" class="form-control"
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
                                                        <input id="sats3" name="sat3" type="number" value="<?= $detailsal['sats3']?>" class="form-control"
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
                                                        <input name="cat" type="text" class="form-control" id="cat" value=""
                                                            placeholder="Catatan" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <input name="adm" type="hidden" class="form-control" id="adm"
                                                            value="<?=$this->session->userdata('user_id');?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="<?=base_url("track/keluar_track")?>"><button class="btn btn-white" type="button">Kembali</button></a>
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
<?php $this->load->view("track/keluar/modal_input_scan");?>

<!-- mobile -->
<script src="<?=base_url()?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?=base_url()?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/sweetalert2/swal2.js"></script>
<script>
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
        var sald1 = sal1 * <?=$max1 * $max2?>;
        var sald2 = sal2 * <?=$max1?>;
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

<?php if ($this->session->flashdata('sukses')): ?>
<script>
Swal.fire({
    icon: 'success',
    position: 'top-end',
    title: '<?=$this->session->flashdata('sukses')?>',
    showConfirmButton: false,
    timer: 1500,
    allowOutsideClick: false,
    timerProgressBar: true
})
</script>
<?php endif?>

<?php if ($this->session->flashdata('gagal')): ?>
<script>
Swal.fire({
    icon: 'error',
    position: 'top-end',
    title: '<?=$this->session->flashdata('gagal')?>',
    showConfirmButton: false,
    timer: 1500,
    allowOutsideClick: false,
    timerProgressBar: true
})
</script>
<?php
endif?>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script>
$(document).ready(function() {
    $("#noform").select2({
        placeholder: "Please Select",
    });
});
</script>
<script>
$(document).ready(function() {
    $('#noform').change(function() {
        var id = $(this).val();
        var kode = document.getElementById("kode").value;
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_permintaan'); ?>",
            method: "POST",
            data: {
                id: id,
                kode:kode
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                var html2 = '';
                html2 += data[0].tglform;
                $('#tglform').val(html2);
                var html =''
                html+=data[0].sats1+" "+data[0].sat1+" "+data[0].sats2+" "+data[0].sat2+" "+data[0].sats3+" "+data[0].sat3;
                document.getElementById("keluaran").innerHTML=html;
                console.log(data);
            }
        });
        return false;
    });

    $('#kode').change(function() {
        var id = $(this).val();
        var noform = document.getElementById('noform').value;
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_batch'); ?>",
            method: "POST",
            data: {
                id: id,
                noform: noform
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var htmlk = '';
                var i;
                html = '<option selected type="search"></option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].nobatch + '>' + data[i]
                        .nobatch + '</option>';
                }
                $('#batch').html(html);
            }
        });
        return false;
    });
});
</script>