<body>
    <?php
    // $username = $_SESSION['username'];
    // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
    // $user_login = mysqli_fetch_array($query_user_login);
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Contact Start-->
    <div class="login-form-area mg-t-30 mg-b-40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <form enctype="multipart/form-data" action="<?= base_url("settings/set_akun") ?>" method="post">
                    <div class="col-lg-6">

                        <div class="login-bg">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-title">
                                        <center>
                                            <h1>Settings</h1>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>Username</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <div class="login-input-area register-mg-rt">
                                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $this->session->userdata('username'); ?>" />
                                            <input type="hidden" class="form-control" id="user" name="id" value="<?php echo $this->session->userdata('user_id'); ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p>Full Name</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <div class="login-input-area register-mg-rt">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $this->session->userdata('fullname'); ?>" />
                                        </div>
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
                                        <input type="password" class="form-control" id="pass" name="pass" />
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <div class="login-button-pro">
                                        <button type="submit" class="login-button login-button-lg">Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    <!-- Contact End-->