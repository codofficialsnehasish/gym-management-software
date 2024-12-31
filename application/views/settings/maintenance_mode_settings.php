<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Maintenance Mode Settings</li>
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
                                                        <?= form_open_multipart('settings/maintenance-mode-process/'.$item->id, 'class="custom-validation"');?>
                                                            <div class="card-body">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">Status</label>
                                                                <div class="form-check form-check-inline">
                                                                <input type="radio" id="customRadioInline11" name="maintenance_mode_status" class="form-check-input" value="1"  <?= check_uncheck($item->maintenance_mode_status,1);?>>
                                                                <label class="form-check-label" for="customRadioInline11">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                <input type="radio" id="customRadioInline22" name="maintenance_mode_status" class="form-check-input" value="0"  <?= check_uncheck($item->maintenance_mode_status,0);?>>
                                                                <label class="form-check-label" for="customRadioInline22">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                            <label class="form-label">Title</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" 
                                                                                placeholder="www.zilesco.com" name="maintenance_mode_title" value="<?= $item->maintenance_mode_title;?>">
                                                                            </div>
                                                                        </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Content</label>
                                                                    <div>
                                                                    <textarea name="maintenance_mode_description" id="elm1" class="form-control editor" rows="5" placeholder="Description">
                                                                    <?= $item->maintenance_mode_description;?>
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
