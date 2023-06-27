<?php
ini_set('date.timezone', 'Asia/Jakarta');
$this->load->view('_partials/header');
$this->load->view('_partials/menu');
?>

<div class="admin-dashone-data-table-area mg-b-40">
    <div class="container" style="position:relative;top:-250px;z-index: 1">
        <div class="d-flex">
            <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                    <h1>Saldo Keseluruhan Produk Gudang<h1>
                </div>
            </div>
            <div style="background-color:#fff">
                <div class="sparkline8-graph shadow">
                    <div id="loading" class="row">
                        <div class="spinner-grow mr-3" style="color:dimgray"></div>
                        <div class="spinner-grow mr-3" style="color:dimgray"></div>
                        <div class="spinner-grow mr-3" style="color:dimgray"></div>
                        <div class="spinner-grow mr-3" style="color:dimgray"></div>
                        <div class="spinner-grow mr-3" style="color:dimgray"></div>
                        <div class="spinner-grow mr-3" style="color:dimgray"></div>
                    </div>
                    <!-- <div class="tabel-responsive" style="margin-left:10px;margin-right:10px;padding-bottom:10px"> -->
                        <table class="table table-bordered table-responsive" hidden width="100%" id="tabel">
                           <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Form</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>No. Batch</th>
                                <th>Satuan1</th>
                                <th>Satuan2</th>
                                <th>Satuan3</th>
                                <th>Keterangan</th>
                            </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data table area End-->
<?php $this->load->view('_partials/footer');?>
<script>
    $.ajax({
        dataType:"json",
        url:"<?= base_url("manager/tampil_dsq")?>",
        async:true,
        success: function(riwayat){
            document.getElementById("loading").hidden=true;
            document.getElementById("tabel").hidden=false;
            // console.log(riwayat)
            $(document).ready( function() {
            $("#tabel").DataTable({
                data:riwayat,
                columns:[
                    {data:"no"},
                    {data:"noform"},
                    {data:"kode"},
                    {data:"nama"},
                    {data:"nobatch"},
                    {data:"sats1"},
                    {data:"sats2"},
                    {data:"sats3"},
                    {data:"ket"},
                ],
                dom: 'lBfrtip',
                buttons: [
                    'copy','excel','pdf','print'
                ],
            });
            })
        }
    })
</script>