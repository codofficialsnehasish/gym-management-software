<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Inquiry</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= admin_url('inquiry')?>">Inquiry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Inquiry</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="<?= admin_url('inquiry/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                <i class="fas fa-arrow-left me-2"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
        <?php $this->load->view('partials/_messages');?>
        </div>
        <!-- end page title -->
        <?= form_open_multipart('inquiry/process', 'class="custom-validation"');?>
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">Add New Inquiry</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Middle name</label>
                                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Otto" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom03" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Mobile No.</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control" name="mobile" id="phone_number"
                                            aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="home_phone_number" class="form-label">Alternate Mobile No.</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                        <input type="text" class="form-control" name="opt_mobile" id="home_phone_number"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="email"><i class="fas fa-at"></i></span>
                                        <input type="email" class="form-control" id="validationCustomUsername" name="email"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom03" class="form-label">Address</label>
                                    <textarea class="form-control" id="validationCustom03" name="address"></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gender" class="form-label">Enquiry For</label>
                                    <select class="form-select" name="inquiry_for" id="gender">
                                        <option selected value="">Choose...</option>
                                        <?php if(!empty($catagory_master)):
                                            foreach($catagory_master as $cata):
                                        ?>
                                        <option value="<?= $cata->id;?>"><?= $cata->name;?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="nationality">
                                        <option selected value="">Choose...</option>
                                        <?php if(!empty($status_master)):
                                            foreach($status_master as $status):
                                        ?>
                                        <option value="<?= $status->id;?>"><?= $status->name;?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Inquiry Date</label>
                                    <div class="input-group" id="datepicker2">
                                        <!-- <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                            data-date-autoclose="true" name="inquiry_date" readonly> -->
                                        <input class="form-control" type="date" name="inquiry_date" value="<?php echo date("d-m-Y"); ?>" id="example-date-input">
                                        <!-- <span class="input-group-text"><i class="mdi mdi-calendar"></i></span> -->
                                    </div><!-- input-group -->
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Expected Joining Date</label>
                                    <div class="input-group" id="datepicker2">
                                        <!-- <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                            data-date-autoclose="true" name="expected_joining_date" readonly>
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span> -->
                                        <input class="form-control" type="date" name="expected_joining_date" value="" id="example-date-input">
                                    </div><!-- input-group -->
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom03" class="form-label">Remark</label>
                                    <textarea class="form-control" id="validationCustom03" name="remark"></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end col -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Publish
                    </div>
                    <div class="card-body">
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div> -->
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Save & Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <?= form_close();?>
    </div>
    <!-- container-fluid -->
</div>


                                            
