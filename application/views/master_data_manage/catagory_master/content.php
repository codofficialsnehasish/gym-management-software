<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Catagory Master</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Catagory</li>
                                    </ol>
                                </div>
                                <?php if ($this->permission->method('category_master', 'create')->access()) { ?>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= admin_url('master-manage/catagory-master/add-new')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Visibility</th>
                                                    <th>Created On</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php $i=1;
                                                foreach($allitems as $item):?>
                                                <tr>
                                                    <td><?= $i++;?></td>
                                                    <td><a href="<?= admin_url('master-manage/catagory-master/edit/'.$item->id);?>"><?= $item->name;?></a></td>
                                                    <td><?= check_visibility($item->is_visible);?> </td>
                                                    <td><?= formated_date($item->created_at);?></td>
                                                    <td>
                                                        <?php if ($this->permission->method('category_master', 'update')->access()) { ?>
                                                        <a href="<?= admin_url('master-manage/catagory-master/edit/'.$item->id);?>" class="btn btn-primary btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit this Item">
                                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                                        </a>
                                                        <?php } ?>
                                                        <?php if ($this->permission->method('category_master', 'delete')->access()) { ?>
                                                        <a class="btn btn-danger btn-sm edit" onclick="confirmDelete(this.id,'master-manage/catagory-master');" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item" id="<?= $item->id;?>">
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