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
                            <?php if($this->session->userdata('role')!="manager"){?>
                            <a href="<?= base_url("track/masuk_track/input_masuk_track") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Bahan Masuk</button></a>
                            <a href="<?= base_url("home")?>"><button class="btn btn-white" type="button">Kembali</button></a>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table hidden id="masuk" class="table table-bordered table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div id="role" hidden><?=$this->session->userdata('role')?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data table area End-->
<?php $this->load->view("_partials/footer") ?>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>

<script>
    function go() {
        document.getElementById('go').submit();
    }
    function konfirmasi(no){
        Swal.fire({
            title:"<h2><b>Konfirmasi.</b></h2>",
            icon:"warning",
            html:"<h4>anda yakin ingin hapus?</h4>",
            showConfirmButton:true,
            showCancelButton:true,
            confirmButtonColor:"red",
            confirmButtonText:"<p style='font-size:15px'>Hapus</p>",
            cancelButtonText:"<p style='font-size:15px'>Batal</p>",
            width:"40rem",
        }).then((result) => {
            if(result.isConfirmed){
                window.location="<?=base_url('track/masuk_track/hapus/')?>"+no;
            }else{
                result.dismiss
            }
        })
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
<script>
    $.ajax({
        dataType:"json",
        url:'<?= base_url("track/masuk_track/get_masuk");?>',
        success:function(isi){
            document.getElementById("loading").hidden=true;
            document.getElementById("masuk").hidden=false;
            document.getElementById("toolbarr").hidden=false;
            if(document.getElementById('role').innerHTML=="manager"){
                $("table").DataTable({
                    destroy:true,
                    data:isi,
                    columns:[
                        {title:"No",data:"no"},
                        {title:"Tgl Form",data:"tglform"},
                        {title:"Kode Barang",data:"kode"},
                        {title:"Nama Barang",data:"nama"},
                        {title:"No. Batch",data:"nobatch"},
                        {title:"No. Pallet",data:"nopallet"},
                        {title:"Status",data:"statpallet"},
                        {title:"sat1",data:"sat1"},
                        {title:"sat2",data:"sat2"},
                        {title:"sat3",data:"sat3"},
                        {title:"Tgl Input",data:"tanggal"},
                        {title:"Oleh",data:"adm"},
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        'copy','excel','pdf','print'
                    ],
                });
            }else{
                $("table").DataTable({
                    destroy:true,
                    data:isi,
                    columns:[
                        {title:"No",data:"no"},
                        {title:"Tgl Form",data:"tglform"},
                        // {title:"No. Form",data:"noform"},
                        {title:"Kode Barang",data:"kode"},
                        {title:"Nama Barang",data:"nama"},
                        {title:"No. Batch",data:"nobatch"},
                        {title:"No. Pallet",data:"nopallet"},
                        {title:"Status",data:"statpallet"},
                        {title:"sat1",data:"sat1"},
                        {title:"sat2",data:"sat2"},
                        {title:"sat3",data:"sat3"},
                        {title:"Tgl Input",data:"tanggal"},
                        {title:"Oleh",data:"adm"},
                        {title:"Catatan",data:"cat"},
                        // {title:"Expired Date",data:"exp"},
                        {title:"Aksi",data:"aksi"},
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        'copy','excel','pdf','print'
                    ],
                });
            }
            },
        error: function (xhr, textStatus, exceptionThrown) {
            document.getElementById("loading").hidden=true
            document.getElementById("masuk").hidden=false
            document.getElementById("toolbarr").hidden=false
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