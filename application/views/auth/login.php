<!doctype html>
<html lang="en">

    <head> 
        <meta charset="utf-8">
        <title>Login | <?= $this->settings->application_name?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Design & Developed By Code Of Dolphins" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= get_favicon();?>" type="image/png" sizes="16x16">
    
        <!-- Bootstrap Css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?= base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?= base_url('assets/css/app.min.css');?>" id="app-style" rel="stylesheet" type="text/css">
        <!-- Toast message -->
        <link href="<?= base_url('assets/libs/toast/toastr.css');?>" rel="stylesheet" type="text/css" />
        <!-- Toast message -->
    </head>

    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?= base_url('assets/images/bg.jpg');?>');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full" style="background-color: #ffffffe3!important;right: 0 !important;left: unset;">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="<?= base_url('');?>"><img src="<?= get_logo();?>" width="200" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue to <?= $this->settings->application_name?>.</p>

                              <form class="mt-4" action="#" method="post" id="loginForm">

                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" name="email" id="username" placeholder="Enter username">
                                </div>
    

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-password32">Password</label>
                                    <div class="input-group input-group-merge">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password2" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off vv"></i></span>
                                    </div>
                                </div>
    
                                <div class="mb-3 row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-check-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light login" type="submit">Login
                                        <!-- <span class="spinner-border me-1" role="status" aria-hidden="true"></span>Loading... -->
                                        </button>
                                        
                                    </div>
                                    
                                </div>

                                <div class="mb-3 mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="<?= base_url('recover-password');?>"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>© <script>document.write(new Date().getFullYear())</script> ODM. Crafted with <i class="mdi mdi-heart text-danger"></i> by Code of Dolphions</p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

                <!-- JAVASCRIPT -->
                <script src="<?= base_url('assets/libs/jquery/jquery.min.js');?>"></script>
                <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
                <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js');?>"></script>
                <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js');?>"></script>
                <script src="<?= base_url('assets/libs/node-waves/waves.min.js');?>"></script>
                <script src="<?= base_url('assets/js/app.js');?>"></script>
                    <!-- toast message -->
                <script src="<?= base_url('assets/libs/toast/toastr.js');?>"></script>
                <script src="<?= base_url('assets/js/pages/toastr.init.js');?>"></script>
                <!-- toast message -->

        <?php $this->load->view('partials/ajax'); ?>
        <?php $this->load->view('partials/_messages'); ?>
    </body>
</html>
