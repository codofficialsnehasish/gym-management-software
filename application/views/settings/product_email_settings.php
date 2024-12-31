<?php defined('BASEPATH') OR exit('No direct script access allowed');
$files = array_diff(scandir(APPPATH .'views/email'), array('.', '..'));
?>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Settings</h6>
                                    <ol class="breadcrumb m-0">       
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product eMail Settings</li>
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
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                        <?= form_open_multipart('email-settings/email-content-process/'.$item->id, 'class="custom-validation"');?>
                                                            <div class="card-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Subject</label>
                                                                    <div>
                                                                    <input data-parsley-type="text" type="text"
                                                                        class="form-control" required
                                                                        placeholder="Enter Title" name="mail_subject" value="<?= $item->mail_subject;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">eMail Template</label>
                                                                    <div>
                                                                    <select class="form-select" name="mail_template" aria-label="Default select example">
                                                                    <option selected> Choose Template</option>
                                                                    <?php
                                                                        foreach ($files as $file) {
                                                                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                                        if($file!='default.php' && $file!='_header.php' && $file!='_footer.php' ){
                                                                        if ($ext == 'php')
                                                                        {
                                                                            $templatename=basename($file,'.php');
                                                                            $filename=str_replace('_',' ',$templatename);?>
                                                                    <option value="<?= $filename;?>" <?= $filename==$item->mail_template?'selected':'';?>>
                                                                    <?= ucwords($filename);?></option>
                                                                        <?php
                                                                        }
                                                                        }
                                                                        }?>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Mail Body</label>
                                                                    <div>
                                                                    <textarea name="mail_body" id="elm1" class="form-control editor" rows="5" placeholder="Description">
                                                                    <?= $item->mail_body;?>
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
