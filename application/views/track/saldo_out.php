<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->view("_partials/header");
    $this->load->view("_partials/menu");
?>
<!-- <div class="layarlebar"> -->
<div class="container" style="position:relative;top:-250px;z-index: 1">
    <div class="row">
        <div class="col-md-12">
            <div class="shadow mb-4">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd justify-content-between" style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Detail produk jadi belum di keluarkan<h1>
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
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="table-responsive">
                                <table hidden id="table" class="table table-bordered w-100">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("_partials/footer");?>
<!-- Data table area End-->


<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>

<script>
function go() {
    document.getElementById('go').submit();
}
</script>

<script>
    $.ajax({
        dataType:"json",
        url:'<?= base_url("saldo_antara/getdetailsalout")?>',
        success:function(isi){
            document.getElementById("loading").hidden=true
            document.getElementById("table").hidden=false
            $("table").DataTable({
                destroy:true,
                data:isi,
                columns:[
                    {title:"No",data:"no"},
                    {title:"No. Form",data:"noform"},
                    {title:"Kode Produk",data:"kode"},
                    {title:"Nama Produk",data:"nama"},
                    {title:"Satuan 1",data:"sat1"},
                    {title:"Satuan 2",data:"sat2"},
                    {title:"Satuan 3",data:"sat3"},
                    {title:"Keterangan",data:"ket"},
                ],
                dom: 'lBfrtip',
                buttons: [
                    'copy','excel','pdf','print'
                ],
            })
        },
        error: function (xhr, textStatus, exceptionThrown) {
            document.getElementById("loading").hidden=true
            document.getElementById("table").hidden=false
            $("table").DataTable({
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