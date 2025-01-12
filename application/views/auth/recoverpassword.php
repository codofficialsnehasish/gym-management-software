<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Recoverpw 2 | <?= $this->settings->application_name?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= get_favicon();?>" type="image/png" sizes="16x16">
    
        <!-- Bootstrap Css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?= base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?= base_url('assets/css/app.min.css');?>" id="app-style" rel="stylesheet" type="text/css">
    
    </head>

    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?= base_url('assets/images/bg.jpg');?>');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full" style="right:0">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="index.html"><img src="<?= get_logo();?>" height="22" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Reset Password</h4>

                              <form class="mt-4" action="#">

                                <div class="alert alert-success mt-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                </div>

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                    Remember It ? <a href="<?= base_url('login');?>" class="fw-medium text-primary"> Sign In here </a>
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

    </body>
</html>
