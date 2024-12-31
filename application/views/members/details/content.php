<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title"><?= $page_head; ?></h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $page_head; ?></li>
                    </ol>
                </div>
                <!-- <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                        <a href="<?= admin_url('modules/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                        <i class="fas fa-plus me-2"></i> Add New
                        </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php if ($this->permission->method('basic_information', 'read')->access()) { ?>
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Information</button>
                            <?php } ?>
                            <?php if ($this->permission->method('profile_picture', 'read')->access()) { ?>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile Picture</button>
                            <?php } ?>
                            <?php if ($this->permission->method('documents', 'read')->access()) { ?>
                            <button class="nav-link" id="v-documents-tab" data-bs-toggle="pill" data-bs-target="#documents" type="button" role="tab" aria-controls="v-documents" aria-selected="false">Documents</button>
                            <?php } ?>
                            <?php if ($this->permission->method('contact_details', 'read')->access()) { ?>
                            <button class="nav-link" id="v-contact-details-tab" data-bs-toggle="pill" data-bs-target="#contact_details" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contact Details</button>
                            <?php } ?>
                            <?php if ($this->permission->method('body_measurement', 'read')->access()) { ?>
                            <button class="nav-link" id="v-body-measurement-tab" data-bs-toggle="pill" data-bs-target="#body_measurement" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Body Measurement</button>
                            <?php } ?>
                            <?php if ($this->permission->method('weight_chart', 'read')->access()) { ?>
                            <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#weight_chart" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Weight Chart</button>
                            <?php } ?>
                            <?php if ($this->permission->method('diet_chart', 'read')->access()) { ?>
                            <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#diet_chart" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Diet Chart</button>
                            <?php } ?>
                            <?php if ($this->permission->method('package_details', 'read')->access()) { ?>
                            <button class="nav-link " id="v-package-tab" data-bs-toggle="pill" data-bs-target="#package_details" type="button" role="tab" aria-controls="v-package" aria-selected="true">Package Details</button>
                            <?php } ?>
                            <?php if ($this->permission->method('workouts', 'read')->access()) { ?>
                            <button class="nav-link " id="v-pt-session-tab" data-bs-toggle="pill" data-bs-target="#pt_session" type="button" role="tab" aria-controls="v-pt-session" aria-selected="true">Workouts</button>
                            <?php } ?>
                            <!-- <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#emergency_contacts" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Login Details</button> -->
                            <?php if ($this->permission->method('change_password', 'read')->access()) { ?>
                            <button class="nav-link" id="v-password-tab" data-bs-toggle="pill" data-bs-target="#change_pass" type="button" role="tab" aria-controls="v-password" aria-selected="false">Change Password</button>
                            <?php } ?>
                            <!--<button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Contract</button>-->
                            <!--<button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">User Role</button>-->
                        </div>
                        <div class="tab-content col-lg-9" id="v-pills-tabContent">
                            <?php if ($this->permission->method('basic_information', 'read')->access()) { ?>
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <?php $this->load->view('members/details/_basicinfo'); ?>
                            </div>
                            <?php } ?>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <?php $this->load->view('members/details/_profilepicture');?>
                            </div>
                            <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="v-documents-tab">
                                <?php $this->load->view('members/details/_documents');?>
                            </div>
                            <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="v-contact-details-tab">
                                <?php $this->load->view('members/details/_contactDetails');?>
                            </div>
                            <div class="tab-pane fade" id="body_measurement" role="tabpanel" aria-labelledby="body-measurement-tab">
                                <?php $this->load->view('members/details/_bodymeasurement');?>
                            </div>
                            <div class="tab-pane fade" id="weight_chart" role="tabpanel" aria-labelledby="weight-chart-tab">
                                <?php $this->load->view('members/details/_weight_chart');?>
                            </div>
                            <div class="tab-pane fade" id="diet_chart" role="tabpanel" aria-labelledby="weight-chart-tab">
                                <?php $this->load->view('members/details/_diet_chart');?>
                            </div>
                            <div class="tab-pane fade" id="pt_session" role="tabpanel" aria-labelledby="v-pt-session-tab">
                                <?php $this->load->view('members/details/_ptsession');?>
                            </div>
                            <div class="tab-pane fade" id="package_details" role="tabpanel" aria-labelledby="v-package-tab">
                                <?php $this->load->view('members/details/_package_details');?>
                            </div>
                              <div class="tab-pane fade" id="change_pass" role="tabpanel" aria-labelledby="v-password-tab">
                                <?php $this->load->view('members/details/_changePassword');?>
                            </div>


                        </div>
                    </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>