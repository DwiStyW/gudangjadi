<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
<div>
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container " style="position:relative;top:-250px;z-index: 1">
            <div class="d-flex">
                <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                    <div class="main-sparkline8-hd" style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                        <h1>Riwayat Keluar Masuk Barang</h1>
                        <h1 id="awal"></h1>
                        <h1 id="akhir"></h1>
                    </div>
                </div>
                <div style="background-color:#fff">
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="all-form-element-inner">
                                        <form enctype="multipart/form-data"
                                            action="<?= base_url("riwayat/tampilriwayat") ?>" id="cari" method="post">

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Range
                                                            Tanggal</label>
                                                    </div>
                                                    <div class="col-lg-9">

                                                        <div class="input-daterange input-group" id="datepicker">
                                                            <input type="date" id="start" class="form-control"
                                                                name="start" value="" required />
                                                            <span class="input-group-addon">to</span>
                                                            <input type="date" id="end" class="form-control" name="end"
                                                                required />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- kode barang -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label class="login2 pull-right pull-right-pro">Kode
                                                            Barang</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-select-list">
                                                            <select id="kode" name="kode" class="form-control" required>
                                                                <option value=""></option>
                                                                <?php
                                                                        foreach ($master as $m) { ?>
                                                                <option value="<?php echo $m->kode ?>">
                                                                    <?php echo $m->nama ?> | <?php echo $m->kode ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="index.php"><button class="btn btn-white"
                                                                        type="button">Kembali</button></a>
                                                                <button class="btn btn-sm btn-primary login-submit-cs"
                                                                    type="button" onclick="mendal()">Cari</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data table area End-->
<script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/select2-master/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $("#kode").select2({
        placeholder: "Please Select"
    });
});
</script>
<script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
<?php if ($this->session->flashdata('kosong')) : ?>
<script>
Swal.fire({
    icon: 'warning',
    title: 'peringatan!',
    text: '<?= $this->session->flashdata('kosong') ?>',
    allowOutsideClick: false,
    customClass: 'swal-wide',
})
</script>
<?php endif ?>
<script>
function mendal() {
    var start = document.getElementById("start").value;
    var end = document.getElementById("end").value;
    const s = new Date(start);
    const e = new Date(end);
    if (s.getTime() > e.getTime() || start == "" || end == "") {
        Swal.fire({
            title: 'peringatan!',
            text: 'Pastikan anda memasukkan tanggal dengan benar.',
            icon: 'error',
            customClass: 'swal-wide',
        })
    } else if (document.getElementById("kode").value == "") {
        Swal.fire({
            title: 'peringatan!',
            text: 'Pastikan anda mengisi kode barang terlebih dahulu.',
            icon: 'error',
            customClass: 'swal-wide',
        })
    } else {
        document.getElementById("cari").submit();
    }
}
</script>
<style>
.swal-wide {
    width: 500px !important;
    font-size: 15px;
}
</style>