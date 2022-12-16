<div class="card shadow border-0 "
    style="z-index:10;position:relative;top:-250px;width:auto;margin-left:5%;margin-right:5%">
    <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
        <div class="main-sparkline8-hd justify-content-between"
            style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
            <h1>Utilisasi</h1>
        </div>
    </div>

    <div style="background-color:#fff">
        <div class="sparkline8-graph shadow">
            <div style="padding-left:50px;padding-right:50px;margin-bottom:50px">
                <canvas height="80" id="myChart"></canvas>
            </div>
            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total Pallet Masuk</th>
                        <th>Total Pallet Keluar</th>
                        <th>Transaksi Pallet</th>
                        <th>Pallet Terpakai</th>
                        <th>Kapasitas Gudang</th>
                        <th>Utilisasi Gudang</th>
                    </tr>
                </thead>


                <tbody>
                    <td></td>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['8/16/2022', '8/18/2022', '8/22/2022', '8/24/2022', '8/25/2022', '8/26/2022', '8/29/2022',
            '8/30/2022', '8/31/2022'
        ],
        datasets: [{
            label: 'utilisasi',
            data: [10.45, 11.08, 12.34, 14.23, 14.32, 16.94, 19.46, 26.67, 34.23],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Value'
                },
                min: 0,
                max: 100,
                ticks: {
                    // forces step size to be 50 units
                    stepSize: 20
                }
            }
        }
    }
});
</script>