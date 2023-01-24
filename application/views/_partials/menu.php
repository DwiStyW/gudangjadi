<style>
.dropbtn {
    background: transparent;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
    z-index: 100;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 100;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {}
</style>

<body style="background-color:whitesmoke;">
    <!-- Header top area start-->
    <div class="containerr position-sticky z-index-sticky">
        <div style="display:flex;flex-wrap:wrap;">
            <nav class="form-container blur blur-rounded shadow">
                <div class="justify-content-between" style="margin-top:5px">
                    <div>
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip">
                            <img src="<?= base_url() ?>assets/img/logo/logo.png" style="width: 100px;margin-top:5px"
                                alt="" />
                        </a>
                    </div>
                    <ul style="margin-top:-5px">
                        <li class="nav-item btn bg-gradient-dark" style="border-radius:50px;position:absolute;height: 50px;right:
                        0;margin-right:6px">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" class=" dropdown-toggle text-white"
                                style="display:block;margin-top:8px;border-radius:50px;height: 50px;width: 100px;margin-left:-15px;margin-right:-15px;">
                                <i class="fa fa-lg fa-user"></i>
                                <span class="admin-name">
                                    <?= $this->session->userdata('username')  ?>
                                </span>
                                <i class="fa-caret-down fa"></i>
                            </a>
                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                <li><a href="<?= base_url("settings") ?>"><i class="fa fa-gear"></i> Settings</a>
                                </li>
                                <li><a href="<?= base_url("auth/logout") ?>"><i class="fa fa-sign-out"></i> Log
                                        Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- mobile -->
            <nav class="form-container-kecil blur blur-rounded shadow">
                <div class="justify-content-between" style="margin-top:5px;">
                    <div>
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip">
                            <img src="<?= base_url() ?>assets/img/logo/logo.png" style="width: 100px;margin-top:5px"
                                alt="" />

                        </a>
                    </div>
                    <ul style="margin-top:-5px">
                        <li class="nav-item btn bg-gradient-dark" style="border-radius:50%;position:absolute;width: 46px;height: 46px;right:
                        0;margin-right:6px">
                            <a href="#" data-toggle="dropdown" aria-expanded="false" class=" dropdown-toggle text-white"
                                style="display:block;border-radius:50%;height: 46px;width: 46px;position:fixed;right:0;margin-right:6px;margin-top:6px">
                                <i class="fa-bars fa"></i>
                            </a>
                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX"
                                style="position:fixed; margin-left:auto;margin-right:auto;width:100%;z-index:1000;background-color:whitesmoke">

                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("home") ?>"><b><i class="fa-home fa fa-lg"></i> Home</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("master") ?>"><b><i class="fa-database fa "></i>
                                            Master
                                            Barang</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("masuk") ?>"><b><i class="fa-archive fa"></i> Barang
                                            Masuk</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("keluar") ?>"><b><i class="fa-calendar-o fa"></i> Barang
                                            Keluar</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("riwayat") ?>"><b><i class=" fa-calendar fa"></i> Riwayat
                                            Keluar Masuk</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("report/filgolongan") ?>"><b><i class=" fa-table fa"></i>
                                            Report per
                                            Gol</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("report") ?>"><b><i class="fa-history fa"></i> Report
                                            All</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("report/report_saldo_akhir") ?>"><b><i
                                                class="fa-history fa"></i> Report
                                            Saldo Akhir</b></a>
                                </li>
                                <?php
                                $role = $this->session->userdata('role');
                                if ($role == 'admin') {
                                ?>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url('user.php') ?>"><b> Admin</b></a>
                                    <?php } ?>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("settings") ?>"><b><i class="fa-gear fa"></i> Settings</b></a>
                                </li>
                                <li class="nav-tabs text-left"
                                    style="margin-left:20px;margin-right:20px;margin-top:20px;">
                                    <a href="<?= base_url("auth/logout") ?>"><b><i class="fa-sign-out fa"></i> Log
                                            Out</b></a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end mobile -->
            <!-- End Navbar -->
        </div>
    </div>

    <header
        style="background-image: url('<?= base_url()?>/assets/img/curved-images/curvedd.jpg');display:block;z-index: -1 !important;display:block;margin-top:-100px">
        <div class="page-header min-vh-80 main-menu-area">
            <!-- web menu -->
            <div class="position-relative contentt layarlebar">
                <ul class="nav nav-tabs d-flex justify-content-between custom-menu-wrap">
                <li><a href="<?= base_url("home") ?>" class="btn btn-lg tekan text-white">Home</a></li>
                <li><a href="<?= base_url("master") ?>" class="btn btn-lg tekan text-white">Master Produk</a></li>
                    <?php if($this->session->userdata('role')=="track"){?>
                    <li><a href="<?= base_url("track/masuk_track") ?>" class="btn btn-lg tekan text-white">Produk Masuk</a></li>
                    
                    <li><a href="<?= base_url("track/keluar_track") ?>" class="btn btn-lg tekan text-white">Produk Keluar</a></li>
                    <div class="dropdown">
                        <button class="dropbtn">Mapping <i class="fa fa-chevron-down fa-xs"></i></button>
                        <div class="dropdown-content">
                            <a href="<?= base_url("mapping") ?>">Layout</a>
                            <a href="<?= base_url("mapping2") ?>">Edit Layout</a>
                        </div>
                        <?php } elseif($this->session->userdata('role')=="user" || $this->session->userdata('role')=="admin" || $this->session->userdata('role')=="manager"){?>
                    <li><a href="<?= base_url("masuk") ?>" class="btn btn-lg tekan text-white">Produk Masuk</a>
                    </li>
                    <li><a href="<?= base_url("keluar") ?>" class="btn btn-lg tekan text-white">Produk Keluar</a>
                    </li>
                    
                    <?php } ?>
                    
                    <?php if($this->session->userdata('role') != "track"){?>
                    <div class="dropdown">
                        <button class="dropbtn">Report <i class="fa fa-chevron-down fa-xs"></i></button>
                        <div class="dropdown-content">
                            <a href="<?= base_url("riwayat") ?>">Riwayat Keluar
                                Masuk</a>
                            <a href="<?= base_url("report/filgolongan") ?>">Report
                                per
                                Gol</a>
                            <a href="<?= base_url("report") ?>">Report All</a>
                            <a href="<?= base_url("report/report_saldo_akhir") ?>">Saldo Akhir Stock</a>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- <li><a href="<?= base_url("riwayat") ?>" class="btn btn-lg tekan text-white">Riwayat Keluar
                            Masuk</a></li>
                    <li><a href="<?= base_url("report/filgolongan") ?>" class="btn btn-lg tekan text-white">Report per
                            Gol</a></li>
                    <li><a href="<?= base_url("report") ?>" class="btn btn-lg tekan text-white">Report All</a></li> -->


                    <?php
                        $role = $this->session->userdata('role');
                        if ($role == 'admin') {
                        ?>
                    <li><a href="<?= base_url('user.php') ?>" class="btn btn-lg tekan text-white">Admin</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>

            <div class="position-absolute w-100 z-index-1" style="bottom:0">
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

    <style>
    @media only screen and (min-width:1200px) {

        .form-container {
            position: absolute;
            width: 98%;
            height: 60px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            display: inline-block;
        }

        .form-container-kecil {
            display: none
        }

        .containerr {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 85%;
            padding-right: calc(var(--bs-gutter-x) * 1.5);
            padding-left: calc(var(--bs-gutter-x) * 1);
            margin-right: auto;
            margin-left: auto;
        }

    }

    @media only screen and (max-width:1200px) {
        .containerr {
            width: 95%;
            margin-right: auto;
            margin-left: auto;
        }

        .form-container {
            display: none
        }

        .form-container-kecil {
            display: block;
            position: absolute;
            margin-top: 2%;
            width: 100%;
        }

        p {

            margin-top: 10px;
            text-align: left;
            font-size: 16px;
        }
    }
    </style>