<?php
ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
?>
<div class="">
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;margin-top:-250px;padding-bottom:32px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Transaksi Produk Keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="login2 pull-left pull-left-pro">Tgl Form</label>
                                                    <input name="tglform" id="tglform" type="date" value="<?= date("Y-m-d") ?>" class="form-control" placeholder="Tanggal Form" required />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="login2 pull-left pull-left-pro">No Form</label>
                                                    <input name="noform" id="noform" type="text" class="form-control" placeholder="Nomor Form" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="login2 pull-left pull-left-pro">Tanggal
                                                        SPPB</label>
                                                        <input name="tglsppb" id="tglsppb" type="date" class="form-control"
                                                        id="tglsppb" value="<?php echo date("Y-m-d"); ?>"
                                                        required />
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="login2 pull-left pull-left-pro">No SPPB</label>
                                                    <input name="nosppb" id="nosppb" type="text" class="form-control" placeholder="Nomor SPPB" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label class="login2 pull-left pull-left-pro">Catatan</label>
                                                        <input name="cat" type="text" class="form-control" id="cat" placeholder="Catatan" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                    <label class="login2 pull-left pull-left-pro">Supplier</label>
                                                        <input name="suplai" type="text" class="form-control" id="suplai" placeholder="Supplier" />
                                                        <input name="tgl" type="hidden" class="form-control" id="tgl" value="<?= date("Y-m-d H:i:s") ?>">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm" style="margin-top:20px" disabled id="minus" onclick="minus()"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" style="margin-top:20px" id="plus" onclick="plus()"><i class="fa fa-plus"></i></button>
            <input type="text" id="count" value="0" hidden>
            <div class="d-flex" style="margin-top:20px">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1 id="ct">Input Produk Keluar<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2 pull-left pull-left-pro">Produk</label>
                                                            <select id="kode0" onchange="filsatuan()" name="kode" class="form-control" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($master as $mter) { ?>
                                                                    <option value="<?= $mter->kode ?>"><?= $mter->nama ?> -|
                                                                        <?= $mter->sat1 ?> |-| <?= $mter->sat2 ?> |-|
                                                                        <?= $mter->sat3 ?> |- <?= $mter->kode ?></option>
                                                                <?php } ?>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <input name="sat1" id="sat10" type="number" class="form-control" value="0" placeholder="Satuan 1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="0sat1" class="form-control" placeholder="satuan 1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input name="sat2" id=sat20 type="number" class="form-control" value="0" placeholder="Satuan 2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="0sat2" class="form-control" placeholder="satuan 2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input name="sat3" id="sat30" type="number" class="form-control" value="0" placeholder="Satuan 3">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="0sat3" class="form-control" placeholder="satuan 3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <input name="adm" type="hidden" class="form-control" id="adm" value="<?= $this->session->userdata('user_id'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php for($i=0;$i<20;$i++){?>
                        <div id="destination<?=$i?>"></div>
                    <?php } ?>
                    <div class="row" style="margin-top:20px">
                        <div class="col-lg-9">
                            <div class="login-horizental cancel-wp pull-left">
                                <a href="<?= base_url("keluar") ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal" onclick="set()">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<p id="nama0" hidden></p>
<!-- Data table area End-->
<?php $this->load->view('keluar/modal_hapus')?>
<!-- Modal -->
<div class="modal fade" id="detailmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Rincian</h3>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="table" class="table table-bordered" width="100%">
                <thead></thead>
                <tbody></tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="submit_all()" class="btn btn-sm btn-success login-submit-cs" data-dismiss="modal">Save Change</button>
      </div>
    </div>
  </div>
</div>

<script>
function filsatuan(){
        var isi = document.getElementById("kode0").value
        $.ajax({
            dataType:"json",
            url:"<?= base_url("masuk/getsatuan")?>",
            method:"post",
            data:{
                kode:isi
            },
            success:function(data){
                document.getElementById('0sat1').value = data.sat1;
                document.getElementById('0sat2').value = data.sat2;
                document.getElementById('0sat3').value = data.sat3;
                document.getElementById('nama0').innerHTML=data.nama
            }
        })
    }
</script>
<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#kode0").select2({
            placeholder: "Pilih Produk",
        });
    });
</script>

<script>
    function plus(){
        document.getElementById('ct').innerHTML = "Input Produk Keluar 1";
        document.getElementById('minus').disabled=false;
        var count = document.getElementById('count').value;
        var i = Number(count)+1
        document.getElementById('count').value = i;
        document.getElementById('destination'+i).innerHTML = '<div class="d-flex" style="margin-top:20px"><div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block"><div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;"><h1 id="ct">Input Produk Keluar '+parseInt(i+1)+'<h1></div></div><div style="background-color:#fff"><div class="sparkline12-graph"><div class="basic-login-form-ad"><div class="row"><div class="col-lg-12"><div class="all-form-element-inner"><div class="form-group-inner"><div class="row"><div class="col-lg-12"><label class="login2 pull-left pull-left-pro">Produk</label><select id="kode'+i+'" name="kode'+i+'" class="form-control" required><option type="search"></option><?php $no = 1;foreach ($master as $mter) { ?><option value="<?= $mter->kode ?>"><?= $mter->nama ?> -|<?= $mter->sat1 ?> |-| <?= $mter->sat2 ?> |-|<?= $mter->sat3 ?> |- <?= $mter->kode ?></option><?php } ?></select></div></div></div><div class="form-group-inner"><div class="row"><div class="col-lg-2"><input name="sat1'+i+'" type="number" id="sat1'+i+'" class="form-control" value="0" placeholder="Satuan 1"></div><div class="col-lg-2"><input readonly id="'+i+'sat1" class="form-control" placeholder="satuan 1"></div><div class="col-lg-2"><input name="sat2" id="sat2'+i+'" type="number" class="form-control" value="0" placeholder="Satuan 2"></div><div class="col-lg-2"><input readonly id="'+i+'sat2" class="form-control" placeholder="satuan 2"></div><div class="col-lg-2"><input name="sat3" id="sat3'+i+'" type="number" class="form-control" value="0" placeholder="Satuan 3"></div><div class="col-lg-2"><input readonly id="'+i+'sat3" class="form-control" placeholder="satuan 3"></div></div></div></div></div></div></div></div></div><p id="nama'+i+'" hidden></p>';

        $('#kode'+i).select2({
            placeholder:"Pilih Produk"
        });

        $(document).ready(function(){
            $("#kode"+i).change(function(){
                var isi = document.getElementById("kode"+i).value
                $.ajax({
                    dataType:"json",
                    url:"<?= base_url("masuk/getsatuan")?>",
                    method:"post",
                    data:{
                        kode:isi
                    },
                    success:function(data){
                        document.getElementById(i+'sat1').value = data.sat1;
                        document.getElementById(i+'sat2').value = data.sat2;
                        document.getElementById(i+'sat3').value = data.sat3;
                        document.getElementById('nama'+i).innerHTML=data.nama
                    }
                })
            })
        });

        if(parseInt(i)>=19){
            document.getElementById('plus').disabled = true;
        }
    }

    function minus(){
        var count = document.getElementById('count').value
        var i = count
        var d = document.getElementById("destination"+i);
        document.getElementById('count').value = parseInt(i-1);
        d.innerHTML = null;
        document.getElementById('plus').disabled = false;
        if(i<=1){
            document.getElementById('minus').disabled = true;
            document.getElementById("ct").innerHTML = "Input Produk Keluar";
        }
    }

    function submit_all(){
        var index = document.getElementById('count').value
        var tglform = document.getElementById('tglform').value
        var noform = document.getElementById('noform').value
        var tglsppb = document.getElementById('tglsppb').value
        var nosppb = document.getElementById('nosppb').value
        var adm = document.getElementById("adm").value
        var tglinput=document.getElementById("tgl").value;
        var supplier=document.getElementById("suplai").value;
        var cat =document.getElementById("cat").value;
        var kode=[]
        var satuan1=[]
        var satuan2=[]
        var satuan3=[]
        var status = true;
        for(let i=0;i<=index;i++){
            kode[i]=document.getElementById("kode"+i).value;
            satuan1[i]=document.getElementById("sat1"+i).value;
            satuan2[i]=document.getElementById("sat2"+i).value;
            satuan3[i]=document.getElementById("sat3"+i).value;
            if(document.getElementById("kode"+i).value=="" ||  document.getElementById('noform').value=="" || (document.getElementById("sat1"+i).value=="" && document.getElementById("sat2"+i).value=="" && document.getElementById("sat3"+i).value=="")||(parseInt(document.getElementById("sat1"+i).value)+parseInt(document.getElementById("sat2"+i).value)+parseInt(document.getElementById("sat3"+i).value))<=0){
                status=false;
            }
        }
        if(status == false){
            Swal.fire({
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                icon:"warning",  
                title:"Mohon lengkapi data!"      
            })
        }else{

            $.ajax({
                url: "<?php echo site_url('keluar/tambah_keluar'); ?>",
                method: "POST",
                data: {
                    index:index,
                    tglform:tglform,
                    noform:noform,
                    kode:kode,
                    nosppb: nosppb,
                    sat1:satuan1,
                    sat2:satuan2,
                    sat3:satuan3,
                    tgl:tglinput,
                    cat:cat,
                    tglsppb:tglsppb,
                    adm:adm,
                    supplier:supplier
                },
                async: true,
                dataType:"json",
                success: function(html) {
                    console.log(html);
                    Swal.fire({
                        showConfirmButton:true,
                        confirmButtonText:"Ok",
                        width:"600px",
                        title:"Status Input",
                        icon:"success",
                        html:'<div class="container-fluid"><table id="tabel" class="table table-bordered table-striped" width="100%"><thead><tr><th>No</th><th>Kode</th><th>Nama</th><th>Status</th></tr></thead><tbody><tr></tr></tbody></table></div>'
                    }).then((result)=>{
                        if(result.isDismissed || result.isConfirmed){
                            window.history.go(0);
                        }
                    })
                    $("#tabel").DataTable({
                        data:html,
                        columns:[
                            {data:"no"},
                            {data:"kode"},
                            {data:"nama"},
                            {data:"status"},
                        ],
                    })                     
                    },
                    error: function (xhr, textStatus, exceptionThrown) {
                        console.log(xhr+" "+textStatus+" "+exceptionThrown);
                        Swal.fire({
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            icon:"error",  
                            title:"Input gagal!"      
                        })
                    }
            })
        }
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    function set(){
        var no = 1;
        var count = document.getElementById('count').value;
        var data=[];
        for(let i=0;i<=count;i++){
            data[i] = 
                {
                no:no++,
                tglform:document.getElementById('tglform').value,
                noform:document.getElementById('noform').value,
                kode:document.getElementById('kode'+i).value,
                nama:document.getElementById('nama'+i).innerHTML,
                tglsppb:document.getElementById('tglsppb').value,
                nosppb:document.getElementById('nosppb').value,
                sat1:document.getElementById('sat1'+i).value+" "+document.getElementById(i+'sat1').value,
                sat2:document.getElementById('sat2'+i).value+" "+document.getElementById(i+'sat2').value,
                sat3:document.getElementById('sat3'+i).value+" "+document.getElementById(i+'sat3').value,
                cat:document.getElementById('cat').value,
                supplier:document.getElementById('suplai').value
            }
        }
        console.log(data);
        $("#table").DataTable({
            data:data,
            columns:[
                {title:"No",data:"no"},
                {title:"TglForm",data:"tglform"},
                {title:"No Form",data:"noform"},
                {title:"Kode",data:"kode"},
                {title:"Nama Produk",data:"nama"},
                {title:"tgl Sppb",data:"tglsppb"},
                {title:"No. Sppb",data:"nosppb"},
                {title:"Supplier",data:"supplier"},
                {title:"Satuan 1",data:"sat1"},
                {title:"Satuan 2",data:"sat2"},
                {title:"Satuan 3",data:"sat3"},
                {title:"Catatan",data:"cat"},
            ],
            destroy:true
        })
    }
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