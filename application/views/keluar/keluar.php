<?php
ini_set('date.timezone', 'Asia/Jakarta');
$this->load->view("_partials/header");
$this->load->view("_partials/menu");
?>
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Barang Jadi Keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline8-graph shadow">
                        <div id="loading" class="text-center">
                            <div class="spinner-grow mr-3" style="color:dimgray"></div>
                            <div class="spinner-grow mr-3" style="color:dimgray"></div>
                            <div class="spinner-grow mr-3" style="color:dimgray"></div>
                            <div class="spinner-grow mr-3" style="color:dimgray"></div>
                            <div class="spinner-grow mr-3" style="color:dimgray"></div>
                            <div class="spinner-grow mr-3" style="color:dimgray"></div>
                        </div>
                        <div id="toolbarr" hidden>
                            <?php if($this->session->userdata('role')!="manager"){?>
                            <a href="<?= base_url("keluar/input_keluar") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan Keluar</button></a>
                            <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive" hidden width="100%" id="keluar" cellspacing="0"></table>
                        </div>
                        <div id="role" hidden><?=$this->session->userdata('role')?></div>
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

<script>
    $.ajax({
        dataType:"json",
        url:'<?= base_url("keluar/getkeluar")?>',
        async:true,
        success:function(isi){
            document.getElementById("loading").hidden=true;
            document.getElementById("keluar").hidden=false;
            document.getElementById("toolbarr").hidden=false
            if(document.getElementById('role').innerHTML=="manager"){
                $("#keluar").DataTable({
                    data:isi,
                    columns:[
                        {title:"No",data:"no"},
                        {title:"Tgl Form",data:"tglform"},
                        {title:"No. Form",data:"noform"},
                        {title:"No. SPPB",data:"nosppb"},
                        {title:"Kode Produk",data:"kode"},
                        {title:"Nama Produk",data:"nama"},
                        {title:"Satuan1",data:"sat1"},
                        {title:"Satuan2",data:"sat2"},
                        {title:"Satuan3",data:"sat3"},
                        {title:"Tgl Input",data:"tanggal"},
                        {title:"Penginput",data:"penginput"},
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        'copy','excel','pdf','print'
                    ],
                })
            }else{
                $("#keluar").DataTable({
                    data:isi,
                    columns:[
                        {title:"No",data:"no"},
                        {title:"Tgl Form",data:"tglform"},
                        {title:"No. Form",data:"noform"},
                        {title:"No. SPPB",data:"nosppb"},
                        {title:"Kode Produk",data:"kode"},
                        {title:"Nama Produk",data:"nama"},
                        {title:"Satuan1",data:"sat1"},
                        {title:"Satuan2",data:"sat2"},
                        {title:"Satuan3",data:"sat3"},
                        {title:"Tgl Input",data:"tanggal"},
                        {title:"Penginput",data:"penginput"},
                        {title:"Aksi",data:"aksi"},
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        'copy','excel','pdf','print'
                    ],
                })
            }
        },error: function (xhr, textStatus, exceptionThrown) {
            document.getElementById("loading").hidden=true
            document.getElementById("keluar").hidden=false
            document.getElementById("toolbarr").hidden=false
            $("#keluar").DataTable({
                data:[
                    {data:"Data Tidak ditemukan!"}
                ],
                columns:[
                    {title:"Tabel",data:"data"},
                ],
            })
        }
    })
</script>