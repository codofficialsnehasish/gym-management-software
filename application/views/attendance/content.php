<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Attendance</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Attendance</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <?php if ($this->permission->method('attendance', 'create')->access()) { ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('attendance/generate-attendance-report', 'class="row g-3 needs-validation" novalidate');?>
                            <div class="row">
                                <div class="mb-0 col-md-4">
                                    <label class="form-label">Search Using Date</label>
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" required name="start_date" placeholder="Start Date" value="<?= $start_date ?? date('Y-m-d') ?>" autocomplete="off" />
                                        <input type="text" class="form-control" required name="end_date" placeholder="End Date" value="<?= $end_date?? date('Y-m-d') ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="mb-0 col-md-4">
                                    <label class="form-label">Choose Member</label>
                                    <select class="form-control select2" name="attendance_member_id">
                                        <option value selected disabled>Select...</option>
                                        <?php foreach($attendance_members as $attendance_member){ ?>
                                        <option value="<?= $attendance_member->employee_code ?>"><?= $attendance_member->employee_name ?>(<?= $attendance_member->employee_code; ?>)</option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                <div class="col-md-4" style="margin-top: 29px !important;">
                                    <button class="btn btn-primary" type="submit">Search Report</button>
                                </div>
                            </div>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('attendance/process', 'class="row g-3 needs-validation" novalidate');?>
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="form-label">Import CSV File </label>
                                    <input type="file" name="file" class="filestyle" data-buttonname="btn-secondary">
                                </div>
                                <div class="col-md-2" style="margin-top: 29px !important;">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-wrap">Date</th>
                                    <th class="text-wrap">Name</th>
                                    <th class="text-wrap">Shift</th>
                                    <th class="text-wrap">In Time</th>
                                    <th class="text-wrap">Out Time</th>
                                    <th class="text-wrap">Duration</th>
                                    <th class="text-wrap">Late By</th>
                                    <th class="text-wrap">Early By</th>
                                    <th class="text-wrap">Status</th>
                                    <th class="text-wrap">Punch Records</th>
                                    <th class="text-wrap">Overtime</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=1;
                                if(!empty($allitems)):
                                foreach($allitems as $item):
                                ?>
                                <tr>
                                    <td><?= $item->date;?></td>
                                    <td><?= $item->employee_name; ?> (<?= $item->employee_code; ?>) </td>
                                    <td><?= $item->shift; ?></td>
                                    <td><?= $item->in_time; ?></td>
                                    <td><?= $item->out_time; ?></td>
                                    <td><?= $item->duration; ?></td>
                                    <td><?= $item->late_by; ?></td>
                                    <td><?= $item->early_by; ?></td>
                                    <td><?= $item->status; ?></td>
                                    <td><?= $item->punch_records; ?></td>
                                    <td><?= $item->overtime; ?></td>
                                </tr>
                                <?php endforeach; endif; ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>