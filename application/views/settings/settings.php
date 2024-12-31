<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">General Settings</li>
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
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                        <?= form_open_multipart('settings/site-info-process/', 'class="custom-validation"');?>
                                                        <input type="hidden" name="info_id" value="<?= $site_info->id;?>" />
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Application Name</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Enter Title" name="application_name" value="<?= $site_info->application_name;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Site Title</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Site Title" name="site_title" value="<?= $site_info->site_title;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Home Page Title</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Home Page Title" name="homepage_title" value="<?= $site_info->homepage_title;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Keywords</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Keywords" name="keywords" value="<?= $site_info->keywords;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Site Description</label>
                                                                    <div>
                                                                    <textarea name="site_description" id="" class="form-control" rows="5" placeholder="Site Description">
                                                                    <?= $site_info->site_description;?>
                                                                    </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Copyright</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Copyright" name="copyright" value="<?= $site_info->copyright;?>">
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

                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                        <?= form_open_multipart('settings/logo-process/'.$item->id, 'class="custom-validation"');?>
                                                        <input type="hidden" name="id" value="<?= $item->id;?>" />
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Logo</label>
                                                                    <div>
                                                                    <div class="mb-0">
                                                                        <img class="img-thumbnail rounded me-2" id="blahlogo" alt="" width="200" src="<?= get_image($item->logo);?>" data-holder-rendered="true" >
                                                                    </div>
                                                                    <div class="mb-3 mt-3">
                                                                        <input type="file" name="logo" class="filestyle" id="imgInplogo" data-input="false" data-buttonname="btn-secondary">
                                                                        <input type="hidden" name="hdn_logo" id="logo_media_id" value="<?= $item->logo;?>" />
                                                                    </div> 

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Logo eMail</label>
                                                                    <div class="mb-0">
                                                                        <img class="img-thumbnail rounded me-2" id="blahlogoemail" alt="" width="200" src="<?= get_image($item->logo_email);?>" data-holder-rendered="true" >
                                                                    </div>
                                                                    <div class="mb-3 mt-3">
                                                                        <input type="file" name="logo_email" class="filestyle" id="imgInplogoemail" data-input="false" data-buttonname="btn-secondary">
                                                                        <input type="hidden" name="hdn_logo_email" id="email_logo_media_id" value="<?= $item->logo_email;?>" />
                                                                    </div> 
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Favicon (16x16)</label>
                                                                    <div class="mb-0">
                                                                    <img class="img-thumbnail rounded me-2" id="blahFav" alt="" width="50" src="<?= get_image($item->favicon);?>" data-holder-rendered="true" >
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <input type="file" name="favicon" class="filestyle" id="imgInpfav" data-input="false" data-buttonname="btn-secondary">
                                                                    <input type="hidden" name="hdn_favicon" id="favicon_media_id" value="<?= $item->favicon;?>" />
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
