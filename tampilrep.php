<?php
include "koneksi.php";
include "cek-login.php";

ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php') ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include('mobile.php') ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include('menu.php') ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include('notif.php') ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- DATA TABLE-->
                                    <?php
                                    $start  = $_POST['start'];
                                    $end    = $_POST['end'];
                                    $slese  = date('Y-m-d', strtotime('+1 days', strtotime($end)));
                                    $status = $_POST['stat'];

                                    ?>

                                </div>
                                <div class="table-responsive m-b-40 width">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Tiket</th>
                                                <th>Pelapor</th>
                                                <th>Divisi</th>
                                                <th>Mesin/ Prasarana</th>
                                                <th>Ruangan</th>
                                                <th>Status</th>
                                                <th>Tgl</th>
                                                <th>Kepala Emply</th>
                                                <th>Prioritas</th>
                                                <th>Durasi Max</th>
                                                <th>Durasi Kerja</th>
                                                <th>Presentase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($status == '0') {
                                                $query = mysqli_query($conn, "SELECT * FROM ticket, mesin, ruang, kategori WHERE ticket.mesin = mesin.id AND mesin.kategori = kategori.no AND ticket.ruang = ruang.id AND ticket.tgl BETWEEN '$start' AND '$slese' ORDER BY ticket.id DESC, ticket.prioritas ASC");
                                            } else {
                                                $query = mysqli_query($conn, "SELECT * FROM ticket, mesin, ruang, kategori WHERE ticket.mesin = mesin.id AND mesin.kategori = kategori.no AND ticket.ruang = ruang.id AND ticket.status = '$status' AND ticket.tgl  BETWEEN '$start' AND '$slese' ORDER BY ticket.id DESC, ticket.prioritas ASC");
                                            }
                                            $no = 1;
                                            while ($data  = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><a href="riwayat.php?notikk=<?php echo $data['notiket']; ?>"><?php echo $data['notiket']; ?></a>
                                                    </td>
                                                    <td><?php echo $data['pelapor']; ?></td>
                                                    <td><?php echo $data['divisi']; ?></td>
                                                    <td><?php echo $data['nomesin']; ?></td>
                                                    <td><?php echo $data['ruang']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><?php echo date("d-m-Y h:m:s", strtotime($data['tgl'])); ?></td>
                                                    <td><?php echo $data['kepala']; ?></td>
                                                    <td><?php echo $data['prioritas']; ?></td>
                                                    <td><?php echo $data['batas'] . ' Menit' ?></td>
                                                    <td><?php if ($data['status'] == 'selesai' || $data['status'] == 'closed') {
                                                            echo $data['durasi'] . ' Menit';
                                                        } else {
                                                        } ?></td>
                                                    <?php
                                                    $durasi = $data['durasi'];
                                                    $batas = $data['batas'] ?>
                                                    <?php if ($durasi < $batas) {
                                                        $persen = 100;
                                                    } elseif ($durasi >= $batas * 2) {
                                                        $persen = 0;
                                                    } else {
                                                        $persen = (($durasi - $batas) / $batas) * 100;
                                                    } ?>
                                                    <td><?php if (($data['status'] == 'selesai') || ($data['status'] == 'closed')) {
                                                            echo round($persen) . '%';
                                                        } else {
                                                        } ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        <?php include('copyright.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php include('footer.php'); ?>

</body>

</html>
<!-- end document-->
<style>
    .notification {
        text-decoration: none;
        position: relative;
        display: inline-block;
        border-radius: 2px;
    }

    .notification .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 7px 10px;
        border-radius: 50%;
        background-color: red;
        color: white;
    }
</style>