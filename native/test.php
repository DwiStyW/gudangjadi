<div class="container">
    <h1>Cara Membuat Pencarian Menggunaan Javascript</h1>
    <div class="left">
        <h2>Daftar Kategori</h2>
        <input type="text" name="" id="cariKat" onkeyup="prosesMenu()" placeholder="Cari Disini...">
        <ul id="daftarKategori">
            <li><a href="#">Kaos</a></li>
            <li><a href="#">Kemeja</a></li>
            <li><a href="#">Blazer</a></li>
            <li><a href="#">Celana Jeans</a></li>
            <li><a href="#">Celana Sekolah</a></li>
            <li><a href="#">Celana Gemes</a></li>
            <li><a href="#">Rok Span</a></li>
            <li><a href="#">Kaos Kutang</a></li>
            <li><a href="#">Daster</a></li>
            <li><a href="#">Batik</a></li>
            <li><a href="#">Baju Renang</a></li>
        </ul>
    </div>
    <select type="select">
        <option>oke</option>
        <option>oke</option>
        <option>oke</option>
        <option>oke</option>
        <option>oke</option>
    </select>
    <div class="right">
        <h2>Selemat Datang di toko Sejahtera</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et velit esse pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>

<script>
    function prosesMenu() {
        var input = document.getElementById("cariKat");
        var filter = input.value.toLowerCase();
        var ul = document.getElementById("daftarKategori");
        var li = document.querySelectorAll("li")
        console.log(li)
        for (var i = 0; i < li.length; i++) {
            var ahref = document.querySelectorAll("a")[i];
            if (ahref.innerHTML.toLowerCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
<html>

<head>

    <title>Select 2 with input textboxt | www.hakkoblogs.com</title>




</head>

<body>

    <div class="form-group">



        <label class="col-sm-2 col-sm-2 control-label">Mata Pelajaran</label>

        <div class="col-sm-6">

            <select class="form-control" id="kode" name="kode" required="">

                <option value=""> -- Mata Pelajaran -- </option>

                <option value="">Matematika</option>

                <option value="">Fisika</option>

                <option value="">Kimia</option>

                <option value="">Komputer</option>

                <option value="">Sosiologi</option>

                <option value="">Analisis Data</option>

                <option value="">Perancangan Database</option>

            </select>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#kode').selectize({
                sortField: 'text'
            });
        });
    </script>
    <script src="../js/ajax-dropdown/jquery.min.js"></script>
    <script src="../js/ajax-dropdown/selectsize.js"></script>
    <link rel="stylesheet" href="../js/ajax-dropdown/selectsize.css">

</body>

</html>