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
                        <h1>Nomor Transaksi<h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">

                                        <!-- <form enctype="multipart/form-data" action="<?= base_url("masuk/tambah_masuk") ?>" method="post" class="form"> -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label class="login2 pull-left pull-left-pro">Tanggal Form</label>
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="<?php echo date("Y-m-d"); ?>" required />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="login2 pull-left pull-left-pro">No Form</label>
                                                        <input name="noform" type="text" class="form-control" id="noform" onkeyup="search()" placeholder="Nomor Form" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label class="login2 pull-left pull-left-pro" for="">Produk</label>
                                                        <div class="form-select-list">
                                                            <select id="kode" name="kode" class="form-control" type="select" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($master as $mter) { ?>
                                                                <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->nama ?> -
                                                                    <?= $mter->kode ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="login2 pull-left pull-left-pro" for="">Catatan</label>
                                                        <input name="cat" type="text" class="form-control" id="cat"
                                                            placeholder="Catatan" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm" id="minus" onclick="minus()" disabled style="margin-top:10px"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" id="plus" onclick="tambah()" style="margin-top:10px"><i class="fa fa-plus"></i></button>
                    <div id="copy">
                    <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block; margin-top:10px">
                        <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                            <h1 id="ct">Input Produk Masuk<h1>
                        </div>
                    </div>
                    <div style="background-color:#fff">
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <!-- kode barang -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2 pull-left pull-left-pro" for="">No.batch</label>
                                                        <input name="nobatch0" id="nobatch0" type="text" class="form-control" placeholder="Nomor Batch" required />
                                                        <span id="warning" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                    <input name="sat10" id="sat10" value="0" type="number" class="form-control"
                                                            placeholder="Satuan 1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="0sat1" class="form-control" placeholder="satuan1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input name="sat20" id="sat20" value="0" type="number" class="form-control"
                                                        placeholder="Satuan 2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="0sat2" class="form-control" placeholder="satuan2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                    <input name="sat30" id="sat30" value="0" type="number" class="form-control"
                                                            placeholder="Satuan 3">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="0sat3" class="form-control" placeholder="satuan3">
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="tgl0" type="hidden" class="form-control" id="tgl0"
                                                value="<?php echo date("Y-m-d h:i:s"); ?>"
                                                readonly="readonly"/>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <input name="adm" id="adm" type="hidden" class="form-control" id="adm"
                                                            value="<?= $this->session->userdata('user_id'); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="nama" hidden></p>
                    </div>
                    <?php for($i=0;$i<20;$i++){?>
                        <div id="destination<?=$i?>"></div>
                        <?php } ?>
                        <div class="container-fluid" style="margin-top:20px">
                            <div class="row justify-content-between ml-2 mr-2">
                                <a href="<?= base_url("masuk") ?>" class="btn btn-secondary">Kembali</a>
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailmodal" onclick="set()">Submit</button>
                            </div>
                        </div>
                        <input type="text" hidden id="count" value="0">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('masuk/modal_hapus')?>
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
        <button onclick="submitall()" class="btn btn-sm btn-success login-submit-cs">Save Change</button>
      </div>
    </div>
  </div>
</div>
<!-- Data table area End-->


<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<script>
    var count = document.getElementById("count").value;
    var i = Number(count)+1;
    function tambah(){
        var count = document.getElementById("count").value;
        var i = Number(count)+1;
        document.getElementById("count").value = Number(count)+1;
        
        var tes = '<div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block; margin-top:10px"> <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;"> <h1>Input Produk Masuk '+Number(i+1)+'<h1> </div> </div> <div style="background-color:#fff"> <div class="sparkline12-graph"> <div class="basic-login-form-ad">  <div class="row">  <div class="col-lg-12">  <div class="all-form-element-inner">  <!-- kode barang -->  <div class="form-group-inner">  <div class="row"> <div class="col-lg-12"> <label class="login2 pull-left pull-left-pro" for="">No. batch</label> <input name="nobatch'+i+'" id="nobatch'+i+'" type="text" class="form-control" placeholder="Nomor Batch" required />  <span id="warning" class="text-danger"></span>  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-2">  <input name="sat1'+i+'" id="sat1'+i+'" value="0" type="number" class="form-control"  placeholder="Satuan 1">  </div>  <div class="col-lg-2">  <input readonly id="'+i+'sat1" class="form-control" placeholder="satuan1">  </div>  <div class="col-lg-2">  <input name="sat2'+i+'" id="sat2'+i+'" value="0" type="number" class="form-control"  placeholder="Satuan 2">  </div>  <div class="col-lg-2">  <input readonly id="'+i+'sat2" class="form-control" placeholder="satuan2">  </div>  <div class="col-lg-2">  <input name="sat3'+i+'" id="sat3'+i+'" value="0" type="number" class="form-control"  placeholder="Satuan 3">  </div>  <div class="col-lg-2">  <input readonly id="'+i+'sat3" class="form-control" placeholder="satuan3">  </div>  </div>  </div>  <input name="tgl'+i+'" type="hidden" class="form-control" id="tgl'+i+'"  value="<?php echo date("Y-m-d h:i:s"); ?>"  readonly="readonly"/><!-- </form> -->  </div>  </div>  </div> </div> </div> </div>'



        document.getElementById("ct").innerHTML = "Input Produk Masuk 1";
        document.getElementById("destination"+i).innerHTML = tes;
        document.getElementById('minus').disabled = false;
        if(parseInt(i)>=19){
            document.getElementById('plus').disabled = true;
        }
        $("#kode"+i).select2({
            placeholder:"Pilih produk"
        });
        document.getElementById(i+"sat1").value = document.getElementById("0sat1").value
        document.getElementById(i+'sat2').value = document.getElementById("0sat2").value
        document.getElementById(i+'sat3').value = document.getElementById("0sat3").value
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
            document.getElementById("ct").innerHTML = "Input Produk Masuk";
        }
    }

    function submitall(){
        var index = document.getElementById('count').value
        var tglform = document.getElementById('tglform').value
        var noform = document.getElementById('noform').value
        var adm = document.getElementById("adm").value
        var kode = document.getElementById("kode").value
        var cat = document.getElementById("cat").value
        var nobatch=[]
        var satuan1=[]
        var satuan2=[]
        var satuan3=[]
        var tglinput=[]
        var status = true;
        for(let i=0;i<=index;i++){
            nobatch[i]=document.getElementById("nobatch"+i).value;
            satuan1[i]=document.getElementById("sat1"+i).value;
            satuan2[i]=document.getElementById("sat2"+i).value;
            satuan3[i]=document.getElementById("sat3"+i).value;
            tglinput[i]=document.getElementById("tgl"+i).value;
            if(document.getElementById("kode").value=="" || document.getElementById("nobatch"+i).value=="" || document.getElementById('noform').value=="" || (document.getElementById("sat1"+i).value=="" && document.getElementById("sat2"+i).value=="" && document.getElementById("sat3"+i).value=="")||(parseInt(document.getElementById("sat1"+i).value)+parseInt(document.getElementById("sat2"+i).value)+parseInt(document.getElementById("sat3"+i).value))<=0){
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
            document.getElementById('qty0').value="";
        }else{

            $.ajax({
                url: "<?php echo site_url('masuk/tambah_masuk'); ?>",
                method: "POST",
                data: {
                    index:index,
                    tglform:tglform,
                    noform:noform,
                    kode:kode,
                    nobatch: nobatch,
                    sat1:satuan1,
                    sat2:satuan2,
                    sat3:satuan3,
                    tgl:tglinput,
                    cat:cat,
                    adm:adm
                },
                async: true,
                dataType:"json",
                success: function(html) {
                    console.log(html);
                    if(html.status == "success"){
                    Swal.fire({
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        icon:"success",  
                        title:"Input berhasil!"      
                    }).then((result)=>{
                        if(result.isDismissed){
                            window.history.go(0);
                        }
                    })
                    }else{
                        Swal.fire({
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        icon:"error",  
                        title:"Input gagal!"      
                    }).then((result)=>{
                        if(result.isDismissed){
                            window.history.go(0);
                        }
                    })
                    }                        
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
                kode:document.getElementById('kode').value,
                nama:document.getElementById('nama').innerHTML,
                nobatch:document.getElementById('nobatch'+i).value,
                sat1:document.getElementById('sat1'+i).value+" "+document.getElementById(i+'sat1').value,
                sat2:document.getElementById('sat2'+i).value+" "+document.getElementById(i+'sat2').value,
                sat3:document.getElementById('sat3'+i).value+" "+document.getElementById(i+'sat3').value,
                cat:document.getElementById('cat').value
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
                {title:"No Batch",data:"nobatch"},
                {title:"Satuan 1",data:"sat1"},
                {title:"Satuan 2",data:"sat2"},
                {title:"Satuan 3",data:"sat3"},
                {title:"Catatan",data:"cat"},
            ],
            destroy:true
        })
    }
</script>
<script>
$(document).ready(function(){
    $("#kode").change(function(){
        var isi = document.getElementById("kode").value
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
                for(let i=1;i<=document.getElementById("count").value;i++){
                    document.getElementById(i+'sat1').value = data.sat1;
                    document.getElementById(i+'sat2').value = data.sat2;
                    document.getElementById(i+'sat3').value = data.sat3;
                }
                document.getElementById('nama').innerHTML=data.nama
                // console.log(data.sat3)
            }
        })
    })
    $("#kode").change(function(){
        var isi = document.getElementById("kode").value
        $.ajax({
            dataType:"json",
            url:"<?= base_url("masuk/getsatuan")?>",
            method:"post",
            data:{
                kode:isi
            },
            success:function(data){
                document.getElementById('sat1').value = data.sat1;
                document.getElementById('sat2').value = data.sat2;
                document.getElementById('sat3').value = data.sat3;
                document.getElementById('nama').innerHTML=data.nama
                // console.log(data.sat3)
            }
        })
    })
});
</script>

<script>
$(document).ready(function() {
    $("#kode").select2({
        placeholder: "Pilih produk",
    });
});
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
    function validation(){
        var nobatch = document.getElementById("nobatch").value
        var tahunKebalik = nobatch.slice(parseInt(nobatch.length-6),parseInt(nobatch.length-4));
        var tahun = parseInt(tahunKebalik.split('').reverse().join(''));
        var bulan = nobatch.slice(parseInt(nobatch.length-4),parseInt(nobatch.length-2));

        if(parseInt(bulan)>12){
            document.getElementById("warning").innerHTML='Nomor batch tidak valid!';
        }
    }
</script>