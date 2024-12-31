<div class="card">
    <div class="card-body">
        <h4 class="card-title">Documents</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>
    
        <form class="row g-3 custom-validation" id="documentForm" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="user_id" value="<?= $user->id;?>" />
           
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Aadhar No.</label>
                <input type="text" class="form-control" name="aadhar_no" value="<?= $user->aadhar_no; ?>" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Pan No.</label>
                <input type="text" class="form-control" name="pan_no" value="<?= $user->pan_no; ?>" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
           
            <div class="col-md-6 mb-0">
                         
                <div class="mt-4 mt-md-0">
                    <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="<?= get_image($user->aadhar_proof);?>" data-holder-rendered="true" style="display:<?= $user->aadhar_proof!=0?'block':'none';?>">
                </div>
        
                <label class="form-label">Aadhar Card Scan Copy</label>
                <?php if ($this->permission->method('documents', 'update')->access()) { ?>
                <input type="file" name="file" class="filestyle" id="imgInp" data-input="false" data-buttonname="btn-secondary">
                <?php } ?>
            </div>
            <div class="col-md-6 mb-0">
                <div class="mt-4 mt-md-0">
                    <img class="img-thumbnail rounded me-2" id="blah2" alt="" width="200" src="<?= get_image($user->pan_proof);?>" data-holder-rendered="true" style="display:<?= $user->pan_proof!=0?'block':'none';?>">
                </div>
                <label class="form-label">Pancard Scan Copy</label>
                <?php if ($this->permission->method('documents', 'update')->access()) { ?>
                <input type="file" name="file2" class="filestyle" id="imgInp2" data-input="false" data-buttonname="btn-secondary">
                <?php } ?>
            </div>
            <?php if ($this->permission->method('documents', 'update')->access()) { ?>
            <div class="col-12 ">
                <button class="btn btn-primary float-end" type="submit">Save Changes</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
