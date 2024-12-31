<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Google reCaptcha Settings</li>
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
                                        <?php $this->load->view('settings/tabmenu');?>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                               <div class="row">
                                               <?php $this->load->view('partials/_messages');?>
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                        <?= form_open_multipart('settings/google-recaptcha-process/'.$item->id, 'class="custom-validation"');?>
                                                            <div class="card-body">
                                                              
                                                               
                                                                <div class="mb-3">
                                                                    <label class="form-label">Site Key</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="" name="recaptcha_site_key" value="<?= $item->recaptcha_site_key;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Secret Key</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="" name="recaptcha_secret_key" value="<?= $item->recaptcha_secret_key;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Language</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="" name="recaptcha_lang" value="<?= $item->recaptcha_lang;?>">
                                                                    <a href="https://developers.google.com/recaptcha/docs/language" target="_blank">https://developers.google.com/recaptcha/docs/language</a>
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
