<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Settings</li>
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
                                                        <?= form_open_multipart('settings/contact-process/'.$item->id, 'class="custom-validation"');?>
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Primary eMail</label>
                                                                    <div>
                                                                    <input data-parsley-type="email" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Enter Title" name="contact_email" value="<?= $item->contact_email;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Info eMail (Optional)</label>
                                                                    <div>
                                                                    <input data-parsley-type="email" type="text"
                                                                        class="form-control" required
                                                                        placeholder="abc@xyz.com" name="contact_email_opt" value="<?= $item->contact_email_opt;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Phone</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Site Title" name="contact_phone" value="<?= $item->contact_phone;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Phone (Optional)</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="9999999999" name="contact_phone_opt" value="<?= $item->contact_phone_opt;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Address</label>
                                                                    <div>
                                                                    <textarea name="contact_address" id="" class="form-control" rows="5" placeholder="Site Description">
                                                                    <?= $item->contact_address;?>
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Site Description</label>
                                                                    <div>
                                                                    <textarea name="contact_text" id="elm1" class="form-control editor" rows="5" placeholder="Site Description">
                                                                    <?= $item->contact_text;?>
                                                                    </textarea>
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
