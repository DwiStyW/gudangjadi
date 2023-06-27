<?php 
    $this->load->view('_partials/header');
    $this->load->view('_partials/menu');
?>
<div class="layarlebar">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container " style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Saldo Barang Jadi<h1>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div class="datatable-dashv1-list custom-datatable-overright"
                            style="margin-left:10px;margin-right:10px;padding-bottom:10px">

                            <table id="tabel" class="table table-responsive table-bordered">
                                <thead>

                                    <th data-field="no">No</th>
                                    <th data-field="grup">Golongan</th>
                                    <th data-field="subgrup">Jenis</th>
                                    <th data-field="kode">Kode Barang</th>
                                    <th data-field="nama">Nama Barang</th>
                                    <th data-field="satuan1">Satuan 1</th>
                                    <th data-field="satuan2">Satuan 2</th>
                                    <th data-field="satuan3">Satuan 3</th>
                                    <th data-field="tglform">Tgl Form Terakhir</th>
                                    <th data-field="tanggal">Tanggal Update</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $tampil = mysqli_query($conn, "SELECT * from saldo, master WHERE master.kode=saldo.kode");

                                    // $no = 1;
                                    // while ($data = mysqli_fetch_array($tampil)) {
                                    $no = 1;
                                    foreach ($saldo as $s) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?= $s->namagol ?></td>
                                        <td><?= $s->namajenis ?></td>
                                        <td><?php echo $s->kode ?></td>
                                        <td><?php echo $s->nama ?></td>
                                        <?php
                                            //Perhitungan 3 Satuan
                                            if($this->session->userdata("role") != "track"){
                                                $sats1  = floor($s->saldo / ($s->max1 * $s->max2));
                                                $sisa   = $s->saldo - ($sats1 * $s->max1 * $s->max2);
                                                $sats2  = floor($sisa / $s->max2);
                                                $sats3  = $sisa - $sats2 * $s->max2;
                                            }else{
                                                $sats1  = floor($s->saldo_track / ($s->max1 * $s->max2));
                                                $sisa   = $s->saldo_track - ($sats1 * $s->max1 * $s->max2);
                                                $sats2  = floor($sisa / $s->max2);
                                                $sats3  = $sisa - $sats2 * $s->max2;
                                            }
                                            ?>
                                        <td><?php echo $sats1; ?> <?php echo $s->sat1; ?></td>
                                        <td><?php echo $sats2; ?> <?php echo $s->sat2; ?></td>
                                        <td><?php echo $sats3; ?> <?php echo $s->sat3; ?></td>
                                        <td><?= $s->tglform ?></td>
                                        <td><?= $s->tgl_update ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('_partials/footer');?>
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
<script>
    function go() {
        document.getElementById('go').submit();
    }
</script>