<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>Bank Name</th>
                <th>Account Number</th>
                <th>IFSC</th>
                <?php if ($this->permission->method('bank_account', 'delete')->access()) { ?>
                <td>Action</td>
                <?php } ?>
            </tr>
            </thead>
            <tbody id="bankaccounts">
            </tbody>
        </table>
   </div>
</div>
<?php if ($this->permission->method('bank_account', 'create')->access()) { ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Bank Account</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 custom-validation" id="bank_account" method="post" novalidate>
        <input type="hidden" name="trainer_id" value="<?= $this->uri->segment(3); ?>" >
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Bank Name</label>
                <input type="text" class="form-control" name="bank_name" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Account Number</label>
                <div class="input-group has-validation">
                    <input type="number" class="form-control" name="account_number" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">IFSC</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="ifsc_code" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary bankBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>