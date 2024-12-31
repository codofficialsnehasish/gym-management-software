<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Social Media Settings</li>
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
                                            <?= form_open_multipart('settings/social-media-process/'.$item->id, 'class="custom-validation"');?>
                                                <div class="row">
                                                    <?php //$this->load->view('partials/_messages');?>
                                                            <div class="col-lg-6">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                    <div class="mb-3">
                                                                            <label class="form-label">Site Url</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" 
                                                                                placeholder="www.zilesco.com" name="site_url" value="<?= $item->site_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Facebook</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://www.facebook.com" name="facebook_url" value="<?= $item->facebook_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Twitter</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://twitter.com" name="twitter_url" value="<?= $item->twitter_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">LinkedIn</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://www.linkedin.com" name="linkedin_url" value="<?= $item->linkedin_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">YouTube</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://www.youtube.com" name="youtube_url" value="<?= $item->youtube_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Instagram</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://www.instagram.com" name="instagram_url" value="<?= $item->instagram_url;?>">
                                                                            </div>
                                                                        </div> 
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                    <div class="mb-3">
                                                                            <label class="form-label">Whatsapp</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://web.whatsapp.com" name="whatsapp_url" value="<?= $item->whatsapp_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">V Kontakte</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://vk.com" name="vk_url" value="<?= $item->vk_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Pinterest</label>
                                                                            <div>
                                                                            <input data-parsley-type="email" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://pinterest.com" name="pinterest_url" value="<?= $item->pinterest_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Tumblr</label>
                                                                            <div>
                                                                            <input data-parsley-type="email" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://www.tumblr.com" name="tumblr_url" value="<?= $item->tumblr_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Flickr</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://www.flickr.com" name="flickr_url" value="<?= $item->flickr_url;?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Vimeo</label>
                                                                            <div>
                                                                            <input data-parsley-type="text" type="text"
                                                                                class="form-control" required
                                                                                placeholder="https://vimeo.com" name="vimeo_url" value="<?= $item->vimeo_url;?>">
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
                                                                </div>
                                                            </div> 
                                                </div>
                                               <?= form_close();?>  
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
 </div>
 <!-- End Page-content -->