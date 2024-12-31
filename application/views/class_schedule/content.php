<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Schedule Class</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Class</li>
                    </ol>
                </div>
                <?php if ($this->permission->method('schedule_class', 'create')->access()) { ?>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                        <a href="<?= admin_url('gym-c-info/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                        <i class="fas fa-plus me-2"></i> Add New
                        </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
                                    <th class="text-wrap">Sl No.</th>
                                    <th class="text-wrap">Class Name</th>
                                    <th class="text-wrap">Trainer Name</th>
                                    <th class="text-wrap">Start Time</th>
                                    <th class="text-wrap">End Time</th>
                                    <th class="text-wrap">Capacity</th>
                                    <th class="text-wrap">Booked</th>
                                    <th class="text-wrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($allitems as $item):
                                ?>
                                <tr>
                                    <td class="text-wrap"><?= $i++ ?></td>
                                    <td class="text-wrap"><?= $item->class_name ?? '' ?></td>
                                    <td class="text-wrap"><?= get_user($item->trainer_id)->full_name ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->start_time ?></td>
                                    <td class="text-wrap"><?= $item->end_time ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->capacity ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->booked ?? '' ?></td>
                                    <td>
                                        <a href="<?= admin_url('gym-c-info/assign-member-in-class/'.$item->id) ?>" class="btn btn-success btn-sm assign">
                                            <i class="mdi mdi-check-bold" title="Assign Member"></i> Assign Member
                                        </a>
                                        <?php if ($this->permission->method('schedule_class', 'update')->access()) { ?>
                                        <a href="<?= admin_url('gym-c-info/edit/'.$item->id);?>" class="btn btn-success btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Member">
                                            <i class="fas fa-pencil-alt" title="Make Member"></i>
                                        </a>
                                        <?php } ?>
                                        <?php if ($this->permission->method('schedule_class', 'delete')->access()) { ?>
                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'gym-c-info');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                            <i class="fas fa-trash-alt" title="Remove"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

