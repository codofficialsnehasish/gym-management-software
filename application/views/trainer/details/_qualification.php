<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Board/University</th>
                    <th>Subject</th>
                    <th>Passing Year</th>
                    <th>Percentage</th>
                    <?php if ($this->permission->method('qualification', 'delete')->access()) { ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="qualificationdata"></tbody>
        </table>
   </div>
</div>
<?php if ($this->permission->method('qualification', 'create')->access()) { ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Qualification</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="qualification" method="post" novalidate>
            <input type="hidden" name="trainer_id" value="<?= $this->uri->segment(3); ?>" >
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Qualification</label>
                <input type="text" class="form-control" name="qualification" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Board/University</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="validationCustomUsername" name="board_university"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Subject</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="subject" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Passing Year</label>
                <div class="input-group has-validation">
                    <input class="form-control" type="month" name="passing_year" value="" id="example-month-input" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Percentage</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="percentage" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary qinfoBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>