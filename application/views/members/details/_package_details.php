<style>

    .disbld{
        background-color: #ededed !important;
    }
</style>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Package Details</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>
        <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Joining Date</th>
                    <th>Activation Date</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody id="packagedata"></tbody>
            <!-- <tbody>
                <tr>
                    <td><?php // $packageData[0]->name??'';?></td>
                    <td><?php // $packageData[0]->duration??''?> <?php //$packageData[0]->duration_type??''?></td>
                    <td><?php // $packageData[0]->amount??'';?></td>
                    <td><?php // formated_date($member->date_of_joining)??'';?></td>
                    <td><?php // !empty($packageData[0]->duration)?formated_date(get_expiryDate($member->date_of_joining,$packageData[0]->duration)):'';;?></td>
                
                </tr>
            </tbody> -->
        </table>
   </div>
</div>
<?php if ($this->permission->method('package_details', 'create')->access()) { ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add New Package</h4>
        <p class="card-title-desc">&nbsp;</p>
        <form class="row g-3 needs-validation" id="packageForm" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $this->uri->segment(3);?>" />
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Package</label>
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
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Duration</label>
                <input type="text" class="form-control disbld" name="duration" id="duration" readonly>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Amount</label>
                <div class="input-group has-validation">
              
                    <input type="text" class="form-control disbld" name="amount" id="amount" readonly>
                    <input type="hidden" id="hdnAmount" value="" />
                      
                </div>
                <small class="text-danger" id="gstText" style="display:none;"></small>
            </div>
            <div class="col-md-3">
                <label for="validationCustomUsername" class="form-label">Gst Type</label>
                <div class="input-group has-validation">
                    <select class="form-select" name="gstType" id="gstType" onchange="calculateGst();" required>
                        <option value="0">Not Applicable</option>
                        <option value="included">Included</option>
                        <option value="excluded">Excluded</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustomUsername" class="form-label">Gst Amount</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control disbld" name="gstAmount" id="gstAmount" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Payable Amount</label>
                     <input type="text" class="form-control payableAmount" name="payableAmount" id="payableAmount" readonly>
            </div>
            <div class="col-md-3">
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
            </div>
            
            <div class="col-12">
                <button class="btn btn-primary packageBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>