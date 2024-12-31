<div class="card">
    <div class="card-body">
        <h4 class="card-title">Change Password</h4>
        <p class="card-title-desc"><?= $user->full_name;?></p>
    
        <form class="row g-3 needs-validation" id="changepasswordform" method="post" novalidate>
            <input type="hidden" name="user_id" value="<?= $user->id; ?>" />  
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Username</label>
                <input type="text" class="form-control" id="validationCustom01" name="user_name" value="<?= $user->username ?>" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom03" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="validationCustom04" name="confirm_password" required>
            </div>
           
          
            <div class="col-12 ">
                <button class="btn btn-primary float-end passBtn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>
