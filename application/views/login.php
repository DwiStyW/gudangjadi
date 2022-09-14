<style>
    body {

        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }
</style>

<body class="materialdesign" style="background: url(<?= base_url() ?>assets/img/background.jpg) no-repeat fixed;">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->

    <!-- Header top area start-->
    <div class="col-lg-12">
        <!-- login Start-->
        <div class="login-form-area mg-t-30 mg-b-40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4"></div>

                    <form id="adminpro-form" class="adminpro-form" action="<?= base_url('auth/login') ?>" method="post">

                        <div class="col-lg-4" style="padding-top:30px;">
                            <div class="login-bg">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="logo">
                                            <a href="#"><img src="<?= base_url() ?>assets/img/logo/logo.png" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-title">
                                            <h1>
                                                <center>Sistem Informasi Gudang</center>
                                            </h1>

                                            <h3>
                                                <center>Bahan Jadi</center>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <?= $this->session->flashdata('pesan') ?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="login-input-head">
                                            <p>Username</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-input-area">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username..." />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="login-input-head">
                                            <p>Password</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-input-area">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password..." />

                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-button-pro">

                                            <button type="submit" class="login-button login-button-lg">Log in</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
        <!-- login End-->
    </div>