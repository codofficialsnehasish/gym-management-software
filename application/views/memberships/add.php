<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Membership</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= admin_url('membership')?>">Membership</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Membership</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="<?= admin_url('membership/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                <i class="fas fa-arrow-left me-2"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
        <?php $this->load->view('partials/_messages');?>
        </div>
        <!-- end page title -->
        <?= form_open_multipart('membership/process', 'class="custom-validation"');?>
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Add New Membership
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="member" class="form-label">Choose Member</label>
                                <select class="form-select select2" name="member_id" id="member" required>
                                    <option selected value="">Choose...</option>
                                    <?php if(!empty($members)):
                                        foreach($members as $member):
                                    ?>
                                    <option value="<?= $member->id; ?>"><?= $member->full_name;?> | <?= subscription_status($member->id) ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input class="form-check-input" type="checkbox" name="is_continue" id="is-continue-charge" value="1">
                                <label class="form-check-label" for="is-continue-charge">
                                    Add Continue Charge?
                                </label>
                                <select class="form-select mt-2" id="continueChargeSection" name="continue_charge_id" style="display: none;">
                                    <option selected disabled value>Choose...</option>
                                    <?php if (!empty($continue_charges)) :
                                        foreach ($continue_charges as $continue_charge) :
                                    ?>
                                    <option value="<?= $continue_charge->id; ?>"><?= $continue_charge->name; ?></option>
                                    <?php
                                        endforeach;
                                    endif; ?>
                                </select>
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>    
                            <div class="col-md-4 mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="<?= date('Y-m-d') ?>" id="start_date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="package_id" class="form-label">Gst Type</label>
                                <select class="form-select" name="gstType" id="gstType" onchange="calculateGst();" required>
                                    <option value="0">Not Applicable</option>
                                    <option value="included">Included</option>
                                    <option value="excluded">Excluded</option>
                                    </select>
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="package_id" class="form-label">Package</label>
                                <select class="form-select" name="package_id" id="package_id" required>
                                    <option selected disabled value="">Choose...</option>
                                    <?php if(!empty($package_master)):
                                        foreach($package_master as $package):
                                    ?>
                                    <option value="<?= $package->id;?>"><?= $package->name;?></option>
                                    <?php 
                                        endforeach;
                                    endif;?>
                                </select>
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03" class="form-label">Duration in Days</label>
                                <input type="text" class="form-control disbld" name="duration" id="duration" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03" class="form-label">Amount</label>
                                <input type="text" class="form-control disbld" name="amount" id="amount" readonly>
                                <input type="hidden" id="hdnAmount" value="" />
                                <small class="text-danger" id="gstText" style="display:none;"></small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03" class="form-label">Gst Amount</label>
                                <input type="text" class="form-control disbld" name="gstAmount" id="gstAmount" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03" class="form-label">Payable Amount</label>
                                <input type="text" class="form-control payableAmount" name="payableAmount" id="payableAmount" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom04" class="form-label">Payment Mode</label>
                                <select class="form-select" id="validationCustom04" name="payment_mode" required>
                                    <option selected disabled value="">Choose...</option>
                                    <?php if(!empty($payment_mode_master)):
                                        foreach($payment_mode_master as $paymentmode):
                                    ?>
                                    <option value="<?= $paymentmode->id;?>"><?= $paymentmode->name;?></option>
                                    <?php 
                                        endforeach;
                                    endif;?>
                                </select>
                                <div class="invalid-feedback">
                                    This field is required
                                </div>
                            </div>               
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Publish
                    </div>
                    <div class="card-body">
                     <!-- <div class="mb-3">
                        <label class="form-label mb-3 d-flex">Visiblity</label>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline1" name="is_visible" class="form-check-input" value="1" checked>
                           <label class="form-check-label" for="customRadioInline1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input type="radio" id="customRadioInline2" name="is_visible" class="form-check-input" value="0">
                           <label class="form-check-label" for="customRadioInline2">Hide</label>
                        </div>
                     </div> -->
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Save & Publish</button>
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
    <!-- container-fluid -->
</div>


<script>
    // JavaScript to toggle visibility of the dropdown section
    document.getElementById('invalidCheck1').addEventListener('change', function () {
        const section = document.getElementById('continueChargeSection');
        if (this.checked) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
</script>
                                            
