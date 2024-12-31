<div class="card">
    <div class="card-body">
    <h4 class="card-title">Weight Chart</h4>
    <p class="card-title-desc"><?= $user->full_name;?></p>
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Weight</th>
                    <th>Recorded At</th>
                    <th>Remarks</th>
                    <?php if ($this->permission->method('weight_chart', 'delete')->access()) { ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody id="weightchartdata"></tbody>
        </table>
   </div>
</div>
<?php if ($this->permission->method('weight_chart', 'create')->access()) {  ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Weight Chart</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="member_weight_logs" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(3); ?>" >
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Weight</label>
                <input type="number" step="0.01" class="form-control" name="weight" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Recorded At</label>
                <div class="input-group has-validation">
                    <input type="date" class="form-control" id="validationCustomUsername" name="recorded_at"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Remarks</label>
                <div class="input-group has-validation">
                    <textarea class="form-control" name="remarks" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend"></textarea>
                    <div class="invalid-feedback">
                        Please choose a remarks.
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