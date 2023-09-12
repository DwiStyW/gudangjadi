<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    
  <div class="container" style="position:relative;top:-250px;z-index: 1">
    <div class="row">
      <div class="col-lg-6"></div>
        <div class="col-lg-12">
            <!-- scanner qrcode -->
            <div style="background-color:white;margin-bottom:20px" id="qr-reader" allow="camera"></div>
            <!-- card 1 -->
            <div class="row">
              <div class="col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3 bg-gradient-light">
                    <h3>Pallet</h3>
                  </div>
                  <div class="card-body bg-light">
                    <div class="form-group">
                      <label for="barcode" class="mt-5">No. Pallet</label>
                      <input class="form-control mb-3" id="barcode" placeholder="No. Pallet">
                    </div>
                    <a onclick="klik()" id="submit" href="" class="btn btn-primary btn-md">Submit</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<script>
  function klik(){
    var newUrl = document.getElementById('submit').href;
    var barcode = document.getElementById('barcode').value;;
    document.getElementById('submit').href = "<?= base_url("scanner/detailpallet/")?>"+barcode;
  }
  function onScanSuccess(decodedText, decodedResult) {
    // document.getElementById('barcode').value = `${decodedText}`;
    window.location = "<?= base_url("scanner/detailpallet/")?>"+`${decodedText}`;

}
// getUserMedia(constraints);
var html5QrcodeScanner = new Html5QrcodeScanner(
	"qr-reader", { fps: 10, qrbox: 200 });
html5QrcodeScanner.render(onScanSuccess);
</script>
