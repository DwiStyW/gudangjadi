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
                        <h1>Edit Produk Keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <form enctype="multipart/form-data" id="data" action="<?=base_url("track/keluar_track/update")?>" method="post" class="form">
                                            <?php foreach($keluar as $k){?>
                                                    <?php 
                                                    $qtyantara = $this->db->where('noform',$k->noform)->where('kode',$k->kode)->get('detailsalqty');
                                                    if ($qtyantara->num_rows()>0) {
                                                        foreach ($qtyantara->result() as $qa) {
                                                            $detailsalqty = $qa->qty;
                                                        }
                                                    }else{
                                                        $detailsalqty = 0;
                                                    }
                                                    ?>
                                            <input type="hidden" id="jumlah" name="isi_pallet">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Form</label>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="text" id="noform" name="noform" class="form-control" readonly value="<?=$k->noform?>">
                                                        <input type="hidden" id="noformlama" value="<?= $k->noform ?>">
                                                        <input type="hidden" name="no" value="<?= $this->uri->segment(4) ?>">
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                    <div style="width:110px;padding-left:40px">
                                                    <label  class="login2 pull-right pull-right-pro">permintaan:</label>
                                                    </div>
                                                    <div style="width:200px">
                                                    <?php 
                                                    $detailsalqty = $this->db->where('kode',$k->kode)->where('noform',$k->noform)->where('ket','OUT')->get('detailsalqty');
                                                    if($detailsalqty->num_rows()>0){
                                                        foreach($detailsalqty->result() as $dsq){
                                                            $permintaan = $dsq->qty;
                                                        }
                                                    }else{
                                                        $permintaan = 0;
                                                    }
                                                    $qtyedit = $k->keluar+$permintaan;
                                                    $master = $this->db->where('kode',$k->kode)->get('master');
                                                    foreach($master->result() as $master){
                                                        $sat1  = floor($qtyedit / ($master->max1 * $master->max2));
                                                        $siso   = $qtyedit - ($sat1 * $master->max1 * $master->max2);
                                                        $sat2  = floor($siso / $master->max2);
                                                        $sat3  = $siso - $sat2 * $master->max2;
                                                        
                                                        $sa1  = floor($k->keluar / ($master->max1 * $master->max2));
                                                        $sis   = $k->keluar - ($sa1 * $master->max1 * $master->max2);
                                                        $sa2  = floor($sis / $master->max2);
                                                        $sa3  = $sis - $sa2 * $master->max2;
                                                    }
                                                    ?>
                                                    <h5 id="keluaran"><?= $sat1.' '.$master->sat1.' '.$sat2.' '.$master->sat2.' '.$sat3.' '.$master->sat3 ?></h5>
                                                    <input type="hidden" id="permintaanterlama" value="<?= $sat1.' '.$master->sat1.' '.$sat2.' '.$master->sat2.' '.$sat3.' '.$master->sat3 ?>">
                                                    <input type="hidden" name="permintaanterlama" value="<?= $qtyedit ?>">
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
                                                            <select readonly id="kode" name="kode" class="form-control" required>
                                                                <option type="search"></option>
                                                                <option selected value="<?= $k->kode?>" ><?= $k->kode.' - '.$k->nama?></option>
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
                                                        <input type="text" id="batch" name="nobatch" class="form-control" disabled value="<?=$k->nobatch?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Pallet</label>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <select onchange="getisi()" id="pallet" name="nopallet" class="form-control" required />
                                                        <option type="search"></option>
                                                        <option selected hidden value="<?= $k->nopallet ?>"><?= $k->nopallet?></option>
                                                        <?php 
                                                        $pallet = $this->db->where('kode',$k->kode)->where('nobatch',$k->nobatch)->get('detailsal');
                                                        foreach ($pallet->result() as $pallet) {
                                                            $nopallet = $pallet->nopallet;
                                                            ?>
                                                        <?php if ($nopallet!=$k->nopallet) {?>
                                                        <option value="<?= $nopallet ?>"><?= $nopallet?></option>
                                                        <?php }
                                                        }?>
                                                        </select>
                                                        <input type="hidden" id="nopalletlama" value="<?=$k->nopallet?>">
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                    <div style="width:110px;padding-left:40px">
                                                    <label  class="login2 pull-right pull-right-pro">Isi:</label>
                                                    </div>
                                                    <div style="width:200px">
                                                    <?php 
                                                    $isipallet = $this->db->where('kode',$k->kode)->where('nobatch',$k->nobatch)->where('nopallet',$k->nopallet)->get('detailsal');
                                                    if ($isipallet->num_rows() > 0) {
                                                        foreach ($isipallet->result() as $isipallet) {
                                                            $qtydetailsal = $isipallet->qty;
                                                        }
                                                    }else{
                                                        $qtydetailsal=0;
                                                    }
                                                    $isi = $qtydetailsal+$k->keluar;
                                                    $master = $this->db->where('kode',$k->kode)->get('master');
                                                    foreach($master->result() as $m){}
                                                    $sats1  = floor($isi / ($m->max1 * $m->max2));
                                                    $sisa   = $isi - ($sats1 * $m->max1 * $m->max2);
                                                    $sats2  = floor($sisa / $m->max2);
                                                    $sats3  = $sisa - $sats2 * $m->max2;
                                                    ?>
                                                    <h5 id="qty"><?= $sats1.' '.$m->sat1.' '.$sats2.' '.$m->sat2.' '.$sats3.' '.$m->sat3?></h5>
                                                    <input type="hidden" id="qtypalletlama" value="<?= $sats1.' '.$m->sat1.' '.$sats2.' '.$m->sat2.' '.$sats3.' '.$m->sat3?>">
                                                    <input type="hidden" name="isi_pallet" value="<?= $isi?>">
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
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="<?=$k->tanggalform?>" readonly required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="sats1" name="sat1" type="number" class="form-control" value="<?= $sa1?>"
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
                                                        <input id="sats2" name="sat2" type="number" class="form-control" value="<?= $sa2?>"
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
                                                        <input id="sats3" name="sat3" type="number" class="form-control" value="<?= $sa3?>"
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
                                                        <input name="cat" type="text" class="form-control" id="cat" value="<?= $k->cat?>"
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
                                            <?php } ?>
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
<script src="<?=base_url()?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?=base_url()?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/sweetalert2/swal2.js"></script>
<script>

    // function qty(){
    //     var saldo = document.getElementById('saldo').value;
    //     var sat1  = Math.floor(saldo / (<?=$max1 * $max2?> ));
    //     var sisa  = saldo - (sat1 * <?=$max1 * $max2?>);
    //     var sat2  = Math.floor(sisa / <?=$max2?>);
    //     var sat3  = sisa - sat2 * <?=$max2?>;
    //     document.getElementById('qty').innerHTML = sat1+' <?=$satuan1?>, '+ sat2+' <?=$satuan2?>, '+ sat3+' <?=$satuan3?>';
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
<script src="<?=base_url()?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/sweetalert2/swal2.js"></script>
<script>
    function getqty(){
        if(document.getElementById('noform').value == document.getElementById('noformlama').value){
            document.getElementById('keluaran').innerHTML = document.getElementById('qtylama').value
        }
    }
    function getisi(){
        if(document.getElementById('pallet').value==document.getElementById('nopalletlama').value){
            document.getElementById('qty').innerHTML = document.getElementById('qtypalletlama').value
        }
    }
</script>
<script>
$(document).ready(function() {
    $('#noform').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_kode'); ?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                var htmlp = '';
                htmlp = '<option selected type="search"></option>';
                $('#pallet').html(htmlp);

                var htmlq = '';
                htmlq = '';

                $('#qty').html(htmlq);
                html2 = data[0].tglform;
                $('#tglform').val(html2);
            }
        });
        return false;
    });
    $('#batch').change(function() {
        var id = $(this).val();
        var kode = document.getElementById('kode').value;
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_pallet'); ?>",
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
            url: "<?php echo site_url('track/keluar_track/get_qty'); ?>",
            method: "POST",
            data: {
                id: id,
                kode: kode,
                batch: batch
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                if(id != document.getElementById('nopalletlama').value){
                var html = '';
                var html1 = '';
                var jumlah = data[0].qty;
                var max1   = data[0].max1;
                var max2   = data[0].max2;
                var sat1   = data[0].sat1;
                var sat2   = data[0].sat2;
                var sat3   = data[0].sat3;

                var jum1  = Math.floor(jumlah / (max1 * max2 ));
                var sisa  = jumlah - (jum1 * max1 * max2);
                var jum2  = Math.floor(sisa / max2);
                var jum3  = sisa - jum2 * max2;

                if(jumlah!=null){
                html = "<h5>"+jum1+" "+sat1+" "+jum2+" "+sat2+" "+jum3+" "+sat3+"</h5>";
                }
                html1 = jumlah;
                $('#jumlah').val(html1);
                $('#qty').html(html);
                // console.log(data);
            }
            }
        });
        return false;
    });
    $('#noform').change(function() {
        var noform = $(this).val();
        var id = document.getElementById('kode').value;
        $.ajax({
            url: "<?php echo site_url('track/keluar_track/get_keluar'); ?>",
            method: "POST",
            data: {
                id: id,
                noform: noform,
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var html1 = '';
                var jumlah = data[0].qty;
                var max1   = data[0].max1;
                var max2   = data[0].max2;
                var sat1   = data[0].sat1;
                var sat2   = data[0].sat2;
                var sat3   = data[0].sat3;

                var jum1  = Math.floor(data[0].qty / (max1 * max2 ));
                var sisa  = jumlah - (jum1 * max1 * max2);
                var jum2  = Math.floor(sisa / max2);
                var jum3  = sisa - jum2 * max2;

                if(jumlah!=null){
                html = "<h5>"+jum1+" "+sat1+" "+jum2+" "+sat2+" "+jum3+" "+sat3+"</h5>";
                }
                html1 = jumlah;
                $('#keluaran').html(html);
            }
        });
        return false;
    });
});
</script>
<script>
$(document).ready(function() {
    $("#pallet").select2({
        placeholder: "Please Select",
    });
});
</script>
