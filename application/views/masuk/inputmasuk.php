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
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="tglform" type="date" class="form-control" id="tglform" value="<?php echo date("Y-m-d"); ?>" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Form</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="noform" type="text" class="form-control" id="noform" onkeyup="search()" placeholder="Nomor Form" required />
                                                        <label class="login2 pull-left pull-right-pro" id="pesan"></label>
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
                            <h1>Input Produk Masuk<h1>
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
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Kode
                                                            Barang</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select id="kode0" name="kode0" class="form-control" type="select" onchange="filSatuan()" required>
                                                                <option type="search"></option>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($master as $mter) { ?>
                                                                <option value="<?= $mter->kode ?>">
                                                                    <?= $mter->nama ?> -|
                                                                    <?= $mter->sat1 ?> |-| <?= $mter->sat2 ?> |-|
                                                                    <?= $mter->sat3 ?> |-
                                                                    <?= $mter->kode ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">No Batch</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="nobatch0" id="nobatch0" type="text" class="form-control" placeholder="Nomor Batch" required />
                                                        <span id="warning" class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 1</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="sat10" id="sat10" type="number" class="form-control"
                                                            placeholder="Satuan 1">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id="sat1" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 2</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="sat20" id="sat20" type="number" class="form-control"
                                                            placeholder="Satuan 2">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id=sat2 class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Satuan 3</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input name="sat30" id="sat30" type="number" class="form-control"
                                                            placeholder="Satuan 3">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input readonly id=sat3 class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal
                                                            Input</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="tgl0" type="text" class="form-control" id="tgl0"
                                                            value="<?php echo date("Y-m-d h:i:s"); ?>"
                                                            readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Catatan</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input name="cat0" type="text" class="form-control" id="cat0"
                                                            placeholder="Catatan" />
                                                    </div>
                                                </div>
                                            </div>
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
                    </div>
                    <?php for($i=0;$i<20;$i++){?>
                        <div id="destination<?=$i?>"></div>
                        <?php } ?>
                        <div class="container-fluid" style="margin-top:20px">
                            <div class="row justify-content-between ml-2 mr-2">
                                <a href="<?= base_url("masuk") ?>" class="btn btn-secondary">Kembali</a>
                                <button onclick="submitall()" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        <input type="text" hidden id="count" value="0">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('masuk/modal_hapus')?>
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
        document.getElementById("destination"+i).innerHTML = '<div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block; margin-top:10px"> <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;"> <h1>Input Produk Masuk<h1> </div> </div> <div style="background-color:#fff"> <div class="sparkline12-graph"> <div class="basic-login-form-ad"> <div class="row">  <div class="col-lg-12">  <div class="all-form-element-inner">  <!-- kode barang -->  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">Kode  Barang</label>  </div>  <div class="col-lg-9">  <div class="form-select-list">  <select id="kode'+i+'" name="kode" class="form-control" type="select" required>  <option type="search"></option>  <?php  $no = 1;  foreach ($master as $mter) { ?>  <option value="<?= $mter->kode ?>">   <?= $mter->nama ?> -|   <?= $mter->sat1 ?> |-| <?= $mter->sat2 ?> |-|   <?= $mter->sat3 ?> |-   <?= $mter->kode ?>  </option>  <?php } ?>  </select>  </div>  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">No Batch</label>  </div>  <div class="col-lg-9">  <input name="nobatch" id="nobatch'+i+'" type="text" class="form-control" placeholder="Nomor Batch" required />  <span id="warning" class="text-danger"></span>  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">Satuan 1</label>  </div>  <div class="col-lg-7">  <input name="sat1" id="sat1'+i+'" type="number" class="form-control"  placeholder="Satuan 1">  </div>  <div class="col-lg-2">  <input readonly id="'+i+'sat1" class="form-control" value="">  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">Satuan 2</label>  </div>  <div class="col-lg-7">  <input name="sat2" id="sat2'+i+'" type="number" class="form-control"  placeholder="Satuan 2">  </div>  <div class="col-lg-2">  <input readonly id="'+i+'sat2" class="form-control" value="">  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">Satuan 3</label>  </div>  <div class="col-lg-7">  <input name="sat3" id="sat3'+i+'" type="number" class="form-control"  placeholder="Satuan 3">  </div>  <div class="col-lg-2">  <input readonly id="'+i+'sat3" class="form-control" value="">  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">Tanggal  Input</label>  </div>  <div class="col-lg-9">  <input name="tgl" type="text" class="form-control" id="tgl'+i+'"  value="<?php echo date("Y-m-d h:i:s"); ?>"  readonly="readonly" />  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-3">  <label class="login2 pull-right pull-right-pro">Catatan</label>  </div>  <div class="col-lg-9">  <input name="cat" type="text" class="form-control" id="cat'+i+'"  placeholder="Catatan" />  </div>  </div>  </div>  <div class="form-group-inner">  <div class="row">  <div class="col-lg-9"></div>  </div>  </div>  <!-- </form> -->  </div>  </div> </div> </div> </div> </div>';
        document.getElementById('minus').disabled = false;
        if(parseInt(i)>=19){
            document.getElementById('plus').disabled = true;
        }
        $("#kode"+i).select2({
            placeholder:"please select"
        });
        //untuk field satuan
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
                        document.getElementById(i+'sat1').placeholder = data.sat1;
                        document.getElementById(i+'sat2').placeholder = data.sat2;
                        document.getElementById(i+'sat3').placeholder = data.sat3;
                        // console.log(data.sat3)
                    }
                })
            })
        });
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
        }
    }

    function submitall(){
        var index = document.getElementById('count').value
        var tglform = document.getElementById('tglform').value
        var noform = document.getElementById('noform').value
        var adm = document.getElementById("adm").value
        var kode=[]
        var nobatch=[]
        var satuan1=[]
        var satuan2=[]
        var satuan3=[]
        var tglinput=[]
        var cat=[]
        var status = true;
        for(let i=0;i<=index;i++){
            kode[i]=document.getElementById("kode"+i).value;
            nobatch[i]=document.getElementById("nobatch"+i).value;
            satuan1[i]=document.getElementById("sat1"+i).value;
            satuan2[i]=document.getElementById("sat2"+i).value;
            satuan3[i]=document.getElementById("sat3"+i).value;
            tglinput[i]=document.getElementById("tgl"+i).value;
            cat[i]=document.getElementById("cat"+i).value;
            if(document.getElementById("kode"+i).value=="" || document.getElementById("nobatch"+i).value=="" || document.getElementById("sat1"+i).value=="" || document.getElementById('noform').value==""|| document.getElementById('sat2'+i).value==""|| document.getElementById('noform').value==""|| document.getElementById('sat3'+i).value==""){
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
                dataType: 'json',
                success: function(html) {
                    console.log(html);
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
</script>
<script>
function filSatuan() {
    var kode = document.getElementById('kode0').options;
    // var val = document.getElementById('kode').value;
    var index = document.getElementById('kode0').selectedIndex;
    var text = kode[index].text;
    // document.getElementById('kod').placeholder = val;

    var potong1 = text.slice(text.search("-") + 3, text.length);
    var sat1 = potong1.slice(0, potong1.search("-") - 1);
    document.getElementById('sat1').placeholder = sat1;

    var potong2 = potong1.slice(potong1.search("-") + 3, text.length);
    var sat2 = potong2.slice(0, potong2.search("-") - 1);
    document.getElementById('sat2').placeholder = sat2;

    var potong3 = potong2.slice(potong2.search("-") + 3, text.length);
    var sat3 = potong3.slice(0, potong3.search("-") - 1);
    document.getElementById('sat3').placeholder = sat3;
}
</script>

<script>
$(document).ready(function() {
    $("#kode0").select2({
        placeholder: "Please Select",
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