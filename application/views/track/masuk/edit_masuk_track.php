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
                        <h1>Edit Produk Masuk<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <form enctype="multipart/form-data" id="data" action="<?= base_url("track/masuk_track/update") ?>" method="post" class="form">
                                            
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
                                                            <!-- <select id="kode" name="kode" class="form-control" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($kode->result() as $mter) { ?>
                                                                    <option selected value="<?= $mter->kode ?>">
                                                                    <?= $mter->kode ?> - <?= $mter->nama ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select> -->
                                                            <input readonly type="text" class="form-control" value="<?= $mter->kode .'-'. $mter->nama ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
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
                                                        <input readonly type="text" class="form-control" value="<?= $mter->nobatch?>">
                                                        <!-- <select id="batch" onchange="getqty()" class="form-control"  name="nobatch" type="select" required>
                                                            <?php  $detailsalqty = $this->db->where('kode',$mter->kode)->where('nobatch',$mter->nobatch)->get('detailsalqty');?>
                                                            <option hidden selected value="<?= $mter->nobatch ?>"><?= $mter->nobatch ?></option>
                                                        <?php
                                                                foreach ($masuk as $m) {
                                                                    if ($m->kode == $mter->kode && $m->nobatch != $mter->nobatch) {?>
                                                                    <option value="<?= $m->nobatch ?>"><?= $m->nobatch ?></option>
                                                                    <?php }}?>
                                                                </select> -->
                                                    </div>
                                                    <div style="display:flex; flex-wrap:wrap">
                                                        <div style="width:150px;padding-left:10px">
                                                    <label  class="login2 pull-right pull-right-pro">belum dipallet:</label>
                                                </div>
                                                    <?php
                                                        if ($detailsalqty->num_rows()>0) {
                                                            foreach ($detailsalqty->result() as $dsq) {
                                                                $belumdipallet = $dsq->qty;
                                                            }
                                                        }else{
                                                            $belumdipallet = 0;
                                                        } ?>
                                                    <?php foreach($master as $master){
                                                        if($master->kode == $mter->kode){
                                                            $jmlqty = $mter->masuk+$belumdipallet;
                                                            $sats1  = floor($jmlqty / ($master->max1 * $master->max2));
                                                            $sisa   = $jmlqty - ($sats1 * $master->max1 * $master->max2);
                                                            $sats2  = floor($sisa / $master->max2);
                                                            $sats3  = $sisa - $sats2 * $master->max2;
                                                            
                                                            $sat1  = floor($mter->masuk / ($master->max1 * $master->max2));
                                                            $siso   = $mter->masuk - ($sat1 * $master->max1 * $master->max2);
                                                            $sat2  = floor($siso / $master->max2);
                                                            $sat3  = $siso - $sat2 * $master->max2;
                                                            ?>
                                                        <div style="width:200px">
                                                            <h5 id="qty"><?=$sats1.' '.$master->sat1.' '.$sats2.' '.$master->sat2.' '.$sats3.' '.$master->sat3?></h5>
                                                            <input id="qtylama" type="hidden" value="<?=$sats1.' '.$master->sat1.' '.$sats2.' '.$master->sat2.' '.$sats3.' '.$master->sat3?>">
                                                            <input id="qtybatchlama" type="hidden" value="<?=$mter->masuk?>">
                                                            <input name="qtyterlama" type="hidden" value="<?=$jmlqty?>">
                                                        </div>
                                                        <?php }} ?>
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
                                                        foreach ($pallet as $p) {
                                                            if ($p->kdpallet == $mter->nopallet) {?>
                                                            <option selected value="<?= $p->kdpallet?>"><?php echo $p->kdpallet.' '. $p->status?></option>
                                                            <?php } else { ?>
                                                            <option value="<?= $p->kdpallet?>"><?php echo $p->kdpallet.' '. $p->status?></option>
                                                        <?php }} ?>
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
                                                        <input name="tglform" type="date" class="form-control" readonly id="tglform" value="<?= $mter->tanggalform?>" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input id="sats1" name="sat1" type="number" value="<?= $sat1 ?>" class="form-control"
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
                                                        <input id="sats2" name="sat2" type="number" value="<?= $sat2 ?>" class="form-control"
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
                                                        <input id="sats3" name="sat3" type="number" value="<?= $sat3 ?>" class="form-control"
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
                                                        <input name="cat" type="text" class="form-control" id="cat" value="<?= $mter->cat ?>"
                                                            placeholder="Catatan" />
                                                        <input type="hidden" name="qtylama" id="jumlah">
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
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <input name="noform" id="noform" type="hidden" class="form-control" value="<?= $mter->noform?> "/>
                                                        <input type="hidden" value="<?=$mter->no?>" name="no">
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
                                                                <button type="submit" class="btn btn-sm btn-primary login-submit-cs">Save Change</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <!-- Start Form -->
                                        <input type="hidden" value="<?=$mter->nobatch?>" id="test">
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

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>

<script>
function getqty(){
    if(document.getElementById('batch').value == document.getElementById('test').value){
        document.getElementById('qty').innerHTML = document.getElementById('qtylama').value
    }
}
</script>

<script>
$(document).ready(function() {
    $("#nopallet").select2({
        placeholder: "Please Select",
    });
});
$(document).ready(function() {
        $("#batch").select2({
            placeholder: "Pilih Kode barang terlebih dahulu",
        });
    });
</script>

<script>
$(document).ready(function() {
    $('#batch').change(function() {
        var id = $(this).val();
        var kode = document.getElementById('kode').value;
        $.ajax({
            url: "<?php echo site_url('track/masuk_track/get_qty');?>",
            method: "POST",
            data: {
                id: id,
                kode: kode,
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var jumlah = data[0].qty;
                if(document.getElementById('test').value != null){
                    jumlah = Number(data[0].qty)+Number(document.getElementById('qtybatchlama').value);
                }
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
                html2 = data[0].tglform;
                html3 = data[0].noform;
                $('#tglform').val(html2);
                $('#jumlah').val(html1);
                $('#qty').html(html);
                $('#noform').val(html3);
                // console.log(document.getElementById('qtybatchlama').value)
            }
        });
        return false;
    });
});
</script>
<script>
    $(function() {
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