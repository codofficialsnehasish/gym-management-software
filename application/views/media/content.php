<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Media Gallery</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= admin_url();?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Media</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                        <a href="<?= admin_url('media/add-images')?>" class="btn btn-primary  dropdown-toggle" aria-expanded="false">
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
                                    <div class="row">
                                        <?php 
                                        $i=1;
                                        foreach($allmedia as $media):?>
                                        <div class="col-2">
                                            <a class="image-popup-vertical-fit" href="<?= get_image($media->media_id);?>" title="<?= substr($media->file_name, 0, strpos($media->file_name, "."));?>">
                                                <img class="img-fluid" alt="" src="<?= get_image($media->media_id);?>"  width="145">
                                            </a>
                                            <h5 class="font-size-14 m-b-15"><?= substr($media->file_name, 0, strpos($media->file_name, "."));?></h5>
                                        </div>
                                        <?php 
                                    if($i%6==0):
                                        echo '</div><div class="row mt-1">';
                                    endif;
                                    $i++;
                                    endforeach;
                                    ?>
                                    </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>