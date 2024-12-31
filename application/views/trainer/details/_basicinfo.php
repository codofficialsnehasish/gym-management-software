<div class="card">
    <div class="card-body">
    <!-- <button type="button" class="btn btn-outline-info waves-effect waves-light float-end">Download Profile</button> -->
        <h4 class="card-title">Basic Information</h4>
        <p class="card-title-desc"><?= $userdata->full_name; ?></p>
    
        <form class="row g-3 needs-validation" id="basicInfoForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $userdata->id; ?>" />
            <div class="col-md-12">
                <input class="form-check form-switch" type="checkbox" id="switch4" name="status" switch="success"  <?= check_uncheck(1,$userdata->status);?> value="1" />
                <label class="form-label" for="switch4" data-on-label="Active" data-off-label="Inactive"></label>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" name="first_name" value="<?= $userdata->first_name; ?>" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Middle name</label>
                <input type="text" class="form-control" id="validationCustom02" name="middle_name" value="<?= $userdata->middle_name; ?>" placeholder="">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" name="last_name" value="<?= $userdata->last_name; ?>" placeholder="" required>
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
                <label class="form-label">Date of Joining</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true" name="date_of_joining" value="<?= formated_date($trainer->date_of_joining,'d M, Y');?>" readonly>

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
                <label class="form-label">Date of Leaving</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" name="date_of_leaving" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true" value="<?= $trainer->date_of_leaving!=null?formated_date($trainer->date_of_leaving,'d M, Y'):'';?>"  readonly>

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender" required>
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
            <div class="col-md-4">
                <label class="form-label">Date of Birth</label>
                <div class="input-group" id="datepicker2">
                    <input type="text" class="form-control" name="dob" placeholder="dd M, yyyy" value="<?= formated_date($userdata->dob,'d M, Y'); ?>"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true" readonly>

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Religion</label>
                <select class="form-select" name="religion" id="validationCustom04" required>
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
                <select class="form-select" name="marital_status" id="validationCustom04" required>
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
                <select class="form-select" name="blood_group" id="validationCustom04" required>
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
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Nationality</label>
                <select class="form-select" name="nationality" id="validationCustom04" required>
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
          
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Shift</label>
                <select class="form-select" id="validationCustom04" name="shift_id" required>
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
            <!-- <div class="col-md-3">
                <label class="form-label mb-3 d-flex">Status</label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                    <label class="form-check-label" for="customRadioInline1">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                    <label class="form-check-label" for="customRadioInline2">Inactive</label>
                </div>
            </div> -->
           
           
            <?php if ($this->permission->method('basic_information', 'update')->access()) { ?>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
