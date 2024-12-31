<style>
    .legendcls{
    font-size: 1rem !important;
    float: none !important;
    width: auto !important;
    padding: 0px !important;
    }
</style>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Body Measurement</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>
    
        <form class="row g-3 custom-validation" id="bodymeasurementForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(3);?>" />
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <div class="input-group" id="datepicker22">
                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" name="dated" data-date-container='#datepicker22' data-provide="datepicker"
                        data-date-autoclose="true" value="<?= formated_date(date('Y-m-d'),'d M, Y');?>" readonly>

                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div><!-- input-group -->
            </div>

         
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Neck</label>
                <input type="text" class="form-control" name="neck" id="validationCustom03" value="<?= $bodymeasurement->neck??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Left Arm</label>
                <input type="text" class="form-control" name="left_arm" id="validationCustom03" value="<?= $bodymeasurement->left_arm??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Right Arm</label>
                <input type="text" class="form-control" name="right_arm" id="validationCustom03" value="<?= $bodymeasurement->right_arm??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Chest</label>
                <input type="text" class="form-control" name="chest" id="validationCustom03" value="<?= $bodymeasurement->chest??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Upper Waist</label>
                <input type="text" class="form-control" name="upper_waist" id="validationCustom03" value="<?= $bodymeasurement->upper_waist??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
             <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Lower Waist</label>
                <input type="text" class="form-control" name="lower_waist" id="validationCustom03" value="<?= $bodymeasurement->lower_waist??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Hips</label>
                <input type="text" class="form-control" name="hips" id="validationCustom03" value="<?= $bodymeasurement->hips??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Left Thigh</label>
                <input type="text" class="form-control" name="left_thigh" id="validationCustom03" value="<?= $bodymeasurement->left_thigh??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Right Thigh</label>
                <input type="text" class="form-control" name="right_thigh" id="validationCustom03" value="<?= $bodymeasurement->right_thigh??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Calf</label>
                <input type="text" class="form-control" name="calf" id="validationCustom03" value="<?= $bodymeasurement->calf??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Weight</label>
                <input type="text" class="form-control" name="weight" id="validationCustom03" value="<?= $bodymeasurement->weight??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Height</label>
                <input type="text" class="form-control" name="height" id="validationCustom03" value="<?= $bodymeasurement->height??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Shoulders</label>
                <input type="text" class="form-control" name="shoulders" id="validationCustom03" value="<?= $bodymeasurement->shoulders??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Body Fat Percentage</label>
                <input type="text" class="form-control" name="body_fat_percentage" id="validationCustom03" value="<?= $bodymeasurement->body_fat_percentage??'';?>"  required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Visceral Fat</label>
                <input type="text" class="form-control" name="visceral_fat" id="validationCustom03" value="<?= $bodymeasurement->visceral_fat??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Subcutaneous Fat</label>
                <input type="text" class="form-control" name="subcutaneous_fat" id="validationCustom03" value="<?= $bodymeasurement->subcutaneous_fat??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">BMI</label>
                <input type="text" class="form-control" name="bmi" id="validationCustom03" value="<?= $bodymeasurement->bmi??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">BMR</label>
                <input type="text" class="form-control" name="bmr" id="validationCustom03" value="<?= $bodymeasurement->bmr??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom03" class="form-label">Muscle Mass Percentage</label>
                <input type="text" class="form-control" name="muscle_mass_percentage" id="validationCustom03" value="<?= $bodymeasurement->muscle_mass_percentage??'';?>" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Remarks</label>
                <textarea class="form-control" id="validationCustom03" name="remarks"  required><?= $bodymeasurement->remarks??'';?></textarea>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <?php if ($this->permission->method('body_measurement', 'update')->access()) { ?>
            <div class="col-12">
                <button class="btn btn-primary bmBtn" type="submit">Save Changes</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
