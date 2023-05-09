<?php
ini_set('date.timezone', 'Asia/Jakarta');
?>
<!-- <div class="layarlebar"> -->
<div class="admin-dashone-data-table-area mg-b-40">
    <div class="container" style="position:relative;top:-250px;z-index: 1">
        <div class="d-flex">
            <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between"
                    style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                    <h1>Detail Saldo Gudang jadi<h1>
                            <div id="src" style="width:100%; padding-right:20px">
                                    <form action="<?=base_url('track/saldo_track/index')?>" method="post">
                                    <div style="display:flex; flex:wrap">
                                        <div style="width:100%">
                                            <?php if (isset($keyword)) {?>
                                                <input type="text" name="keyword" value="<?=$keyword?>" placeholder="Cari Produk Masuk..." class="form-control">
                                            <?php } else {?>
                                                <input type="text" name="keyword" placeholder="Cari Produk Masuk..." class="form-control">
                                                <?php }?>
                                        </div>
                                        <div style="width:auto">
                                            <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <?php if ($keyword != null) {?>
                                    <form action="<?=base_url('track/saldo_track/index')?>" method="post">
                                    <input type="hidden" name="keyword" value="">
                                        <div style="width:auto">
                                        <button class="btn btn-light" type="submit">Reset</button>
                                        </div>
                                    </form>
                                    <?php }?>
                            </div>
                </div>
            </div>
        </div>
        <div style="background-color:#fff">
            <div class="sparkline8-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">
                    <div id="toolbarr">
                        <div class="col-lg-12">
                        <select style="width:92%" onchange="filter()" name="kode" id="kode">
                            <option value=""></option>
                            <option value="unset">Pilih barang</option>
                            <?php foreach($kode->result() as $kode){?>
                                <option value="<?=$kode->kode?>"><?= $kode->nama?></option>
                                <?php } ?>
                        </select>
                    </div>
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <select style="width:100%" onchange="filter()" name="batch" id="batch">
                                    <option value=""></option>
                                    <option value="unset">Pilih batch</option>
                            <?php foreach($batch->result() as $batch){?>
                            <option value="<?=$batch->nobatch?>"><?=$batch->nobatch?></option>
                            <?php } ?>
                        </select>
                        </div>
                        <div id="reset" class="col-lg-4"></div>
                        <div class="col-lg-4">
                        <select style="width:100%" onchange="filter()" name="pallet" id="pallet">
                            <option value=""></option>
                            <option value="unset">Pilih pallet</option>
                            <?php foreach($pallet->result() as $pallet){?>
                            <option value="<?=$pallet->nopallet?>"><?=$pallet->nopallet?></option>
                            <?php } ?>
                        </select>
                        </div>
                        </div>
                    </div>
                    <table id="table" data-toggle="table" data-pagination="false" data-search="false"
                        data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false"
                        data-key-events="true" data-show-toggle="true" data-resizable="false" data-cookie="true"
                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                        data-toolbar="#toolbarr">
                        <thead>
                            <tr>
                                <th data-field="no">No</th>
                                <!-- <th data-field="tglform">Tgl Form</th> -->
                                <th data-field="nobatch">No Batch</th>
                                <th data-field="kode">Kode Barang</th>
                                <th data-field="nama">Nama Barang</th>
                                <th data-field="batch">No Pallet</th>
                                <th data-field="sat1">Satuan 1</th>
                                <th data-field="sat2">Satuan 2</th>
                                <th data-field="sat3">Satuan 3</th>
                                <th data-field="Exp">Expired Date</th>
                            </tr>
                        </thead>
                        <tbody id="isi">
                            <?php
foreach ($saldo as $s) {?>
                                <?php
//Perhitungan 3 Satuan

    $sats1 = floor($s->qty / ($s->max1 * $s->max2));
    $sisa = $s->qty - ($sats1 * $s->max1 * $s->max2);
    $sats2 = floor($sisa / $s->max2);
    $sats3 = $sisa - $sats2 * $s->max2;

    // perhitungan expdate
    $batch = $s->nobatch;
    $tahun = strrev(substr(substr($batch, -6), 0, 2));
    $bulan = substr(substr($batch, -6), 2, 2);
    $gabung = $bulan . '/01/' . (2000 + $tahun);
    $tglprod = date("Y-m-d", strtotime($gabung));
    $bulan1 = $s->expdate;
    $tglexp = date("Y-m-d", strtotime('+' . $bulan1 . ' month', strtotime($tglprod)));

    $awal = date_create($tglexp);
    $akhir = date_create(); // waktu sekarang
    $diff = date_diff($akhir, $awal);?>

                                <?php if ($diff->y == 0 && $diff->m <= 3) {
        ?>
                                <tr class="bg-danger">
                                <td><?php echo ++$start; ?></td>
                                <!-- <td><?php echo date("d-m-Y", strtotime($s->tgl)); ?></td> -->
                                <td><?php $batch = $s->nobatch;
        echo $batch;?></td>
                                <td><?php echo $s->kode; ?></td>
                                <td><?php echo $s->nama; ?></td>
                                <td><?php echo $s->nopallet; ?></td>
                                <td><?php echo $sats1; ?> <?php echo $s->sat1 ?></td>
                                <td><?php echo $sats2; ?> <?php echo $s->sat2 ?></td>
                                <td><?php echo $sats3; ?> <?php echo $s->sat3 ?></td>
                                <td><?php echo $diff->y . ' tahun ' . $diff->m . ' bulan '; ?></td>
                                </tr>
                                <?php } elseif ($diff->y == 0 && $diff->m <= 6) {?>
                                    <tr class="bg-warning">
                                    <td><?php echo ++$start; ?></td>
                                    <!-- <td><?php echo date("d-m-Y", strtotime($s->tgl)); ?></td> -->
                                    <td><?php $batch = $s->nobatch;
        echo $batch;?></td>
                                    <td><?php echo $s->kode; ?></td>
                                    <td><?php echo $s->nama; ?></td>
                                    <td><?php echo $s->nopallet; ?></td>
                                    <td><?php echo $sats1; ?> <?php echo $s->sat1 ?></td>
                                    <td><?php echo $sats2; ?> <?php echo $s->sat2 ?></td>
                                    <td><?php echo $sats3; ?> <?php echo $s->sat3 ?></td>
                                    <td><?php echo $diff->y . ' tahun ' . $diff->m . ' bulan '; ?></td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                <td><?php echo ++$start; ?></td>
                                <!-- <td><?php echo date("d-m-Y", strtotime($s->tgl)); ?></td> -->
                                <td><?php $batch = $s->nobatch;
        echo $batch;?></td>
                                <td><?php echo $s->kode; ?></td>
                                <td><?php echo $s->nama; ?></td>
                                <td><?php echo $s->nopallet; ?></td>
                                <td><?php echo $sats1; ?> <?php echo $s->sat1 ?></td>
                                <td><?php echo $sats2; ?> <?php echo $s->sat2 ?></td>
                                <td><?php echo $sats3; ?> <?php echo $s->sat3 ?></td>
                                <td><?php echo $diff->y . ' tahun ' . $diff->m . ' bulan '; ?></td>
                                </tr>
                                <?php }}?>
                        </tbody>
                    </table>
                    <div id="hide">
                    <div style="width:100%;margin-top:20px; display:flex; flex:wrap" class="justify-content-between">
                        <form action="<?=base_url('track/saldo_track')?>" id="go" method="post">
                            <div style="width:100px">
                                <select class="form-control" name="range" onchange="go()">
                                    <option disabled selected value>Row</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="all">Show All</option>
                                </select>
                            </div>
                        </form>
                        <?=$this->pagination->create_links();?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- </div> -->
<!-- Data table area End-->


<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script src="<?=base_url()?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>assets/sweetalert2/swal2.js"></script>

<script>
function go() {
    document.getElementById('go').submit();
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

<script>
$(document).ready(function() {
    $("#kode").select2({
        placeholder: "Nama Produk",
    });
    $("#batch").select2({
        placeholder: "No. Batch",
    });
    $("#pallet").select2({
        placeholder: "No. Pallet",
    });
});
</script>

<script>
    function filter(){
        var kode = document.getElementById('kode').value
        var batch = document.getElementById('batch').value
        var pallet = document.getElementById('pallet').value
        $.ajax({
            url: "<?php echo site_url('track/saldo_track/filter'); ?>",
            method: "POST",
            data: {
                kode: kode,
                batch:batch,
                pallet:pallet
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                // html2 = "<table class='table table-bordered' id='table' data-toggle='table' data-pagination='true' data-search='false'data-show-columns='true' data-show-pagination-switch='true' data-show-refresh='true' data-key-events='true' data-show-toggle='true' data-resizable='true' data-cookie='true' data-cookie-id-table='saveId' data-show-export='true' data-click-to-select='true' data-toolbar='#toolbarr'>"
                // html="<thead><tr>"
                // html+="<th data-field='no'>No</th><th data-field='nobatch'>No Batch</th><th data-field='kode'>Kode Barang</th><th data-field='nama'>Nama Barang</th><th data-field='batch'>No Pallet</th><th data-field='sat1'>Satuan 1</th><th data-field='sat2'>Satuan 2</th><th data-field='sat3'>Satuan 3</th><th data-field='Exp'>Expired Date</th></tr></thead><tbody>"                              
                            
                for (i = 0; i < data.length; i++) {
                    var tahunKebalik = data[i].nobatch.slice(parseInt(data[i].nobatch.length-6),parseInt(data[i].nobatch.length-4));
                    var tahun = parseInt(tahunKebalik.split('').reverse().join(''))+parseInt(2000);
                    var bulan = data[i].nobatch.slice(parseInt(data[i].nobatch.length-4),parseInt(data[i].nobatch.length-2));
                    // var tanggal = data[i].nobatch.slice(parseInt(data[i].nobatch.length-2),data[i].nobatch.length);
                    var tanggal = '01';
                    var tahun_exp = (parseInt(data[i].expdate)/12)+parseInt(tahun);
                    var join = tahun_exp+'-'+bulan+'-'+tanggal;
                    var expdate = parseInt(data[i].expdate);
                    var tgl_exp = new Date(join);
                    var now = new Date().getTime();
                    var tWaktu = parseInt(tgl_exp.getTime())-parseInt(now);
                    var tHari = Math.floor(parseInt(tWaktu)/(3600*24*1000));
                    var hBulan = Math.floor(parseInt(tHari)/30)
                    var tTahun = Math.floor(parseInt(hBulan)/12)
                    var tBulan = Math.floor(((parseInt(hBulan)/12)-tTahun)*12)
                    var sat1 = Math.floor(data[i].qty / (data[i].max1*data[i].max2));
                    var sisa  = data[i].qty - (sat1 * data[i].max1 * data[i].max2);
                    var sat2  = Math.floor(sisa / data[i].max2);
                    var sat3  = sisa - sat2 * data[i].max2;
                    html+="<tr><td>"+parseInt(i+1)+"</td><td>"+data[i].nobatch+"</td><td>"+data[i].kode+"</td><td>"+data[i].nama+"</td><td>"+data[i].nopallet+"</td><td>"+sat1+" "+data[i].sat1+"</td><td>"+sat2+" "+data[i].sat2+"</td><td>"+sat3+" "+data[i].sat3+"</td><td>"+ tTahun+' Tahun ' + tBulan+' Bulan'+"</td></tr>"
                }
                html1=''
                html2=''
                html2+='<a style="width:100%" href="<?= base_url("track/saldo_track")?>"><b>Reset</b></a>'
                $('#isi').html(html);
                $('#hide').html(html1);
                $('#src').html(html1);
                $('#reset').html(html2);
                // console.log(data)
            }
        });
        return false;
    }
</script>