<?php
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
?>
<div class="admin-dashone-data-table-area mg-b-40">
  <div class="container" style="position:relative;top:-250px;z-index: 1">
    <div class="w-100" style="margin-bottom:20px">
      <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
        <div class="main-sparkline8-hd" style="padding-top:10px;padding-bottom:10px;padding-left:10px;">
          <h1>Tak Berjudul<h1>
        </div>
      </div>
      <div style="background-color:#fff">
        <div class="sparkline8-graph">
          <div class="text-left">
            <button class="btn bg-gradient-light" style="height:100px">TEST</button>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
            <button class="btn bg-gradient-light" style="height:100px">TEST</button>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
            <button class="btn bg-gradient-light" style="height:100px">TEST</button>
            <span style="padding:10px;font-size:400%;width:auto">&#8594</span>
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
            <h1>Pallet<h1>
          </div>
        </div>
        <div style="background-color:#fff">
          <div class="sparkline8-graph">
          <button hidden id="refresh" class="btn btn-sm btn-light" onclick="refresh()"><i class="fa fa-rotate-right"></i></button>
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
      document.getElementById("pieChart").hidden=false;
      document.getElementById("refresh").hidden=false;
      for(let i=0;i<data.length;i++){
        var terpakai = data[i].terpakai;
        var takterpakai = data[i].takterpakai;
      }
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
    }
  })
  function refresh(){
  $.ajax({
    dataType:"json",
    url:'<?= base_url("dashboard/refresh");?>',
    async:true,
    success:function(data){
      for(let i=0;i<data.length;i++){
        var terpakai = data[i].terpakai;
        var takterpakai = data[i].takterpakai;
      }
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
    }
  })
}
</script>
