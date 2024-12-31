<div class="card">
    <div class="card-body">
    <!-- <button type="button" class="btn btn-outline-info waves-effect waves-light float-end">Download Profile</button> -->
        <h4 class="card-title">Salary Configuration</h4>
        <p class="card-title-desc"><?= $userdata->full_name;?></p>
        <div class="col-md-12">
            <form class="row g-3 custom-validation" id="salaryconfigForm" method="post" novalidate>
                <input type="hidden" name="user_id" value="<?= $userdata->id; ?>" />
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Base Salary (per month)</label>
                        <input type="number" step="0.01" class="form-control" id="baseSalary" placeholder="0.00" name="base_salary" value="<?= !empty($salary_config->base_salary) ? $salary_config->base_salary : '' ;?>" required onkeyup="calculatePayingInHand()">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">PF (Provident Fund) Contribution (% of base salary)</label>
                        <input type="number" class="form-control" id="pfContribution" placeholder="0.00"  name="provident_fund" value="<?= !empty($salary_config->base_salary) ? $salary_config->provident_fund : '' ;?>" onkeyup="calculatePayingInHand()">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Health Insurance Deduction (per month)</label>
                        <input type="number" class="form-control" id="healthInsurance" placeholder="0.00"  name="health_insurance" value="<?= !empty($salary_config->health_insurance) ? $salary_config->health_insurance : '' ;?>" onkeyup="calculatePayingInHand()">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Income Tax Withholding (per month)</label>
                        <input type="number" class="form-control" id="incomeTax" placeholder="0.00"  name="income_tax" value="<?= !empty($salary_config->income_tax) ? $salary_config->income_tax : '' ;?>" onkeyup="calculatePayingInHand()">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Other Deductions (per month)</label>
                        <input type="number" class="form-control" id="otherDeductions" placeholder="0.00"  name="other_deductions" value="<?= !empty($salary_config->other_deductions) ? $salary_config->other_deductions : '' ;?>" onkeyup="calculatePayingInHand()">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="display: flex;align-items: center;">
                    <div class="mb-3 col-md-12">
                        <label for="validationCustom02" class="form-label">Paying In Hand (per month)</label>
                        <input type="number" class="form-control" id="payingInHand" placeholder="0.00"  name="paying_in_hand" value="<?= !empty($salary_config->paying_in_hand) ? $salary_config->paying_in_hand : '' ;?>" readonly>
                        <label class="text-danger pt-1">This Field is Auto Genetarted</label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <?php if ($this->permission->method('salary_configuration', 'update')->access()) { ?>
                <div class="col-12">
                    <button class="btn btn-primary sinfoBtn" type="submit">Save Changes</button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>


<script>
    function calculatePayingInHand() {
        var baseSalary = parseFloat(document.getElementById('baseSalary').value) || 0;
        console.log(baseSalary);
        var pfContribution = parseFloat(document.getElementById('pfContribution').value) || 0;
        var healthInsurance = parseFloat(document.getElementById('healthInsurance').value) || 0;
        var incomeTax = parseFloat(document.getElementById('incomeTax').value) || 0;
        var otherDeductions = parseFloat(document.getElementById('otherDeductions').value) || 0;

        var totalDeductions = pfContribution + healthInsurance + incomeTax + otherDeductions;
        var payingInHand = baseSalary - totalDeductions;

        document.getElementById('payingInHand').value = payingInHand.toFixed(2);
    }
    calculatePayingInHand();
</script>
