<div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Role</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Role</li>
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
                        <?= form_open_multipart('role-permission/permission', 'class="custom-validation"');?>
                        <div class="row">
                            <div class="col-9">
                                <div class="card">
                                    <div class="card-header bg-primary text-light">
                                        Role
                                    </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Role</label>
                                                <select class="form-control select2" id="role_id" name="role_id">
                                                        <option value="0">Select</option>
                                                        <?php if(!empty($allroles)){
                                                                foreach($allroles as $role){
                                                         ?>
                                                        <option value="<?= $role->id;?>"><?= $role->name;?></option>
                                                        <?php }
                                                        }?>
                                                </select>
                                            </div>
                                        </div>
                                </div>

                                <div class="card">
                                    <div class="card-header bg-primary text-light">
                                     <input type="checkbox" class="form-check-input me-2" onchange="checkAllEntireModule(this)" name="chk[]" id="">     Permission 
                                    </div>
                                        <div class="card-body" id="permissionList">

                                        
                                        </div>
                                </div>
                                
                            </div> <!-- end col -->
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header bg-primary text-light">
                                        Publish
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="mb-0">
                                            <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Save & Publish
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end row -->
                        <?= form_close();?>
                    </div> <!-- container-fluid -->
                </div>