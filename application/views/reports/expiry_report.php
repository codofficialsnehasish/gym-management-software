<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Report</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Expiry Report</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('report/expire-report/generate-expiry-report', 'class="row g-3 needs-validation" novalidate');?>
                            <div class="row">
                                <div class="mb-0 col-md-10">
                                    <label class="form-label">Search Using Date</label>
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" required name="start_date" placeholder="Start Date" value="<?= $start_date ?? date('Y-m-d') ?>" autocomplete="off" />
                                        <input type="text" class="form-control" required name="end_date" placeholder="End Date" value="<?= $end_date?? date('Y-m-d') ?>" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 29px !important;">
                                    <button class="btn btn-primary" type="submit">Search Report</button>
                                </div>
                            </div>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-wrap">Sl No.</th>
                                    <th class="text-wrap">Membership No</th>
                                    <th class="text-wrap">Name</th>
                                    <th class="text-wrap">Contact No</th>
                                    <th class="text-wrap">Category</th>
                                    <th class="text-wrap">Joining Date</th>
                                    <th class="text-wrap">Activation Date</th>
                                    <th class="text-wrap">Expire Date</th>
                                    <th class="text-wrap">Days Left</th>
                                    <th class="text-wrap">Bill Amount</th>
                                    <th class="text-wrap">Continue Charge</th>
                                    <th class="text-wrap">Status</th>
                                    <th class="text-wrap">Pay Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($allitems as $item):
                                    $user = get_user($item->member_id ?? $item->user_id );
                                    $package = get_package($item->package_id);
                                ?>
                                <tr>
                                    <td class="text-wrap"><?= $i++ ?></td>
                                    <td class="text-wrap"><?= $package->name ?? '' ?><?= !empty($package->name) ? '-'.$user->id : '' ?> </td>
                                    <td class="text-wrap"><?= $user->full_name ?? '' ?> <a style="color:green;" href="https://wa.me/<?= $user->phone_number ?>"><i class="fab fa-whatsapp-square"></i> Whatsapp</a></td>
                                    <td class="text-wrap"><?= $user->phone_number ?></td>
                                    <td class="text-wrap"><?= $package->name ?? '' ?></td>
                                    <td class="text-wrap"><?= !empty($user->created_at) ? formated_date($user->created_at) : '' ?></td>
                                    <td class="text-wrap"><?= !empty($item->start_date) ? formated_date($item->start_date) : '' ?></td>
                                    <td class="text-wrap"><?= !empty($item->end_date) ? formated_date($item->end_date) : '' ?></td>
                                    <td class="text-wrap"><?= days_diff($item->start_date,$item->end_date)  ?></td>
                                    <td class="text-wrap"><?= $item->payble_amount ?></td>
                                    <td class="text-wrap"><?= $item->continue_charge_amount ?></td>
                                    <td class="text-wrap"><strong><?= checkSubscriptionStatus($item->start_date,$item->end_date) ?></strong></td>
                                    <td class="text-wrap"><?= formated_date($item->created_at) ?></td>
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