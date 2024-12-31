<div class="card">
    <div class="card-body">
    <button type="button" class="btn btn-outline-info waves-effect waves-light float-end">Download Profile</button>
        <h4 class="card-title">Validation type</h4>
        <p class="card-title-desc">Super Admin</p>
    
        <form class="row g-3 needs-validation" method="post" novalidate>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" value="<?= $userdata->first_name; ?>" id="validationCustom01" placeholder="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" value="<?= $userdata->last_name; ?>" id="validationCustom02" placeholder="Otto" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Employee Id</label>
                <input type="text" class="form-control" value="emp<?= $userdata->id; ?>" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                    <input type="text" class="form-control" id="validationCustomUsername" value="<?= $userdata->username; ?>"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                    <input type="text" class="form-control" id="validationCustomUsername" value="<?= $userdata->email; ?>"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Department</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div> -->
            <!-- <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Secton</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Designation</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div> -->
            <div class="col-md-4">
                <label class="form-label">Date of Joining</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true">

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
                <label class="form-label">Date of Leaving</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true">

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Gender</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($gender_master)):
                        foreach($gender_master as $gender):
                    ?>
                    <option value="<?= $gender->id;?>" <?= $gender->id == $userdata->gender ? 'selected':''; ?>><?= $gender->name;?></option>
                    <?php endforeach; endif; ?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Religion</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($religion_master)):
                        foreach($religion_master as $relation):
                    ?>
                        <option value="<?= $relation->id;?>" <?= $relation->id == $userdata->religion ? 'selected':''; ?>><?= $relation->name;?></option>
                    <?php endforeach; endif;?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Marital Status</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($marital_status_master)):
                        foreach($marital_status_master as $maritalStatus):
                    ?>
                        <option value="<?= $maritalStatus->id;?>" <?= $maritalStatus->id == $userdata->marital_status ? 'selected':''; ?>><?= $maritalStatus->name;?></option>
                    <?php endforeach; endif; ?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Blood Group</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($blood_group_master)):
                        foreach($blood_group_master as $blood):
                    ?>
                        <option value="<?= $blood->id;?>" <?= $blood->id == $userdata->blood_group ? 'selected':''; ?>><?= $blood->name;?></option>
                    <?php endforeach; endif;?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-4">
                <label for="medical_history" class="form-label">Medical History</label>
                <select class="form-select" name="medical_history" id="medical_history" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($medical_history_master)):
                        foreach($medical_history_master as $medical):
                    ?>
                    <option value="<?= $medical->id;?>" <?= $medical->id == $userdata->blood_group ? 'selected':''; ?>><?= $medical->name;?></option>
                    <?php 
                        endforeach;
                    endif;?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Nationality</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($nationality_master)):
                        foreach($nationality_master as $nationaliy):
                    ?>
                        <option value="<?= $nationaliy->id;?>" <?= $nationaliy->id == $userdata->nationality ? 'selected':''; ?>><?= $nationaliy->name;?></option>
                    <?php endforeach; endif;?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Contact No.</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" value="<?= $userdata->phone_number; ?>" id="validationCustomUsername"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Date of Birth</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" placeholder="dd M, yyyy" value="<?= $userdata->dob; ?>"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true">

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Office Shift</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($shift_master)):
                        foreach($shift_master as $shift):
                    ?>
                        <option value="<?= $shift->id;?>" <?= $shift->id == $trainerdata->shift_id ? 'selected':''; ?>><?= get_name("shift_master",$shift->id);?></option>
                    <?php endforeach; endif;?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <!-- <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Reports To</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Leave Category</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Official Contact No.</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" id="validationCustomUsername"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div> -->
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Aadhar No.</label>
                <input type="text" class="form-control" value="<?= $userdata->aadhar_no; ?>" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Pan No.</label>
                <input type="text" class="form-control" id="validationCustom03" value="<?= $userdata->pan_no; ?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Country</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <?php if(!empty($countries)):
                        foreach($countries as $country):
                    ?>
                    <option value="<?= $country->id;?>" <?= $country->id == $userdata->country_id ? 'selected':''; ?>><?= $country->name;?></option>
                    <?php endforeach;endif; ?>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">State</label>
                <select class="form-select" id="pr_state_id" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">City</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>...</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Pin Code</label>
                <input type="text" class="form-control" value="<?= $userdata->zip_code; ?>" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Address</label>
                <textarea class="form-control" id="validationCustom03" required><?= $userdata->address; ?></textarea>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
