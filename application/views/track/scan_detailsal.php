<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
<div class="admin-dashone-data-table-area mg-b-40">
    <div class="container" style="position:relative;top:-250px;z-index: 1">
        <div class="d-flex">
            <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                <div class="main-sparkline8-hd justify-content-between"
                    style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                    <h1>Scan Pallet Detail Saldo<h1>
                </div>
            </div>
        </div>
        <div style="background-color:#fff">
            <div class="sparkline8-graph">
                <div class="datatable-dashv1-list custom-datatable-overright">
                    <div id="qr-reader"></div>
                    <div class="form-group">
                        <label for="barcode">QR code</label>
                        <input class="form-control form-control-lg mb-3" id="barcode" placeholder="Scan Barcode">
                    </div>
                    <a onclick="klik()" id="submit" href="https://docs.google.com/forms/d/e/1FAIpQLSf2vwJLHzf8NilOrhdKxcbRASqtk8y_Gei9ikBG8rg2vFnT8A/formResponse?entry.1516847456=test" class="btn btn-primary btn-sm">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  function klik(){
    var newUrl = document.getElementById('submit').href;
    var barcode = document.getElementById('barcode').value;
    newUrl = newUrl.replace("test", barcode);
    document.getElementById('submit').href = newUrl;
  }
  function onScanSuccess(decodedText, decodedResult) {
    document.getElementById('barcode').value = `${decodedText}`;

}
var html5QrcodeScanner = new Html5QrcodeScanner(
	"qr-reader", { fps: 10, qrbox: 400 });
html5QrcodeScanner.render(onScanSuccess);
</script>