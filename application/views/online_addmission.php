<!doctype html>
<html lang="en">

    <head> 
        <meta charset="utf-8">
        <title>Addmission | <?= $this->settings->application_name?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Design & Developed By Code Of Dolphins" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= get_favicon();?>" type="image/png" sizes="16x16">
    
        <!-- Bootstrap Css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="<?= base_url('assets/css/icons.min.css');?>" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="<?= base_url('assets/css/app.min.css');?>" id="app-style" rel="stylesheet" type="text/css">
        <!-- Toast message -->
        <link href="<?= base_url('assets/libs/toast/toastr.css');?>" rel="stylesheet" type="text/css" />
        <!-- Toast message -->
    </head>

    <body class="account-pages">
        <!-- Begin page -->
        <!-- <div class="accountbg" style="background: url('<?= base_url('assets/images/bg.jpg');?>');background-size: cover;background-position: center;"></div> -->

        <div class="m-5">

        <?= form_open_multipart('online-addmission/process', 'class="row g-3 needs-validation" novalidate');?>
      
        <div class="row">
            <div class="col-lg-9">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-4 mb-3">
                              <label for="validationCustom01" class="form-label">First name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->first_name : ''; ?>" name="first_name" id="first_name" placeholder="" required>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="validationCustom02" class="form-label">Middle name</label>
                              <input type="text" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->middle_name : ''; ?>" name="middle_name" id="middle_name" placeholder="">
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="validationCustom03" class="form-label">Last Name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->last_name : ''; ?>" name="last_name" id="last_name" required>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="validationCustomUsername" class="form-label">Contact No. <span class="text-danger">*</span></label>
                              <div class="input-group has-validation">
                                  <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                  <input type="number" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->mobile : ''; ?>" name="phone_number" id="phone_number"
                                      aria-describedby="inputGroupPrepend" required>
                                  <div class="invalid-feedback">
                                      This field is required
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 mb-3">
                              <label for="home_phone_number" class="form-label">Home Contact No.</label>
                              <div class="input-group has-validation">
                                  <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                  <input type="number" class="form-control" value="<?= !empty($inquiry_data) ? $inquiry_data->opt_mobile : ''; ?>" name="home_phone_number" id="home_phone_number"
                                      aria-describedby="inputGroupPrepend">
                                  <div class="invalid-feedback">
                                      This field is required
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="validationCustomUsername" class="form-label">Email</label>
                              <div class="input-group has-validation">
                                  <span class="input-group-text" value="<?= !empty($inquiry_data) ? $inquiry_data->email : ''; ?>" name="email" id="email"><i class="fas fa-at"></i></span>
                                  <input type="text" class="form-control" name="email" id="validationCustomUsername"
                                      aria-describedby="inputGroupPrepend">
                                  <div class="invalid-feedback">
                                      This field is required
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4 mb-3">
                              <label for="gender" class="form-label">Gender</label>
                              <select class="form-select" name="gender" id="gender">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($gender_master)):
                                      foreach($gender_master as $gender):
                                  ?>
                                  <option value="<?= $gender->id;?>"><?= $gender->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label class="form-label">Date of Birth</label>
                              <div class="input-group" id="datepicker2">
                                  <input type="text" class="form-control" placeholder="dd M, yyyy"
                                      data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                      data-date-autoclose="true" name="dob">
              
                                  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                              </div><!-- input-group -->
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-4">
                              <label for="validationCustom04" class="form-label">Nationality</label>
                              <select class="form-select" name="nationality" id="nationality">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($nationality_master)):
                                      foreach($nationality_master as $nationaliy):
                                  ?>
                                      <option value="<?= $nationaliy->id;?>"><?= $nationaliy->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="religion" class="form-label">Religion</label>
                              <select class="form-select" name="religion" id="religion">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($religion_master)):
                                      foreach($religion_master as $relation):
                                  ?>
                                      <option value="<?= $relation->id;?>"><?= $relation->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-3">
                              <label for="marital_status" class="form-label">Marital Status</label>
                              <select class="form-select" name="marital_status" id="marital_status">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($marital_status_master)):
                                      foreach($marital_status_master as $maritalStatus):
                                  ?>
                                      <option value="<?= $maritalStatus->id;?>"><?= $maritalStatus->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-3">
                              <label for="blood_group" class="form-label">Blood Group</label>
                              <select class="form-select" name="blood_group" id="blood_group">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($blood_group_master)):
                                      foreach($blood_group_master as $blood):
                                  ?>
                                  <option value="<?= $blood->id;?>"><?= $blood->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-3">
                              <label for="validationCustom04" class="form-label">Shift</label>
                              <select class="form-select" name="shift_id" id="validationCustom04">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($shift_master)):
                                      foreach($shift_master as $shift):
                                  ?>
                                  <option value="<?= $shift->id;?>"><?= $shift->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>                        
                          <div class="col-md-4">
                              <label for="medical_history" class="form-label">Medical History</label>
                              <select class="form-select" name="medical_history" id="medical_history">
                                  <option selected disabled value="">Choose...</option>
                                  <?php if(!empty($medical_history_master)):
                                      foreach($medical_history_master as $medical):
                                  ?>
                                  <option value="<?= $medical->id;?>"><?= $medical->name;?></option>
                                  <?php 
                                      endforeach;
                                  endif;?>
                              </select>
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div> 
                          <div class="col-md-4">
                              <label for="aadhar_no" class="form-label">Aadhar No.</label>
                              <input type="text" class="form-control" name="aadhar_no" id="aadhar_no">
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>
                          <div class="col-md-4 mb-3">
                              <label for="pan_no" class="form-label">Pan No.</label>
                              <input type="text" class="form-control" name="pan_no" id="pan_no">
                              <div class="invalid-feedback">
                                  This field is required
                              </div>
                          </div>

                          <fieldset class="form-group border p-3 mb-3">
                              <legend class="legendcls">Present Address</legend>
                              <div class="row">
                                  <div class="col-md-3 mb-3">
                                      <label for="validationCustom04" class="form-label">Country</label>
                                      <select class="form-select" name="country_id" id="pr_country_id">
                                          <option selected disabled value="">Choose...</option>
                                          <?php if(!empty($countries)):
                                              foreach($countries as $country):
                                          ?>
                                          <option value="<?= $country->id;?>"><?= $country->name;?></option>
                                          <?php 
                                              endforeach;    
                                          endif;?>
                                      </select>
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="validationCustom04" class="form-label">State</label>
                                      <select class="form-select" name="state_id" id="pr_state_id">
                                          <option selected disabled value="">Choose...</option>
                                      </select>
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="validationCustom04" class="form-label">City</label>
                                      <select class="form-select" name="city_id" id="pr_city_id">
                                          <option selected disabled value="">Choose...</option>
                                      </select>
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="validationCustom03" class="form-label">Pin Code</label>
                                      <input type="text" class="form-control" name="zip_code" id="pr_zip_code">
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <label for="validationCustom03" class="form-label">Address</label>
                                  <textarea class="form-control" id="pr_address" name="address"><?= !empty($inquiry_data) ? $inquiry_data->address : '' ?></textarea>
                                  <div class="invalid-feedback">This field is required</div>
                              </div>
                          </fieldset>

                          <fieldset class="form-group border p-3">
                              <legend class="legendcls">Permanent Address</legend>
                              <div class="mb-3">
                                  <input type="checkbox" id="same_as_present" /> Same as Present Address
                              </div>
                              <div class="row">
                                  <div class="col-md-3 mb-3">
                                      <label for="validationCustom04" class="form-label">Country</label>
                                      <select class="form-select" name="pn_country_id" id="pm_country_id">
                                          <option selected disabled value="">Choose...</option>
                                          <?php if(!empty($countries)):
                                              foreach($countries as $country):
                                          ?>
                                          <option value="<?= $country->id;?>"><?= $country->name;?></option>
                                          <?php 
                                              endforeach;    
                                          endif;?>
                                      </select>
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="validationCustom04" class="form-label">State</label>
                                      <select class="form-select" name="pn_state_id" id="pm_state_id">
                                          <option selected disabled value="">Choose...</option>
                                      </select>
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="validationCustom04" class="form-label">City</label>
                                      <select class="form-select" name="pn_city_id" id="pm_city_id">
                                          <option selected disabled value="">Choose...</option>
                                      </select>
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                                  <div class="col-md-3">
                                      <label for="validationCustom03" class="form-label">Pin Code</label>
                                      <input type="text" class="form-control" name="pn_zip_code" id="pm_zip_code">
                                      <div class="invalid-feedback">This field is required</div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <label for="validationCustom03" class="form-label">Address</label>
                                  <textarea class="form-control" id="pm_address" name="pn_address"><?= !empty($inquiry_data) ? $inquiry_data->address : '' ?></textarea>
                                  <div class="invalid-feedback">This field is required</div>
                              </div>
                          </fieldset>

                      </div>
                  </div>
              </div>
             
          </div>
          <!-- end col -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Image
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-0">
                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                        </div>
                        <div class="mb-0">
                            <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                        </div> 
                    </div>
                </div>
              <div class="card">
                  <div class="card-header bg-primary text-light">
                      Publish
                  </div>
                  <div class="card-body">
                      <div class="col-md-12 mb-3">
                          <label for="member_category_id" class="form-label">Category</label>
                          <select class="form-select" name="member_category_id" id="member_category_id">
                              <option selected disabled value="">Choose...</option>
                              <?php if(!empty($member_categorys)):
                                  foreach($member_categorys as $member_category):
                              ?>
                              <option value="<?= $member_category->id;?>"><?= $member_category->name;?></option>
                              <?php 
                                  endforeach;
                              endif;?>
                          </select>
                          <div class="invalid-feedback">
                              This field is required
                          </div>
                      </div>
                      <div class="mb-0">
                          <div>
                              <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                              Save & Publish
                              </button>
                              <!-- <button type="reset" class="btn btn-secondary waves-effect">
                                  Cancel
                                  </button> -->
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

        <!-- JAVASCRIPT -->
        <script src="<?= base_url('assets/libs/jquery/jquery.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js');?>"></script>
        <script src="<?= base_url('assets/libs/node-waves/waves.min.js');?>"></script>
        <script src="<?= base_url('assets/js/app.js');?>"></script>
            <!-- toast message -->
        <script src="<?= base_url('assets/libs/toast/toastr.js');?>"></script>
        <script src="<?= base_url('assets/js/pages/toastr.init.js');?>"></script>
        <!-- toast message -->
         <script>
            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
            blah.style.display='block';
            blah.src = URL.createObjectURL(file);
            $('#media_id').val('');
            }
            }
         </script>
        <?php PageSpecScript($pagescript);?>
        <?php $this->load->view('partials/ajax'); ?>
        <?php $this->load->view('partials/_messages'); ?>
    </body>
</html>
