<?php
ini_set('date.timezone', 'Asia/Jakarta');
$this->load->view("_partials/header");
$this->load->view("_partials/menu");
?>
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container-fluid" style="margin-left:40px;margin-right:40px;position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Barang Jadi Keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright table-responsive">
                            <div id="toolbar" style="margin-bottom:20px">
                                <a href="<?= base_url("keluar/input_keluar") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan
                                        Keluar</button></a>
                                <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                            </div>
                            <table id="tabel" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tglform">Tgl Form</th>
                                        <th data-field="noform">No Form</th>
                                        <th data-field="nobatch">No SPPB</th>
                                        <th data-field="kode">Kode Barang</th>
                                        <th data-field="nama">Nama Barang</th>
                                        <th data-field="satuan1">Satuan 1</th>
                                        <th data-field="satuan2">Satuan 2</th>
                                        <th data-field="satuan3">Satuan 3</th>
                                        <th data-field="tanggal">Tgl Input</th>
                                        <th data-field="oleh">Oleh</th>
                                        <th data-field="aksi">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($keluar as $k) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo date("d-m-Y", strtotime($k->tanggalform)); ?></td>
                                            <td><?php echo $k->noform ?></td>
                                            <td><?php echo $k->nobatch ?></td>
                                            <td><?php echo $k->kode ?></td>
                                            <td><?php echo $k->nama ?></td>
                                            <?php
                                            //Perhitungan 3 Satuan

                                            $sats1  = floor($k->keluar / ($k->max1 * $k->max2));
                                            $sisa   = $k->keluar - ($sats1 * $k->max1 * $k->max2);
                                            $sats2  = floor($sisa / $k->max2);
                                            $sats3  = $sisa - $sats2 * $k->max2;

                                            ?>
                                            <td><?php echo $sats1; ?> <?php echo $k->sat1; ?></td>
                                            <td><?php echo $sats2; ?> <?php echo $k->sat2; ?></td>
                                            <td><?php echo $sats3; ?> <?php echo $k->sat3; ?></td>
                                            <td><?php echo $k->tanggal; ?></td>
                                            <td><a href="<?= base_url("penginput/user/" . $k->adm) ?>"><?php echo $k->username; ?><a />
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url("keluar/edit_keluar/" . $k->no) ?>"><i class="fa fa-edit"></i> Edit</a>
                                                <a onclick="hapus(`<?=$k->no?>`,`<?=$k->noform?>`,`<?=$k->nobatch?>`,`<?=$k->kode?>`,`<?= $sats1?>`,`<?= $sats2?>`,`<?= $sats3?>`,`<?= $k->sat1?>`,`<?= $k->sat2?>`,`<?= $k->sat3?>`)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i
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
<!-- Data table area End-->

<?php 
$this->load->view("_partials/footer");
$this->load->view('keluar/modal_hapus')
?>

<script>
    function go() {
        document.getElementById('go').submit()
    }
</script>

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