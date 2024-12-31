<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Inquiry</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Not Interested List</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Alternative Mobile</th>
                                    <th>Closing Date</th>
                                    <th>Last Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($allitems as $item):
                                    $followup_data = get_last_followup_data($item->id);
                                ?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><a href="<?= admin_url('inquiry/inquiryDetails/'.$item->id);?>"><?= $item->full_name;?></a></td>
                                    <td><?= $item->mobile;?></td>
                                    <td><?= $item->opt_mobile;?></td>
                                    <td><?= formated_date($followup_data->created_at);?></td>
                                    <td><?= $followup_data->remark;?></td>
                                    <td>
                                        <a href="<?= admin_url('members/add-new/'.$item->id);?>" class="btn btn-success btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Member">
                                        <i class="mdi mdi-check-bold" title="Make Member"></i> Make Member
                                        </a>
                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'inquiry');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        
    </div>
</div>