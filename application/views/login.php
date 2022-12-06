<?php $this->load->view('_partials/header_log');
error_reporting(0);
?>

<body class="sign-in-illustration" style="background-color:whitesmoke">

    <section>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

        <lottie-player src="https://lottie.host/96cce79d-e4a6-48db-891e-0d4e7e1ea732/DRx37PkYza.json"
            background="transparent" speed="1"
            style="position:fixed;width: 900px; height: 900px;z-index:-1;top:-200px;left:-50px;opacity:0.03" loop
            autoplay>
        </lottie-player>

        <lottie-player src="https://lottie.host/96cce79d-e4a6-48db-891e-0d4e7e1ea732/DRx37PkYza.json"
            background="transparent" speed="1"
            style="position:fixed;width: 900px; height: 900px;z-index:-1;top:90px;left:400px;opacity:0.03" loop
            autoplay>
        </lottie-player>
        <div class="form-bg">
            <div class="container">
                <div class="d-flex justify-content-center" style="margin-top:10%">
                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
                        <div class="form-container">
                            <div class="form-icon">
                                <img src="<?= base_url()?>assets/img/logo/log.png" style="padding-bottom:10%">
                                <img src="<?= base_url()?>assets/img/box.png"
                                    style="width:140px;height:140px;background:white;object-fit: cover;border-radius: 50%;filter:drop-shadow()">
                            </div>
                            <form id="adminpro-form" class="form-horizontal blur" action="<?= base_url('auth/login') ?>"
                                method="post">
                                <h3>Sistem Informasi</h3>
                                <p>Gudang Barang Jadi</p>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" style="color:black" type="text" id="username"
                                        name="username" placeholder="Username" aria-label="Username"
                                        aria-describedby="username-addon" autofocus>
                                </div>
                                <div class="form-group">
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" style="color:black" type="password" id="password"
                                        name="password" placeholder="Password" aria-label="Password"
                                        aria-describedby="password-addon">
                                </div>
                                <div style="padding-top:20%;padding-bottom:-20%">
                                    <button class="btn signin">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('_partials/footer_log');?>
</body>

</html>

<style>
.form-container {
    background: linear-gradient(310deg, #141727 0%, #3A416F 100%);
    font-family: 'Roboto', sans-serif;
    font-size: 0;
    padding: 0 15px;
    border: 1px solid linear-gradient(310deg, #141727 0%, #3A416F 100%);
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.form-container .form-icon {
    color: #fff;
    font-size: 13px;
    text-align: center;
    text-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    width: 50%;
    padding: 70px 0;
    vertical-align: top;
    display: inline-block;
}

.form-container .form-icon i {
    font-size: 124px;
    margin: 0 0 15px;
    display: block;
}

.form-container .form-icon .signup a {
    color: #fff;
    text-transform: capitalize;
    transition: all 0.3s ease;
}

.form-container .form-icon .signup a:hover {
    text-decoration: underline;
}

.form-container .form-horizontal {
    background: rgba(255, 255, 255, 0.99);
    width: 50%;
    padding: 30px 30px;
    margin: -20px 0;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    display: inline-block;
}

.form-container .title {
    color: #454545;
    font-size: 23px;
    font-weight: 900;
    text-align: center;
    text-transform: capitalize;
    letter-spacing: 0.5px;
    margin: 0 0 30px 0;
}

.form-horizontal .form-group {
    background-color: rgba(255, 255, 255);
    margin: 0 0 15px;
    border: 1px solid #b5b5b5;
    border-radius: 20px;
}

.form-horizontal .input-icon {
    color: #b5b5b5;
    font-size: 15px;
    text-align: center;
    line-height: 38px;
    height: 35px;
    width: 40px;
    vertical-align: top;
    display: inline-block;
}

.form-horizontal .form-control {
    color: #b5b5b5;
    background-color: transparent;
    font-size: 14px;
    letter-spacing: 1px;
    width: calc(100% - 55px);
    height: 33px;
    padding: 2px 10px 0 0;
    box-shadow: none;
    border: none;
    border-radius: 0;
    display: inline-block;
    transition: all 0.3s;
}

.form-horizontal .form-control:focus {
    box-shadow: none;
    border: none;
}

.form-horizontal .form-control::placeholder {
    color: #b5b5b5;
    font-size: 13px;
    text-transform: capitalize;
}

.form-horizontal .btn {
    color: rgba(255, 255, 255, 0.8);
    background: linear-gradient(310deg, #141727 0%, #3A416F 100%);
    font-size: 15px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
    margin: 0 0 10px 0;
    border: none;
    border-radius: 20px;
    transition: all 0.3s ease;
}

.form-horizontal .btn:hover,
.form-horizontal .btn:focus {
    color: #fff;
    background-color: #D31128;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

.form-horizontal .forgot-pass {
    font-size: 12px;
    text-align: center;
    display: block;
}

.form-horizontal .forgot-pass a {
    color: #999;
    transition: all 0.3s ease;
}

.form-horizontal .forgot-pass a:hover {
    color: #777;
    text-decoration: underline;
}

@media only screen and (max-width:576px) {
    .form-container {
        padding-bottom: 15px;
    }

    .form-container .form-icon {
        width: 100%;
        padding: 20px 0;
    }

    .form-container .form-horizontal {
        width: 100%;
        margin: 0;
    }

}
</style>