<?php
    ini_set('date.timezone', 'Asia/Jakarta');
?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Satuan Barang<h1>
                        <div style="width:100%; padding-right:20px">
                                    <form action="<?= base_url('konversisatuan/index')?>" method="post">
                                    <div style="display:flex; flex:wrap">
                                        <div style="width:100%">
                                            <?php if(isset($keyword)){?>
                                                <input type="text" name="keyword" value="<?= $keyword?>" placeholder="Cari Produk Masuk..." class="form-control">
                                            <?php }else{ ?>
                                                <input type="text" name="keyword" placeholder="Cari Produk Masuk..." class="form-control">
                                                <?php } ?>
                                        </div>
                                        <div style="width:auto">
                                            <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <?php if($keyword != null){?>
                                    <form action="<?=base_url('konversisatuan/index')?>" method="post">
                                    <input type="hidden" name="keyword" value="">
                                        <div style="width:auto">
                                        <button class="btn btn-light" type="submit">Reset</button>
                                        </div>
                                    </form>
                                    <?php } ?>
                                </div>
                                </div>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbarr">
                                <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                <button data-toggle="modal" data-target="#ketigasatuan" class="btn btn-sm btn-primary">Konversi ke 3 satuan</button>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbarr">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tglform">Tgl Form</th>
                                        <th data-field="noform">No Form</th>
                                        <th data-field="kode">Kode Barang</th>
                                        <th data-field="nama">Nama Barang</th>
                                        <th data-field="batch">NoBatch</th>
                                        <th data-field="satuan1">Satuan 1</th>
                                        <th data-field="satuan2">Satuan 2</th>
                                        <th data-field="satuan3">Satuan 3</th>
                                        <th data-field="satuanterkecil">satuan terkecil</th>
                                        <th data-field="ket">Keterangan</th>
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="oleh">Oleh</th>
                                        <th data-field="suplai">Supplier</th>
                                        <th data-field="cat">Catatan</th>
                                        <!-- <th data-field="aksi">Aksi</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($masuk as $m) { ?>
                                    <tr>
                                    <td><?php echo ++$start; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($m->tanggalform)); ?></td>
                                        <td><?php echo $m->noform; ?></td>
                                        <td><?php echo $m->kode; ?></td>
                                        <td><?php echo $m->nama; ?></td>
                                        <td><?php echo $m->nobatch; ?></td>
                                        <?php
                                                //Perhitungan 3 Satuan

                                                $sats1  = floor($m->masuk / ($m->max1 * $m->max2));
                                                $sisa   = $m->masuk - ($sats1 * $m->max1 * $m->max2);
                                                $sats2  = floor($sisa / $m->max2);
                                                $sats3  = $sisa - $sats2 * $m->max2;

                                                ?>
                                        <td><?php echo $sats1; ?> <?php echo $m->sat1 ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $m->sat2 ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $m->sat3 ?></td>
                                        <?php if($m->masuk!=0){?>
                                            <td><b><?= $m->masuk.' '.$m->sat3 ?></b></td>
                                            <td><b>Masuk</b></td>
                                        <?php }else{?>
                                            <td><b><?= $m->keluar.' '.$m->sat3 ?></b></td>
                                            <td><b>Keluar</b></td>
                                        <?php }?>
                                        <td><?php echo $m->tanggal; ?></td>
                                        <td><a href="<?= base_url("penginput/user/" . $m->adm) ?>"><?php echo $m->username ?>
                                        </td>
                                        <td><?php echo $m->suplai ?></td>
                                        <td><?php echo $m->cat ?></td>
                                        <!-- <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="<?= base_url("masuk/edit_masuk/" . $m->no) ?>"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                                    <a onclick="hapus(`<?=$m->no?>`,`<?=$m->noform?>`,`<?=$m->nobatch?>`,`<?=$m->kode?>`,`<?= $sats1?>`,`<?= $sats2?>`,`<?= $sats3?>`,`<?= $m->sat1?>`,`<?= $m->sat2?>`,`<?= $m->sat3?>`)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i
                                                class="fa fa-trash"></i> Hapus</a>
                                        </td> -->
                                    </tr>
                                    <?php
                                        } ?>
                                </tbody>
                            </table>
                            <div style="width:100%;margin-top:20px; display:flex; flex:wrap" class="justify-content-between">
                                <form action="<?= base_url('konversisatuan') ?>" id="go" method="post">
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
<!-- Data table area End-->

<!-- mobile -->
<div class="layarsedangmengecil">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div style="position:relative;margin-top:-300px;padding-bottom:32px;z-index: 1;margin-left:20px;
            margin-right:20px;width:auto;">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Barang Jadi Masuk<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <a href="<?= base_url("masuk/input_masuk") ?>"><button
                                        class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan
                                        Masuk</button></a>
                                <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
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
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="oleh">Oleh</th>
                                        <th data-field="suplai">Supplier</th>
                                        <th data-field="cat">Catatan</th>
                                        <th data-field="aksi">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($masuk as $m) {
                                        ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($m->tglform)); ?></td>
                                        <td><?php echo $m->noform; ?></td>
                                        <td><?php echo $m->kode; ?></td>
                                        <td><?php echo $m->nama; ?></td>
                                        <?php
                                                //Perhitungan 3 Satuan

                                                $sats1  = floor($m->masuk / ($m->max1 * $m->max2));
                                                $sisa   = $m->masuk - ($sats1 * $m->max1 * $m->max2);
                                                $sats2  = floor($sisa / $m->max2);
                                                $sats3  = $sisa - $sats2 * $m->max2;

                                                ?>
                                        <td><?php echo $sats1; ?> <?php echo $m->sat1 ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $m->sat2 ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $m->sat3 ?></td>
                                        <td><?php echo $m->tanggal; ?></td>
                                        <td><a href="<?= base_url("penginput/user/" . $m->adm) ?>"><?php echo $m->username ?>
                                        </td>
                                        <td><?php echo $m->suplai ?></td>
                                        <td><?php echo $m->cat ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="<?= base_url("masuk/edit_masuk/" . $m->no) ?>"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i
                                                    class="fa fa-trash"></i> Hapus</button>
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
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>

<script>
    function go() {
        document.getElementById('go').submit();
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
<div class="modal fade" id="ketigasatuan" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konversi ke 3 Satuan</h1>
            </div>
                <div class="modal-body">
                    <select style="width:100%" name="barang" id="barang">
                        <option type="search"></option>
                        <?php foreach($master as $m){?>
                            <option value="<?= $m->kode?>"><?= $m->kode?> - <?= $m->nama?></option>
                        <?php }?>
                    </select>
                    <label style="margin-top:20px" for="">Satuan terkecil</label>
                    <input type="number" onkeyup="getkonversi()" id="inputan" class="form-control">
                    <label style="margin-top:20px" for="">Hasil konversi</label>
                    <input type="text" id="hasil" readonly class="form-control">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#barang").select2({
        placeholder: "Please Select",
    });
});
</script>
    <script>
  function getkonversi(){
    var kode = document.getElementById('barang').value;
    // console.log(kdpallet);
    $.ajax({
      url: "<?php echo site_url('konversisatuan/getkonversi'); ?>",
      method: "POST",
      data: {
      kode: kode
      },
      async: true,
      dataType: 'json',
      success: function(data) {
        var html ='';
        for (i = 0; i < data.length; i++) {
          var sat1 = Math.floor(document.getElementById('inputan').value / (data[i].max1*data[i].max2));
          var sisa  = document.getElementById('inputan').value - (sat1 * data[i].max1 * data[i].max2);
          var sat2  = Math.floor(sisa / data[i].max2);
          var sat3  = sisa - sat2 * data[i].max2;
          html+= sat1+' '+data[i].sat1+' '+sat2+' '+data[i].sat2+' '+sat3+' '+data[i].sat3;
        }
          console.log(html);
          $('#hasil').val(html);
          }
    });
}
</script>