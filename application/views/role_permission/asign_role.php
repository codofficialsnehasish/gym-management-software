<div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Role & Permission</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Asign Role to User</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?= form_open_multipart('role-permission/user-role', 'class="custom-validation" id="asignRoleForm"');?>
                        <div class="row">
                            <div class="col-12">
                              <div class="row">
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header bg-primary text-light">
                                            Role
                                        </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Select User</label>
                                                    <select class="form-control select2" id="user_id" name="user_id">
                                                            <option value="0">Select</option>
                                                            <?php if(!empty($allusers)){
                                                                    foreach($allusers as $user){
                                                            ?>
                                                            <option value="<?= $user->id;?>"><?= $user->full_name;?></option>
                                                            <?php }
                                                            }?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Select Role</label>
                                                    <select class="select2 form-control select2-multiple" id="roleId" name="role_id[]" multiple="multiple" multiple data-placeholder="Choose ...">
                                                            <option value="0">Select</option>
                                                            <?php if(!empty($allroles)){
                                                                    foreach($allroles as $role){
                                                            ?>
                                                            <option value="<?= $role->id;?>"><?= $role->name;?></option>
                                                            <?php }
                                                            }?>
                                                    </select>
                                                </div>
                                                <div class="mb-0">
                                                    <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1 roleBtn">
                                                    Asign Role
                                                    </button>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-header bg-primary text-light">
                                            Role Asigned <span id="userName"></span>
                                        </div>
                                            <div class="card-body" id="userPermissionList">

                                            
                                            </div>
                                    </div>
                                </div>
                             </div>
                            </div> <!-- end col -->
                           

                        </div> <!-- end row -->
                        <?= form_close();?>
                    </div> <!-- container-fluid -->
                </div>