<body style="background-color:whitesmoke;">
    <!-- Header top area start-->
    <div class="container position-sticky z-index-sticky layarlebar"
        style="position: fixed;top: 0px;width: 100%; z-index: 10000;max-width:900px;margin-left:auto;margin-right:auto;">
        <div style="display:flex;flex-wrap:wrap;">
            <div class="">
                <nav class="navbar navbar-expand-lg  blur blur-rounded shadow position-absolute w-100"
                    style="height:60px;margin-top: 30px;">
                    <div class="w-100 justify-content-between">
                        <div>
                            <a class="navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip">
                                <img src="<?= base_url() ?>assets/img/logo/logo.png" style="width: 100px;" alt="" />
                            </a>
                        </div>
                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                            <li class="nav-item btn bg-gradient-dark" style="display:block;border-radius:50px;position:absolute;height: 50px;right:
                        0;margin-right:6px">
                                <a href="#" data-toggle="dropdown" aria-expanded="false"
                                    class=" dropdown-toggle text-white"
                                    style="display:block;margin-top:-8px;border-radius:50px;height: 50px;margin-left:-15px;margin-right:-15px;">
                                    <i class="fa fa-lg fa-user"></i>
                                    <span class="admin-name">
                                        <?= $this->session->userdata('username')  ?>
                                    </span>
                                    <i class="fa-caret-down fa"></i>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a>
                                    </li>
                                    <li><a href="<?= base_url("auth/logout") ?>"><i class="fa fa-sign-out"></i> Log
                                            Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <header
        style="background-image: url('<?= base_url()?>/assets/img/curved-images/curvedd.jpg');display:block;z-index: -1 !important;display:block;margin-top:-100px">
        <div class="page-header min-vh-80 main-menu-area">
            <!-- web menu -->
            <div class="position-relative contentt layarlebar" style="margin-top:-100px">
                <ul class="nav nav-tabs d-flex justify-content-between custom-menu-wrap">
                    <li><a href="<?= base_url("home") ?>" class="btn btn-lg tekan text-white">Home</a></li>
                    <li><a href="<?= base_url("master") ?>" class="btn btn-lg tekan text-white">Master Barang</a>
                    </li>
                    <li><a href="masuk.php" class="btn btn-lg tekan text-white">Barang Masuk</a></li>
                    <li><a href="keluar.php" class="btn btn-lg tekan text-white">Barang Keluar</a></li>
                    <li><a href="riwayat.php" class="btn btn-lg tekan text-white">Riwayat Keluar Masuk</a></li>
                    <li><a href="reportgr.php" class="btn btn-lg tekan text-white">Report per Gol</a></li>
                    <li><a href="report.php" class="btn btn-lg tekan text-white">Report All</a></li>
                    <?php
                        $role = $this->session->userdata('role');
                        if ($role == 'admin') {
                        ?>
                    <li><a href="<?= base_url('user.php') ?>" class="btn btn-lg tekan text-white">Admin</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
            <div class="position-absolute w-100 z-index-1 " style="top: 430px;">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave"
                            d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(245,245,245,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(245,245,245,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(245,245,245,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(245,245,245,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(245,245,245,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(245,245,245,0.95" />
                    </g>
                </svg>
            </div>
        </div>
    </header>

    <div class="header-top-area layarkecil blur" style="position: fixed;top: 0px;width: 100%; z-index: 10000;">
        <div class="container">
            <div style="display:flex;flex-wrap:wrap">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="admin-logo justify-content-between">
                        <a href="#"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt=""
                                style="width: 100px; margin-bottom:30px;margin-top:20px" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-between custom-menu-wrap">
            <li><a href="<?= base_url("home") ?>" class="btn btn-sm" style="color:#0a1324"><b>Home</b></a></li>
            <li><a href="<?= base_url("master") ?>" class="btn btn-sm" style="color:#0a1324"><b>Master Barang</b></a>
            </li>
            <li><a href="masuk.php" class="btn btn-sm" style="color:#0a1324"><b>Barang Masuk</b></a></li>
            <li><a href="keluar.php" class="btn btn-sm" style="color:#0a1324"><b>Barang Keluar</b></a></li>
            <li><a href="riwayat.php" class="btn btn-sm" style="color:#0a1324"><b>Riwayat Keluar Masuk</b></a></li>
            <li><a href="reportgr.php" class="btn btn-sm" style="color:#0a1324"><b>Report per Gol</b></a></li>
            <li><a href="report.php" class="btn btn-sm" style="color:#0a1324"><b>Report All</b></a></li>
            <?php
                        $role = $this->session->userdata('role');
                        if ($role == 'admin') {
                        ?>
            <li><a href="<?= base_url('user.php') ?>" class="btn btn-sm" style="color:#0a1324"><b>Admin</b></a>
                <?php } ?>
            </li>
        </ul>
    </div>

    <div class="mg-b-40 layarkuecil blur" style="position: fixed;top: 0px;width: 100%; z-index: 10000;">
        <div class="container">
            <div style="display:flex;flex-wrap:wrap">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="admin-logo">
                        <a href="#"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="" style="width: 100px;" />
                        </a>
                        <a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle"
                            style="color:grey">
                            <h6 style="margin-bottom:-10px">menu</h6>
                            <i class="fa-chevron-down fa fa-lg"></i>
                        </a>
                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX"
                            style="position:fixed; margin-left:auto;margin-right:auto;width:100%;">

                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="<?= base_url("home") ?>"><b><i class="fa-home fa fa-lg"></i> Home</b></a>
                            </li>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="<?= base_url("master") ?>"><b><i class="fa-database fa "></i>
                                        Master
                                        Barang</b></a>
                            </li>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="masuk.php"><b><i class="fa-archive fa"></i> Barang
                                        Masuk</b></a>
                            </li>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="keluar.php"><b><i class="fa-calendar-o fa"></i> Barang
                                        Keluar</b></a>
                            </li>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="riwayat.php"><b><i class="fa-calendar fa"></i> Riwayat
                                        Keluar Masuk</b></a>
                            </li>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="reportgr.php"><b><i class="fa-table fa"></i> Report per
                                        Gol</b></a>
                            </li>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="report.php"><b><i class="fa-history fa"></i> Report
                                        All</b></a>
                            </li>
                            <?php
                        $role = $this->session->userdata('role');
                        if ($role == 'admin') {
                        ?>
                            <li class="nav-tabs text-left" style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                <a href="<?= base_url('user.php') ?>"><b> Admin</b></a>
                                <?php } ?>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-0 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav mai-top-nav">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>