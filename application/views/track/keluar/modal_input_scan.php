<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
<div class="modal fade" id="scanKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Scan QR Code</h1>
      </div>
      <div class="table-responsive container-fluid">
      <div style="background-color:white;margin-bottom:20px" id="qr-reader"></div>
        <table class="table table-striped table-bordered w-100" id="table">
          <thead></thead>
          <tbody></tbody>
        </table>
        </div>
      <div class="modal-footer">
        <!-- <a href="<?=base_url("track/keluar_track/input_keluar_track")?>"><button class="btn btn-secondary">Close</button></a> -->
        <button onclick="camera_close()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function camera_close(){
    html5QrcodeScanner.clear()
  }
  html5QrcodeScanner.render(onScanSuccess);
    function onScanSuccess(decodedText, decodedResult) {
      html5QrcodeScanner.clear();
      document.getElementById("qr-reader").remove();
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
  </script>