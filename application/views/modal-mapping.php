<script>
  function modal(kdpallet){
    document.getElementById('exampleModalLabel').innerHTML = kdpallet;
    // console.log(kdpallet);
    $.ajax({
      url: "<?php echo site_url('mapping/getkdpallet'); ?>",
      method: "POST",
      data: {
      kdpallet: kdpallet
      },
      async: true,
      dataType: 'json',
      success: function(data) {
        var html ='';
        for (i = 0; i < data.length; i++) {
        var tahunKebalik = data[i].nobatch.slice(parseInt(data[i].nobatch.length-6),parseInt(data[i].nobatch.length-4));
        var tahun = parseInt(tahunKebalik.split('').reverse().join(''))+parseInt(2000);
        var bulan = data[i].nobatch.slice(parseInt(data[i].nobatch.length-4),parseInt(data[i].nobatch.length-2));
        // var tanggal = data[i].nobatch.slice(parseInt(data[i].nobatch.length-2),data[i].nobatch.length);
        var tanggal = '01';
        var tahun_exp = (parseInt(data[i].expdate)/12)+parseInt(tahun);
        var join = tahun_exp+'-'+bulan+'-'+tanggal;
        var expdate = parseInt(data[i].expdate);
        var tgl_exp = new Date(join);
        var now = new Date().getTime();
        var tWaktu = parseInt(tgl_exp.getTime())-parseInt(now);
        var tHari = Math.floor(parseInt(tWaktu)/(3600*24*1000));
        var hBulan = Math.floor(parseInt(tHari)/30)
        var tTahun = Math.floor(parseInt(hBulan)/12)
        var tBulan = Math.floor(((parseInt(hBulan)/12)-tTahun)*12)

          html += '<tr>'
          html += '<td>'+ parseInt(i+1) +'</td>'
          // html += '<td>'+ data[i].tglform +'</td>'
          html += '<td>'+ data[i].nobatch +'</td>'
          html += '<td>'+ data[i].kode +'</td>'
          html += '<td>'+ data[i].nama +'</td>'
          var sat1 = Math.floor(data[i].qty / (data[i].max1*data[i].max2));
          var sisa  = data[i].qty - (sat1 * data[i].max1 * data[i].max2);
          var sat2  = Math.floor(sisa / data[i].max2);
          var sat3  = sisa - sat2 * data[i].max2;
          html += '<td>'+ sat1+' '+data[i].sat1 +'</td>'
          html += '<td>'+ sat2+' '+data[i].sat2 +'</td>'
          html += '<td>'+ sat3+' '+data[i].sat3 +'</td>'
          html += '<td>'+ parseInt(data[i].expdate)+' Bulan'+'</td>'
          html += '<td>'+ tTahun+' Tahun ' + tBulan+' Bulan'+'</td>'
          html += '</tr>'
          }
          // console.log(data);
          $('#isiPallet').html(html);
          }
    });
}
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
      </div>
      <div class="modal-body">
      <table id="table" data-toggle="table" data-pagination="false" data-search="false" data-show-columns="false"
                data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false"
                data-show-toggle="false" data-resizable="false" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                        <!-- <th rowspan="2">Tanggal Form</th> -->
                        <th rowspan="2">No Batch</th>
                        <th rowspan="2">Kode</th>
                        <th rowspan="2">Nama Barang</th>
                        <th colspan="3" style="vertical-align : middle;text-align:center;">saldo</th>
                        <th rowspan="2">Expired Date</th>
                        <th rowspan="2">Tenggang Waktu</th>
                    </tr>
                    <tr>
                        <th>Sat 1</th>
                        <th>Sat 2</th>
                        <th>Sat 3</th>
                    </tr>
                </thead>


                <tbody id="isiPallet">
                </tbody>
            </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
