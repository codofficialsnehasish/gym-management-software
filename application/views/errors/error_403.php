<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>403 | <?= $this->settings->application_name?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Design & Developed By Code Of Dolphins" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= get_favicon();?>">

        <!-- Bootstrap Css -->
        <link href="<?= base_url('');?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?= base_url('');?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?= base_url('');?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="authentication-bg d-flex align-items-center pb-0 vh-100">
            <div class="content-center w-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 ms-auto">
                                            <div class="ex-page-content">
                                                <h1 class="text-dark display-1 mt-4">403!</h1>
                                                <h4 class="mb-4">Oops, You don't have permission to access this.</h4>
                                                <a class="btn btn-primary mb-5 waves-effect waves-light" href="<?= base_url('dashboard');?>"><i class="mdi mdi-home"></i> Back to Dashboard</a>
                                            </div>
                                
                                        </div>
                                        <div class="col-lg-5 mx-auto">
                                            <img src="<?= base_url('');?>assets/images/403-error.jpg" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!-- end container -->
            </div>

        </div>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url('');?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url('');?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('');?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url('');?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url('');?>assets/libs/node-waves/waves.min.js"></script>

        <script src="<?= base_url('');?>assets/js/app.js"></script>

    </body>
</html>
