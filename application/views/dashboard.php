<?php
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
?>
<div class="admin-dashone-data-table-area mg-b-40">
  <div class="container" style="position:relative;top:-250px;z-index: 1">
    <div class="w-100" style="margin-bottom:20px">
      <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
        <div class="main-sparkline8-hd" style="padding-top:10px;padding-bottom:10px;padding-left:10px;">
          <h1>HBJ Produksi<h1>
        </div>
      </div>
      <div style="background-color:#fff">
        <div class="sparkline8-graph">
          <div class="text-center">
            <a href="<?= base_url("masuk")?>"><button class="btn bg-gradient-light" style="height:100px;color:black">Riwayat Masuk</button></a>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
            <a href="<?= base_url("saldo_antara/in")?>"><button class="btn bg-gradient-light" style="height:100px;color:black">Pending Masuk</button></a>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
            <a href="<?= base_url("track/masuk_track")?>"><button class="btn bg-gradient-light" style="height:100px;color:black">Tracking Masuk</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-100" style="margin-bottom:20px">
      <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
        <div class="main-sparkline8-hd" style="padding-top:10px;padding-bottom:10px;padding-left:10px;">
          <h1>SPPB Produksi<h1>
        </div>
      </div>
      <div style="background-color:#fff">
        <div class="sparkline8-graph">
          <div class="text-center">
          <a href="<?= base_url("keluar")?>"><button class="btn bg-gradient-light" style="height:100px;color:black">Riwayat Keluar</button></a>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
            <a href="<?= base_url("saldo_antara/out")?>"><button class="btn bg-gradient-light" style="height:100px;color:black">Pending Keluar</button></a>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
            <a href="<?= base_url("track/keluar_track")?>"><button class="btn bg-gradient-light" style="height:100px;color:black">Tracking Keluar</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-lg-6">
        <div style="background-color:#fff">
          <div class="sparkline8-graph">
            <div class="d-flex justify-content-center">
              <h3><b>Barang Belum di Pallet</b></h3>
              <hr>
                <h3>Jumlah : <?= $belumpallet->num_rows(); ?> <a href="<?= base_url("saldo_antara/in")?>" class="btn btn-md btn-primary">Detail</a></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="background-color:#fff;">
          <div class="sparkline8-graph">
            <div class="d-flex justify-content-center">
              <h3><b>Barang Belum di Keluarkan</b></h3>
              <hr>
                <h3>Jumlah : <?= $belumkeluar->num_rows(); ?> <a href="<?= base_url("saldo_antara/out")?>" class="btn btn-md btn-primary">Detail</a></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" style="margin-top:20px">
        <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
          <div class="main-sparkline8-hd text-center" style="padding-top:10px;padding-bottom:10px;padding-left:20px;">
            <h1>Utilisasi Pallet<h1>
          </div>
        </div>
        <div style="background-color:#fff">
          <div class="sparkline8-graph">
          <!-- <button hidden id="refresh" class="btn btn-sm btn-light" onclick="refresh()"><i class="fa fa-rotate-right"></i></button> -->
          <div hidden class="d-flex justify-content-start" id="utilisasi"></div>
            <div class="d-flex justify-content-center">
              <div id="loading" class="text-center">
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
              </div>
              <canvas hidden id="pieChart" style="width:250px"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6" style="margin-top:20px">
        <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
          <div class="main-sparkline8-hd text-center" style="padding-top:10px;padding-bottom:10px;padding-left:20px;">
            <h1>Utilisasi Rak<h1>
          </div>
        </div>
        <div style="background-color:#fff">
          <div class="sparkline8-graph">
          <div hidden class="d-flex justify-content-start" id="utilisasi1">Utilisasi rak : 100%</div>
            <div class="d-flex justify-content-center">
              <div id="loading1" class="text-center">
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
                <div class="spinner-grow mr-3" style="color:dimgray"></div>
              </div>
              <canvas hidden id="pieChart1" style="width:250px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("_partials/footer");?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $.ajax({
    dataType:"json",
    url:'<?= base_url("dashboard/refresh");?>',
    async:true,
    success:function(data){
      document.getElementById("loading").hidden=true;
      document.getElementById("loading1").hidden=true;
      document.getElementById("pieChart").hidden=false;
      document.getElementById("pieChart1").hidden=false;
      document.getElementById("utilisasi").hidden=false;
      document.getElementById("utilisasi1").hidden=false;
      for(let i=0;i<data.length;i++){
        var terpakai = data[i].terpakai;
        var takterpakai = data[i].takterpakai;
      }
      var utilisasi=Number(data.terpakai)/(Number(data.takterpakai)+Number(data.terpakai))*100
      document.getElementById('utilisasi').innerHTML = "utilisasi pallet : "+utilisasi.toFixed(2)+"%";
      var ctxP = document.getElementById("pieChart").getContext('2d');
      var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: ["Terpakai", "Tidak Terpakai"],
          datasets: [{
          data: [ data.terpakai, data.takterpakai],
            backgroundColor: ["#F7464A", "#46BFBD"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      });
      var ctxP1 = document.getElementById("pieChart1").getContext('2d');
      var myPieChart1 = new Chart(ctxP1, {
        type: 'pie',
        data: {
          labels: ["Terpakai", "Tidak Terpakai"],
          datasets: [{
          data: [ 100, 0],
            backgroundColor: ["#F7464A", "#46BFBD"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false
        }
      });
    }
  })
  
</script>
