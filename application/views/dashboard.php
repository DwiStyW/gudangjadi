    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container" style="position:relative;top:-250px;z-index: 1">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                        <div class="main-sparkline8-hd text-center" style="padding-top:10px;padding-bottom:10px;padding-left:20px;">
                            <h1>Jumlah Barang Belum di Pallet</h1>
                          </div>
                        </div>
                        <div style="background-color:#fff">
                          <div class="sparkline8-graph">
                            <div class="d-flex justify-content-center" style="width:100%; height:100%;">
                              <h1><b><?= $jumdetsalqty->num_rows() ?></b></h1>
                              <button class="btn btn-md btn-primary">Detail</button>
                        </div>
                      </div>
                    </div>
                </div>
                <?php
                  $terpakai = $this->db->select("nopallet")->group_by("nopallet")->get("detailsal")->num_rows();
                  $pallet = $this->db->get("pallet")->num_rows();
                  $takterpakai = abs($pallet - $terpakai);
                ?>
                <div class="col-lg-6">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                        <div class="main-sparkline8-hd text-center" style="padding-top:10px;padding-bottom:10px;padding-left:20px;">
                            <h1>Pallet<h1>
                        </div>
                        <div style="background-color:#fff">
                          <div class="sparkline8-graph">
                            <div class="d-flex justify-content-center" style="width:50%; height:50%;">
                              <canvas id="myChart"></canvas>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Terpakai','Tidak terpakai'],
      datasets: [{
        backgroundColor:['RGBA(255, 69, 0, 1.0)','RGB(34, 139, 34, 1.0)'],
        label: 'Jumlah',
        data: [<?=$terpakai?>,<?=$takterpakai?>],
        borderWidth: 1
      }]
    },
  });
</script>