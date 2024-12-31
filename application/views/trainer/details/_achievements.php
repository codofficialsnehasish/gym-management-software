<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>Prize Name</th>
                <th>Competition Name</th>
                <th>Date</th>
                <th>Achievements Picture</th>
                <?php if ($this->permission->method('achievements', 'delete')->access()) { ?>
                <th>Action</th>
                <?php } ?>
            </tr>
            </thead>
            <tbody id="achievements">
            </tbody>
        </table>
   </div>
</div>
<?php if ($this->permission->method('achievements', 'create')->access()) { ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Achievements</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="achievementsinfo" method="post" novalidate>
        <input type="hidden" name="trainer_id" value="<?= $this->uri->segment(3); ?>" >
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Prize Name</label>
                <input type="text" class="form-control" name="prize_name" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Competition Name</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="competition_name" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Date</label>
                <div class="input-group" id="datepicker2">
                    <!-- <input type="text" class="form-control" name="date" placeholder="dd M, yyyy"
                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                        data-date-autoclose="true"> -->
                    <input class="form-control" type="date" name="date" value="" id="example-date-input">
                    <!-- <span class="input-group-text"><i class="mdi mdi-calendar"></i></span> -->
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6 mb-0">
                <div class="mt-4 mt-md-0">
                    <img class="img-thumbnail rounded me-2" id="achivementblah" alt="" width="200" src="" data-holder-rendered="true" style="display:none">
                </div>
                <label class="form-label">Achievements Picture (if any)</label>
                <input type="file" name="achivement_picture" class="filestyle" id="achivementimgInp" data-input="false" data-buttonname="btn-secondary">
            </div>

            <div class="col-12">
                <button class="btn btn-primary achieveBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>