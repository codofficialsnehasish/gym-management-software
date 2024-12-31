<div class="card">
    <div class="card-body">
        <h4 class="card-title">Contact Information</h4>
        <p class="card-title-desc"><?= $userdata->full_name; ?></p>
    
        <form class="row g-3 needs-validation" id="contactInfoForm" method="post" novalidate>
        <input type="hidden" name="user_id" value="<?= $userdata->id; ?>" />
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                    <input type="text" class="form-control" id="validationCustomUsername" name="email" value="<?= $userdata->email; ?>"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Contact No.</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" id="validationCustomUsername" name="phone_number" value="<?= $userdata->phone_number; ?>"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Official Contact No.</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" id="validationCustomUsername" name="official_phone_number" value="<?= $userdata->phone_number; ?>"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
                        <fieldset class="form-group border p-3 mb-3">
                             <legend class="legendcls">Present Address</legend>
                             <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04" class="form-label">Country</label>
                                    <select class="form-select" name="country_id" id="pr_country_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($countries)):
                                            foreach($countries as $country):
                                        ?>
                                        <option value="<?= $country->id;?>" <?= $country->id==$userdata->country_id?'selected':'';?>><?= $country->name;?></option>
                                        <?php 
                                            endforeach;    
                                        endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">State</label>
                                    <select class="form-select" name="state_id" id="pr_state_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($stateData)):
                                            foreach($stateData as $state):
                                        ?>
                                        <option value="<?= $state->id;?>" <?= $state->id==$userdata->state_id?'selected':'';?>><?= $state->name;?></option>
                                        <?php endforeach;endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <select class="form-select" name="city_id" id="pr_city_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($cityData)):
                                            foreach($cityData as $city):
                                        ?>
                                        <option value="<?= $city->id;?>" <?= $city->id==$userdata->city_id?'selected':'';?>><?= $city->name;?></option>
                                        <?php endforeach;endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Pin Code</label>
                                    <input type="text" class="form-control" name="zip_code" id="validationCustom03" value="<?= $userdata->zip_code; ?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                             </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="validationCustom03" required><?= $userdata->address;?></textarea>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        
                        </fieldset>
                        <fieldset class="form-group border p-3">
                             <legend class="legendcls">Permanent Address</legend>
                             <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04" class="form-label">Country</label>
                                    <select class="form-select" name="pn_country_id" id="pm_country_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($countries)):
                                            foreach($countries as $country):
                                        ?>
                                        <option value="<?= $country->id;?>" <?= $country->id==$userdata->pn_country_id?'selected':'';?>><?= $country->name;?></option>
                                        <?php 
                                            endforeach;    
                                        endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">State</label>
                                    <select class="form-select" name="pn_state_id" id="pm_state_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($pmstateData)):
                                            foreach($pmstateData as $pmstate):
                                        ?>
                                        <option value="<?= $pmstate->id;?>" <?= $pmstate->id==$userdata->pn_state_id?'selected':'';?>><?= $pmstate->name;?></option>
                                        <?php endforeach;endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <select class="form-select" name="pn_city_id" id="pm_city_id" required>
                                        <option selected disabled value="">Choose...</option>
                                        <?php if(!empty($pmcityData)):
                                            foreach($pmcityData as $pmcity):
                                        ?>
                                        <option value="<?= $pmcity->id;?>" <?= $pmcity->id==$userdata->pn_city_id?'selected':'';?>><?= $pmcity->name;?></option>
                                        <?php endforeach;endif;?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Pin Code</label>
                                    <input type="text" class="form-control" name="pn_zip_code" id="validationCustom03" value="<?= $userdata->pn_zip_code; ?>" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                             </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <textarea class="form-control" id="validationCustom03" name="pn_address" required><?= $userdata->pn_address;?></textarea>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        
                        </fieldset>
            <?php if ($this->permission->method('contact_information', 'update')->access()) { ?>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
