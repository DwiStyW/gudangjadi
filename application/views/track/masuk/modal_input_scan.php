<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
<div class="modal fade" id="scanMasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Scan QR Code</h1>
    </div>
    <div class="table-responsive container-fluid">
        <div style="background-color:white;margin-bottom:20px" id="qr-reader"></div>
    </div>
      <div class="modal-footer">
        <a href="<?= base_url("track/masuk_track/close")?>"><button class="btn btn-secondary">Close</button></a>
      </div>
    </div>
  </div>
</div>

<script>
  var html5QrcodeScanner = new Html5QrcodeScanner(
      "qr-reader", { fps: 10, qrbox: 200 });
  html5QrcodeScanner.render(onScanSuccess);
    function onScanSuccess(decodedText, decodedResult) {    
        html5QrcodeScanner.clear();
  }
</script>