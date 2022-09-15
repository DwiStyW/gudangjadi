<body class="sign-in-illustration">
    <section class="layarlebar"
        style="background-image: url('<?= base_url()?>assets/img/background.jpg');background-size: 100% ;background-repeat:no-repeat;background-min-width:100%">
        <div class="page-header min-vh-100">
            <img src="<?= base_url()?>assets/img/shapes/waves-gray.svg" alt="waves-gray"
                class="position-absolute opacity-10 start-0">

            <div style="display:flex;flex-wrap:wrap">
                <div class="justify-content-start">
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 text-center justify-content-center flex-column ">
                        <div class="position-relative bg-gradient-custome h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                            style="box-shadow: 5px 10px 20px black;">
                            <img src="<?= base_url()?>assets/img/shapes/waves-white.svg" alt="waves-white"
                                class="position-absolute opacity-10 start-0">
                            <div class="position-relative">
                                <img src="<?= base_url()?>assets/img/logo/log.png"
                                    style="margin-bottom:-40px;margin-top:-40px;filter: drop-shadow(5px 10px 5px #000);">
                                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js">
                                </script>
                                <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_L4w8VH.json"
                                    style="left:0px; top:0px" background="transparent" speed="1"
                                    style="width: 500px; height: 500px;" hover loop autoplay>
                                </lottie-player>
                            </div>
                            <div style="  position: absolute;left: 0;right: 0;bottom: 0;margin: auto;">
                                <h5 class="mb-2 text-white font-weight-bolder">
                                    Copyright &#169; <?php echo date("Y") ?></h5>
                                <p class="text-white"> All rights reserved.
                                    Designed by <i>IT Dept INDOSAR</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-xl-4 col-lg-5 col-md-7 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-7 text-center justify-content-center flex-column">
                    <div class="card card-plain" style="background-color:white;box-shadow: 5px 10px 20px black;">
                        <div class="card-header pb-0">
                            <h4 class="font-weight-bolder text-center">Sistem Informasi</h4>
                            <p class="mb-2 text-center"><b>Gudang Bahan Jadi</b></p>
                        </div>
                        <div class="card-body">
                            <form id="adminpro-form" class="adminpro-form" action="<?= base_url('auth/login') ?>"
                                method="post">
                                <?= $this->session->flashdata('pesan') ?>

                                <div class="mb-3">
                                    <input type="text" class="form-custome form-control-lg" id="username"
                                        name="username" placeholder="Username" aria-label="Username"
                                        aria-describedby="username-addon" />
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-custome form-control-lg" id="password"
                                        name="password" placeholder="Password" aria-label="Password"
                                        aria-describedby="password-addon" />
                                </div>
                                <div class="text-center">
                                    <button type="sumbit"
                                        class="btn btn-lg bg-gradient-custome btn-lg w-100 mt-4 mb-0 text-white">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="layarkecil"
        style="background-image: url('<?= base_url()?>assets/img/background.jpg');background-repeat:no-repeat;object-fit: contain;">
        <div class="page-header min-vh-100">
            <div style="margin-left:auto;margin-right:auto;">
                <div class="row">
                    <div>
                        <div class="card card-plain"
                            style="background-color:white;box-shadow: 5px 10px 20px black;min-width:250px">
                            <div class="card-header">
                                <img src="<?= base_url()?>assets/img/logo/logo.png" class="center"
                                    style="width: 200px;filter: drop-shadow(3px 5px 3px #353535);">
                                <br>
                                <h4 class="font-weight-bolder text-center" style="min-width: 250px;">Sistem Informasi
                                </h4>
                                <p class="mb-2 text-center"><b>Gudang Bahan Jadi</b></p>
                            </div>
                            <div class="card-body">
                                <form id="adminpro-form" class="adminpro-form" action="<?= base_url('auth/login') ?>"
                                    method="post">
                                    <?= $this->session->flashdata('pesan') ?>

                                    <div class="mb-3">
                                        <input type="text" class="form-custome form-control-lg" id="username"
                                            name="username" placeholder="Username" aria-label="Username"
                                            aria-describedby="username-addon" />
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-custome form-control-lg" id="password"
                                            name="password" placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" />
                                    </div>
                                    <div class="text-center">
                                        <button type="sumbit"
                                            class="btn btn-lg bg-gradient-custome btn-lg w-100 mt-4 mb-0 text-white">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
    .bg-gradient-custome {
        background-image: linear-gradient(310deg, #000 0%, #fbcf33 100%);
    }

    .form-custome:focus {
        color: #495057;
        background-color: #fff;
        border-color: #fbcf33;
        outline: 0;
        box-shadow: 0 0 0 2px #fbcf33;
    }

    .form-custome {
        display: block;
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.4rem;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d2d6da;
        appearance: none;
        border-radius: 0.5rem;
        transition: box-shadow 0.15s ease, border-color 0.15s ease;
    }

    body {
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    @media screen and (max-width:995px) {
        .layarlebar {
            display: none
        }
    }

    @media screen and (min-width:995px) {
        .layarkecil {
            display: none
        }
    }
    </style>