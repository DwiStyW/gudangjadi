<script src="<?= base_url()?>assets/qrcode-scanner/instascanner.min.js"></script>
<div class="modal fade" id="scanKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Scan QR Code</h1>
      </div>
      <div id="isi" class="table-responsive container-fluid">
        <div style="background-color:white;margin-bottom:20px" id="qr-reader"></div>
        <table class="table table-striped table-bordered w-100" id="table">
          <thead></thead>
          <tbody></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" id="rescan" class="btn btn-secondary" hidden onclick="reset()">Scan ulang</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 200 });
  html5QrcodeScanner.render(onScanSuccess);
    function onScanSuccess(decodedText, decodedResult) {
      document.getElementById("qr-reader").hidden=true;
      html5QrcodeScanner.clear();
      document.getElementById("qr-reader").remove();
      document.getElementById("rescan").hidden=false;
      $.ajax({
        dataType:'json',
        data:{
          nopallet:`${decodedText}`
        },
        method:'post',
        url:"<?= base_url('track/keluar_track/scan_pallet');?>",
        success:function(html){
          console.log(html);
          $("#table").DataTable({
            data:html,
            destroy:true,
            columns:[
              {title:'No',data:'no'},
              {title:'No. Batch',data:'nobatch'},
              {title:'Kode',data:'kode'},
              {title:'Nama',data:'nama'},
              {title:'No. pallet',data:'nopallet'},
              {title:'Satuan1',data:'sat1'},
              {title:'Satuan2',data:'sat2'},
              {title:'Satuan3',data:'sat3'},
              {title:'Aksi',data:'aksi'},
            ],
            dom: 'lBfrtip',
            buttons: [
                'copy','excel','pdf','print'
            ],
          })
        },
      })
  
  }
  function reset(){
    document.getElementById("rescan").hidden=true;
    document.getElementById("isi").innerHTML='<div style="background-color:white;margin-bottom:20px" id="qr-reader"></div><table class="table table-striped table-bordered w-100" id="table"><thead></thead><tbody></tbody></table>';

    var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 200 });
  html5QrcodeScanner.render(onScanSuccess);
    function onScanSuccess(decodedText, decodedResult) {
      document.getElementById("qr-reader").hidden=true;
      html5QrcodeScanner.clear();
      document.getElementById("qr-reader").remove();
      document.getElementById("rescan").hidden=false;
      $.ajax({
        dataType:'json',
        data:{
          nopallet:`${decodedText}`
        },
        method:'post',
        url:"<?= base_url('track/keluar_track/scan_pallet');?>",
        success:function(html){
          console.log(html);
          $("#table").DataTable({
            data:html,
            destroy:true,
            columns:[
              {title:'No',data:'no'},
              {title:'No. Batch',data:'nobatch'},
              {title:'Kode',data:'kode'},
              {title:'Nama',data:'nama'},
              {title:'No. pallet',data:'nopallet'},
              {title:'Satuan1',data:'sat1'},
              {title:'Satuan2',data:'sat2'},
              {title:'Satuan3',data:'sat3'},
              {title:'Aksi',data:'aksi'},
            ],
            dom: 'lBfrtip',
            buttons: [
                'copy','excel','pdf','print'
            ],
          })
        },
      })
  
  }
  }
  </script>