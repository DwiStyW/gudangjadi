<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <div class="container-fluid">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="overflow:auto; min-width: 400px;">

            <div class="col-xl-12 col-lg-12 col-md-12">


                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
      <div id="qr-reader" style="width: 100%;"></div>
    <div class="form-group">
        <label for="barcode" class="mt-5" style="font-size:50px">QR code</label>
          <input class="form-control form-control-lg mb-3" style="height:100px; font-size:35px;" id="barcode" placeholder="Scan Barcode">
    </div>

    <a onclick="klik()" id="submit" href="https://docs.google.com/forms/d/e/1FAIpQLSf2vwJLHzf8NilOrhdKxcbRASqtk8y_Gei9ikBG8rg2vFnT8A/viewform?usp=pp_url&entry.1600451214=test" class="btn btn-primary btn-lg" style="font-size: 40px;">Submit</a>
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
