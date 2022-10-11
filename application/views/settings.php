<?php
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
<div class="login-form-area mg-t-30 mg-b-40">
    <div class="container-fluid" style="position:relative;margin-top:-250px;padding-bottom:32px;z-index: 1">
        <div class="row">
            <div class="col-lg-3"></div>
            <form enctype="multipart/form-data" action="<?= base_url("settings/set_akun") ?>" method="post">
                <div class="col-lg-6">
                    <div class="login-bg">
                        <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                            <div class="main-sparkline8-hd"
                                style="padding-top:20px;padding-bottom:20px;padding-left:20px;">
                                <center>
                                    <h1>Settings</h1>
                                </center>
                            </div>
                        </div>
                        <div style="background-color:#fff">
                            <div class="sparkline8-graph shadow">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="login-input-head">
                                            <p>Username</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="login-input-area">
                                            <div class="login-input-area register-mg-rt">
                                                <input type="text" class="form-control" id="user" name="user"
                                                    value="<?php echo $this->session->userdata('username'); ?>" />
                                                <input type="hidden" class="form-control" id="user" name="id"
                                                    value="<?php echo $this->session->userdata('user_id'); ?>" />
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
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="<?php echo $this->session->userdata('fullname'); ?>" />
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
                                            <input type="password" class="form-control" id="pass" name="pass"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-8">
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="login-button-pro" style="width:100%;display:block;right:0">
                                            <button type="submit" class="btn btn-md bg-gradient-dark"
                                                style="border-radius:50px;">Change
                                                Password</button>
                                        </div>
                                    </div>
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