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
                            <?php if ($this->permission->method('basic_information', 'read')->access()) {  ?>
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic Information</button>
                            <?php } ?>
                            <?php if ($this->permission->method('profile_picture', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile Picture</button>
                            <?php } ?>
                            <?php if ($this->permission->method('contact_information', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#contact_details" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Contact Details</button>
                            <?php } ?>
                            <?php if ($this->permission->method('documents', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#documents_details" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Document</button>
                            <?php } ?>
                            <?php if ($this->permission->method('salary_configuration', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#salary" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Salary</button>
                            <?php } ?>
                            <?php if ($this->permission->method('qualification', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#qualification_details" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Qualification</button>
                            <?php } ?>
                            <?php if ($this->permission->method('experience', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#work_experience" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Work Experience</button>
                            <?php } ?>
                            <?php if ($this->permission->method('achievements', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#achievements_details" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Achievements</button>
                            <?php } ?>
                            <?php if ($this->permission->method('bank_account', 'read')->access()) {  ?>
                            <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#bank_details" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Bank Account</button>
                            <?php } ?>
                            <?php if ($this->permission->method('change_password', 'read')->access()) {  ?>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#change_password" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</button>
                            <?php } ?>
                            <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Contract</button> -->
                            <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">User Role</button> -->
                        </div>
                        <div class="tab-content col-lg-9" id="v-pills-tabContent">
                            <?php if ($this->permission->method('basic_information', 'read')->access()) {  ?>
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <?php $this->load->view('trainer/details/_basicinfo');?>
                            </div>
                            <?php } ?>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <?php $this->load->view('trainer/details/_profilepicture');?>
                            </div>
                            <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="contact_details-tab">
                                <?php $this->load->view('trainer/details/_contactDetails');?>
                            </div>
                            <div class="tab-pane fade" id="documents_details" role="tabpanel" aria-labelledby="documents_details-tab">
                                <?php $this->load->view('trainer/details/_documents');?>
                            </div>
                            <div class="tab-pane fade" id="work_experience" role="tabpanel" aria-labelledby="work_experience-tab">
                                <?php $this->load->view('trainer/details/_workExperience');?>
                            </div>
                            <div class="tab-pane fade" id="achievements_details" role="tabpanel" aria-labelledby="achievements_details-tab">
                                <?php $this->load->view('trainer/details/_achievements');?>
                            </div>
                            <div class="tab-pane fade" id="qualification_details" role="tabpanel" aria-labelledby="qualification_details-tab">
                                <?php $this->load->view('trainer/details/_qualification');?>
                            </div>
                            <div class="tab-pane fade" id="bank_details" role="tabpanel" aria-labelledby="bank_details-tab">
                                <?php $this->load->view('trainer/details/_bankAccount');?>
                            </div>
                            <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="change_password-tab">
                                <?php $this->load->view('trainer/details/_changePassword');?>
                            </div>
                            <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
                                <?php $this->load->view('trainer/details/_salaryConfiguration');?>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                ...
                            </div>
                            <div class="tab-pane fade" id="emergency_contacts" role="tabpanel" aria-labelledby="emergency_contacts-tab">
                                <?php $this->load->view('trainer/details/_emergency_contacts');?>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>