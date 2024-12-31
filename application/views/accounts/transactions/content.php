<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Transactions</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Transactions</li>
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
                                    <th class="text-wrap">Sl No.</th>
                                    <th class="text-wrap">Transaction Date</th>
                                    <th class="text-wrap">Member Name</th>
                                    <th class="text-wrap">Package Name</th>
                                    <th class="text-wrap">Duration</th>
                                    <th class="text-wrap">Start Date</th>
                                    <th class="text-wrap">End Date</th>
                                    <th class="text-wrap">Gst Type</th>
                                    <th class="text-wrap">Amount</th>
                                    <th class="text-wrap">Payment Mode</th>
                                    <th class="text-wrap">Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; $total_amount=0;
                                foreach($allitems as $item):
                                    $total_amount += $item->payble_amount;
                                ?>
                                <tr>
                                    <td class="text-wrap"><?= $i++ ?></td>
                                    <td class="text-wrap"><?= formated_date($item->created_at,'F d, Y h:i A') ?></td>
                                    <td class="text-wrap"><?= get_user($item->member_id)->full_name ?? '' ?></td>
                                    <td class="text-wrap"><?= get_name('package_master',$item->package_id) ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->duration_in_days ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->start_date ?></td>
                                    <td class="text-wrap"><?= $item->end_date ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->gst_type ?? '' ?></td>
                                    <td class="text-wrap"><?= $item->payble_amount ?? '' ?></td>
                                    <td class="text-wrap"><?= get_name('payment_mode_master',$item->payment_mode) ?? '' ?></td>
                                    <td>
                                        <a href="<?= admin_url('accounts/transactions/invoice/'.$item->id) ?>" class="btn btn-success btn-sm assign">
                                            <i class="mdi mdi-eye" title="Assign Member"></i> Invoice
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-wrap"><strong>Total Amount : <?= $total_amount ?></strong></td>
                                <td></td>
                                <td></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

