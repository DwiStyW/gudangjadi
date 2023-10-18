<?php
ini_set('date.timezone', 'Asia/Jakarta');
?>
<!-- <div class="layarlebar"> -->
<div class="admin-dashone-data-table-area mg-b-40">
    <div class="container" style="position:relative;top:-250px;z-index: 1">
        <div class="d-flex">
            <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-start"
                    style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                    <h1>Detail Saldo Gudang jadi</h1>
                </div>
                <div class="main-sparkline8-hd justify-content-end"
                    style="display:flex; flex:wrap;padding-bottom:20px;padding-left:20px;">
                            <div class="col-lg-2">
                                <select style="width:100%" onchange="filter()" name="kode" id="kode">
                                    <option value=""></option>
                                    <option value="unset">Pilih barang</option>
                                    <?php foreach($kode->result() as $kode){?>
                                        <option value="<?=$kode->kode?>"><?= $kode->nama?></option>
                                        <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select style="width:100%" onchange="filter()" name="batch" id="batch">
                                    <option value=""></option>
                                    <option value="unset">Pilih batch</option>
                            <?php foreach($batch->result() as $batch){?>
                            <option value="<?=$batch->nobatch?>"><?=$batch->nobatch?></option>
                            <?php } ?>
                        </select>
                        </div>
                        <div class="col-lg-2">
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
        </div>
        <div style="background-color:#fff">
        <a href="<?= base_url("track/saldo_track/saldo_mendekati_exp")?>" class="btn btn-sm btn-warning" style="margin-top:10px; margin-left:20px">Warning</a>
        <a href="<?= base_url("track/saldo_track/saldo_exp")?>" class="btn btn-sm btn-danger" style="margin-top:10px; margin-left:10px">Danger</a>
            <div class="sparkline8-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">
                    <div class="table-responsive">
                        <table id="tabel" class="table table-bordered" width="100%" style="empty-cells:hide">
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
                                    <th data-field="Exp_b">Exp</th>
                                </tr>
                            </thead>
                            <tbody id="isi">
                                <?php
                                $no=0;
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
                                    $diff = date_diff($akhir, $awal);
                                    $bln=$diff->y*12+$diff->m;
                                    $jarak = strtotime($tglexp)-strtotime(date("Y-m-d"));
                                    ?>
                                    <?php if ($diff->y == 0 && $diff->m <= 6) {?>
                                    <tr style="color:red">
                                    <td><b><?php echo $no+=1; ?></b></td>
                                    <td><b><?php $batch = $s->nobatch;echo $batch;?></td>
                                    <td><b><?php echo $s->kode; ?></b></td>
                                    <td><b><?php echo $s->nama; ?></b></td>
                                    <td><b><?php echo $s->nopallet; ?></b></td>
                                    <td><b><?php echo $sats1; ?> <?php echo $s->sat1 ?></b></td>
                                    <td><b><?php echo $sats2; ?> <?php echo $s->sat2 ?></b></td>
                                    <td><b><?php echo $sats3; ?> <?php echo $s->sat3 ?></b></td>
                                    <td><b><?php echo $diff->y.' tahun '.$diff->m.' bulan '?></b></td>
                                    <td><b><?php echo $bln?></b></td>
                                    </tr>
                                    <?php } elseif ($diff->y == 0 && $diff->m <= 9) {
                                        if($jarak>0){?>
                                        <tr style="color:darkorange">
                                        <td><b><?php echo $no+=1; ?></td></b>
                                        <td><b><?php $batch = $s->nobatch;echo $batch;?></b></td>
                                        <td><b><?php echo $s->kode; ?></b></td>
                                        <td><b><?php echo $s->nama; ?></b></td>
                                        <td><b><?php echo $s->nopallet; ?></b></td>
                                        <td><b><?php echo $sats1; ?> <?php echo $s->sat1 ?></b></td>
                                        <td><b><?php echo $sats2; ?> <?php echo $s->sat2 ?></b></td>
                                        <td><b><?php echo $sats3; ?> <?php echo $s->sat3 ?></b></td>
                                        <td><b><?php echo $diff->y.' tahun '.$diff->m.' bulan '?></b></td>
                                        <td><b><?php echo $bln?></b></td>
                                        </tr>
                                    <?php }elseif($jarak<0){?>
                                        <tr style="color:red">
                                            <td><b><?php echo $no+=1; ?></b></td>
                                            <td><b><?php $batch = $s->nobatch;echo $batch;?></td>
                                            <td><b><?php echo $s->kode; ?></b></td>
                                            <td><b><?php echo $s->nama; ?></b></td>
                                            <td><b><?php echo $s->nopallet; ?></b></td>
                                            <td><b><?php echo $sats1; ?> <?php echo $s->sat1 ?></b></td>
                                            <td><b><?php echo $sats2; ?> <?php echo $s->sat2 ?></b></td>
                                            <td><b><?php echo $sats3; ?> <?php echo $s->sat3 ?></b></td>
                                            <td><b><?php echo $diff->y.' tahun '.$diff->m.' bulan '?></b></td>
                                            <td><b><?php echo $bln?></b></td>
                                        </tr>
                                    <?php }
                                } else {?>
                                        <tr>
                                    <td><?php echo $no+=1; ?></td>
                                    <!-- <td><?php echo date("d-m-Y", strtotime($s->tgl)); ?></td> -->
                                    <td><?php $batch = $s->nobatch;echo $batch;?></td>
                                    <td><?php echo $s->kode; ?></td>
                                    <td><?php echo $s->nama; ?></td>
                                    <td><?php echo $s->nopallet; ?></td>
                                    <td><?php echo $sats1; ?> <?php echo $s->sat1 ?></td>
                                    <td><?php echo $sats2; ?> <?php echo $s->sat2 ?></td>
                                    <td><?php echo $sats3; ?> <?php echo $s->sat3 ?></td>
                                    <td><b><?php echo $diff->y.' tahun '.$diff->m.' bulan '?></b></td>
                                    <td><?php echo $bln ?></td>
                                    </tr>
                                    <?php }} ?>
                            </tbody>
                        </table>
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
<?php $this->load->view("track/filter-ajax");?>