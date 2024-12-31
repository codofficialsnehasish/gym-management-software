<style>
    .inq-container{
        width:100%;
    }
    .inq-row{
        width:100%;
        display:flex;
        flex-wrap:wrap;
    }
    .inq-item{
        width:50%;
        display: flex;
        align-items: center;
    }
    .inq-label{
        color:#000000;
        font-size: 14px;
        width:35%;
        /* font-weight: bolder; */
    }
    .inq-label::after{
    content: ':';
    }
    .inq-value{
        font-size: 14px;
        width:65%;
        padding-left: 10px;
    }
    .form-actions {
        padding: 0!important;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Inquiry</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Inquiry</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" style="padding-left: 69px;">
                        <div id="select_all_frm" name="select_all_frm">
                            <div id="inq-wrapper">
                                <h3 class="short pb-2">Customer Details</h3>
                                <div class="inq-container">
                                    <div class="inq-row">
                                        <div class="inq-item">
                                            <p class="inq-label">Name</p>
                                            <p class="inq-value"><?= $item->full_name; ?></p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Email</p>
                                            <p class="inq-value"><?= $item->email; ?></p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Mobile No</p>
                                            <p class="inq-value"><?= $item->mobile; ?></p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Alternate No</p>
                                            <p class="inq-value"><?= $item->opt_mobile; ?></p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Address</p>
                                            <p class="inq-value"><?= $item->address; ?> </p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Enquiry For</p>
                                            <p class="inq-value"><?= get_name('catagory_master',$item->inquiry_for); ?></p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Inquiry Date</p>
                                            <p class="inq-value"><?= formated_date($item->inquiry_date); ?></p>
                                        </div>
                                        <div class="inq-item">
                                            <p class="inq-label">Follow Up Date</p>
                                            <p class="inq-value"><?= formated_date($item->expected_joining_date); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text text-center" style="font-size:20px !important;">Follow Up History</h1>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Remark</th>
                                    <th>Staff Name (Remark by)</th>
                                    <th>Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($followup as $mass):?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><?= $mass->remark;?></td>
                                    <td>
                                        <?php 
                                            $getuserdata = get_user($mass->user_id); 
                                            echo $getuserdata->full_name.' '.'('.$getuserdata->role.')';
                                        ?>
                                    </td>
                                    <td><?= $mass->created_at;?></td>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td colspan="4" class="text text-center">
                                        <a href="javascript:void(0);" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add Followup Status
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="col-sm-6 col-md-4 col-xl-3">
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <?= form_open_multipart('inquiry/followupProcess', 'class="custom-validation w-100"');?>
                        <input type="hidden" name="inquiry_id" value="<?= $item->id; ?>" id="inquiry_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Followup</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label" for="rmark">Remark / Message</label>
                                    <textarea class="form-control" id="rmark" name="remark" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inqstatus">Inquiry Status</label>
                                    <select class="form-select" name="inqstatus" id="inqstatus" required>
                                        <option selected value="">Choose...</option>
                                        <option value="1">Followup</option>
                                        <option value="0">Not Interested</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="nctfollow">Next Followup Date</label>
                                    <div>
                                        <input class="form-control" type="date" name="next_follow_date" value="" id="nctfollow">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"><i class="mdi mdi-check-bold"></i> Save</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="mdi mdi-cancel"></i> Cancel</button>
                            </div>
                        </div>
                    <?= form_close();?>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
</div>