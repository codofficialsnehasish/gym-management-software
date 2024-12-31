<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Media Uploads</h6>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= admin_url('media/')?>">Media</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add new Image</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="<?= admin_url('media/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-arrow-left me-2"></i> Back
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-5">
                                        <?php echo form_open_multipart('admin/media/process', array('class' => 'dropzone'));?>        
                                            <!-- <form action="<?= admin_url('media/process'); ?>" class="dropzone"> -->
                                            <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>"> -->

                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>

                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                    </div>
                                                    
                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            <!-- </form> -->
                                            <?php echo form_close();?>
                                        </div>
    
                                        

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->