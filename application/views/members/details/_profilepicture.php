<div class="card">
    <div class="card-body">
        <h4 class="card-title">Profie Picture</h4>
         <p class="card-title-desc"><?= $user->full_name;?></p>
        <div class="row">
            <div class="col-md-6">
                <div class="mt-4 mt-md-0">
                    <img class="rounded-circle avatar-xl" alt="200x200" src="<?= get_image($user->user_image);?>" data-holder-rendered="true">
                </div>
            </div>
            <?php if ($this->permission->method('profile_picture', 'update')->access()) { ?>
            <div class="col-md-6">
            <?= form_open_multipart('members/profilepicture', array('class' => 'dropzone'));?>    
                <input type="hidden" name="user_id" value="<?= $user->id;?>" />    
                <div class="fallback">
                    <input name="profile_picture" type="file" >
                </div>

                <div class="dz-message needsclick">
                    <div class="mb-3">
                        <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                    </div>
                    
                    <h4>Drop files here or click to upload.</h4>
                </div>
            <?= form_close();?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>