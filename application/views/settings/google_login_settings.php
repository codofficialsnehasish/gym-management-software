<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Login With Google Settings</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <?php $this->load->view('settings/social_login_tab');?>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                               <div class="row">
                                               <?php $this->load->view('partials/_messages');?>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                        <?= form_open_multipart('social-login-settings/google-process/'.$item->id, 'class="custom-validation"');?>
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Google Client Id</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" 
                                                                        placeholder="Google Client Id" name="google_client_id" value="<?= $item->google_client_id;?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Google Client Secret</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" 
                                                                        placeholder="Google Client Secret" name="google_client_secret" value="<?= $item->google_client_secret;?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Google Client Secret</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" 
                                                                        placeholder="Google Client Secret" name="google_redirect_url" value="<?= $item->google_redirect_url;?>" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="mb-0">
                                                                    <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                                    Save Changes
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?= form_close();?>
                                                        </div>
                                                    </div>

                                                  
                                               </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
 </div>
                <!-- End Page-content -->
