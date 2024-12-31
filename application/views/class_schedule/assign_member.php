<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Schedule Class</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url('')?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= admin_url('gym-c-info')?>">Schedule Class</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Assign Members</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <a href="<?= admin_url('gym-c-info/')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                <i class="fas fa-arrow-left me-2"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-1">
        <?php $this->load->view('partials/_messages');?>
        </div>
        <!-- end page title -->
        <?= form_open_multipart('gym-c-info/process-assign', 'class="custom-validation"');?>
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <input type="hidden" name="class_id" value="<?= $class_id ?>">
                    <div class="card-header bg-primary text-light">Assign Members</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Choose Member</label>
                                    <select class="select2 form-control select2-multiple" id="members-select" name="member_ids[]" multiple="multiple" multiple data-placeholder="Choose ...">
                                        <?php foreach($members as $member): ?>
                                        <option value="<?= $member->id ?>"><?= $member->full_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>                
                            </div>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-wrap">Sl No.</th>
                                        <th class="text-wrap">Member Name</th>
                                        <th class="text-wrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                    if(!empty($assign_members)):
                                    foreach($assign_members as $assign_member):
                                    ?>
                                    <tr>
                                        <td class="text-wrap"><?= $i++ ?></td>
                                        <td class="text-wrap"><?= get_user($assign_member->member_id)->full_name ?? '' ?></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure?')" href="<?= admin_url('gym-c-info/delete-assign-member/'.$assign_member->id) ?>" class="btn btn-danger btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item">
                                                <i class="fas fa-trash-alt" title="Remove"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif;?>
                                </tbody>
                            </table>
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


                                            
