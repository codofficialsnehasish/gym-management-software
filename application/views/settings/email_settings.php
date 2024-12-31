<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">eMail Settings</li>
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
                                        <?php $this->load->view('settings/emailtab');?>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                               <div class="row">
                                               <?php $this->load->view('partials/_messages');?>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                        <?= form_open_multipart('email-settings/process/'.$item->id, 'class="custom-validation"');?>
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Library</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Enter Title" name="mail_library" value="<?= $item->mail_library;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Protocol</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Site Title" name="mail_protocol" value="<?= $item->mail_protocol;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Host</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Home Page Title" name="mail_host" value="<?= $item->mail_host;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Port</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Mail Port" name="mail_port" value="<?= $item->mail_port;?>">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Username</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Mail Username" name="mail_username" value="<?= $item->mail_username;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Password</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Mail Password" name="mail_password" value="<?= $item->mail_password;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Title</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Mail Title" name="mail_title" value="<?= $item->mail_title;?>">
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
