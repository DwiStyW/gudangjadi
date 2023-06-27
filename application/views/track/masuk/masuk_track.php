<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->view("_partials/header");
    $this->load->view("_partials/menu");
?>
<!-- <div class="layarlebar"> -->
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container-fluid" style="margin-left:40px;margin-right:40px;position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                    <h1>Barang Jadi Masuk<h1>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright table-responsive">
                            <div id="toolbarr" style="margin-bottom:20px">
                                <a href="<?= base_url("track/masuk_track/input_masuk_track") ?>"><button
                                        class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan
                                        Masuk</button></a>
                                <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="tabel" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tglform">Tgl Form</th>
                                        <th data-field="noform">No Form</th>
                                        <th data-field="kode">Kode Barang</th>
                                        <th data-field="nama">Nama Barang</th>
                                        <th data-field="batch">No Batch</th>
                                        <th data-field="nopallet">No Pallet</th>
                                        <th data-field="statpallet">Status</th>
                                        <th data-field="satuan1">Satuan 1</th>
                                        <th data-field="satuan2">Satuan 2</th>
                                        <th data-field="satuan3">Satuan 3</th>
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="oleh">Oleh</th>
                                        <th data-field="cat">Catatan</th>
                                        <th data-field="expdate">Expired Date</th>
                                        <th data-field="aksi">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=0;
                                    foreach ($masuk as $m) {
                                        $batch = $m->nobatch;
                                        $tahun = strrev(substr(substr($batch, -6), 0, 2));
                                        $bulan = substr(substr($batch, -6), 2, 2);
                                        $gabung = $bulan . '/01/' . (2000 + $tahun);
                                        $tglprod = date("Y-m-d", strtotime($gabung));
                                        $bulan1 =  $m->expdate;
                                        $tglexp = date("Y-m-d", strtotime('+' . $bulan1 . ' month', strtotime($tglprod)));

                                        $awal  = date_create($tglexp);
                                        $akhir = date_create(); // waktu sekarang
                                        $diff  = date_diff($akhir, $awal); ?>
                                    <tr>
                                    <td><?php echo $no+=1; ?></td>
                                        <td><?php echo $m->tanggalform; ?></td>
                                        <td><?php echo $m->noform; ?></td>
                                        <td><?php echo $m->kode; ?></td>
                                        <td><?php echo $m->nama; ?></td>
                                        <td><?php echo $m->nobatch; ?></td>
                                        <td><?php echo $m->nopallet?></td>
                                        <td><?php echo $m->statpallet?></td>
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
                                        <td><?php echo $m->cat ?></td>
                                        <td><?php echo $diff->y . ' tahun ' . $diff->m . ' bulan ';?>
                                            </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="<?= base_url("track/masuk_track/edit_masuk_track/" . $m->no) ?>">
                                                <i class="fa fa-edit"></i> Edit</button>
                                            <a class="btn btn-sm btn-danger"
                                                href="<?= base_url("track/masuk_track/hapus/" . $m->no) ?>"
                                                onclick="javascript: return confirm('Anda yakin hapus ?')"><i
                                                    class="fa fa-trash"></i> Hapus</a>
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
<!-- </div> -->
<!-- Data table area End-->
<?php $this->load->view("_partials/footer"); ?>
<script>
    $(document).ready(function(){
        $("#tabel").DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy','excel','pdf','print'
            ],
        })
    })
</script>

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