<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Booking</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Booking</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= admin_url('booking/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
                                        <i class="fas fa-plus me-2"></i> Add New
                                        </a>
                                        </div>
                                    </div>
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
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Booked On</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><a href="<?= admin_url('booking/details/'.$item->id);?>"><?= $item->name;?></a></td>
                                                    <td><?= $item->phone;?> </td>
                                                    <td><?= formated_date($item->start_date);?> </td>
                                                    <td><?= formated_date($item->end_date);?> </td>
                                                    <td><?= formated_date($item->booked_on);?></td>
                                                    <td>
                                                    <a href="<?= admin_url('booking/details/'.$item->id);?>" class="btn btn-success btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                                <i class="fas fa-search" title="Edit"></i>
                                                            </a>
                                                            <a href="<?= admin_url('booking/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'role');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
                                                                <i class="fas fa-trash-alt" title="Remove"></i>
                                                            </a></td>
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