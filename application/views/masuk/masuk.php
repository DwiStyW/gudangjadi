<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->view("_partials/header");
    $this->load->view("_partials/menu");
    ?>
    <div class="container" style="position:relative;top:-250px;z-index: 1">
    <div class="row">
        <div class="col-md-12">
            <div class="shadow mb-4">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Barang Jadi Masuk<h1>
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
                            <a href="<?= base_url("masuk/input_masuk") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan Masuk</button></a>
                            <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive" hidden width="100%" id="masuk" cellspacing="0"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$this->load->view("_partials/footer");
$this->load->view("masuk/modal_hapus");
?>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>

<script>
    function go() {
        document.getElementById('go').submit();
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

<script>
    $.ajax({
        dataType:"json",
        url:"<?= base_url("masuk/getmasuk")?>",
        async:true,
        success:function(isi){
            document.getElementById("loading").hidden=true
            document.getElementById("masuk").hidden=false
            document.getElementById("toolbarr").hidden=false
            // console.log(isi);
            $("#masuk").DataTable({
                data:isi,
                columns:[
                    {title:"No",data:"id"},
                    {title:"Tgl Form",data:"tglform"},
                    {title:"No. Form",data:"noform"},
                    {title:"Kode Produk",data:"kode"},
                    {title:"Nama Produk",data:"nama"},
                    {title:"No. Btach",data:"nobatch"},
                    {title:"Satuan1",data:"sats1"},
                    {title:"Satuan2",data:"sats2"},
                    {title:"Satuan3",data:"sats3"},
                    {title:"Tgl Input",data:"tanggal"},
                    {title:"Penginput",data:"adm"},
                    {title:"Suplier",data:"suplai"},
                    {title:"Catatan",data:"cat"},
                    {title:"Aksi",data:"aksi"},
                ],
                dom: 'lBfrtip',
                buttons: [
                    'copy','excel','pdf','print'
                ],
            })
        }
    })

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