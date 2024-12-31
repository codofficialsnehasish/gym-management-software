<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box" style="background:none;">
                            <a href="<?= base_url();?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= get_logo();?>" alt="" height="70" style="width: 200px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= get_logo();?>" alt="" height="70" style="width: 200px;">
                                </span>
                            </a>

                            <a href="<?= base_url();?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= get_logo();?>" alt="" height="50" style="width: 40px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= get_logo();?>" alt="" height="70" style="width: 200px;">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <div class="d-none d-sm-block">
                            <div class="dropdown pt-3 d-inline-block">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Create <i class="mdi mdi-chevron-down"></i>
                                    </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                          <!-- App Search-->
                         
                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/users/user-4.jpg');?>"
                                    alt="Header Avatar">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <?php
                                    $roles = get_role_by_user_id($this->auth_user->id);
                                    $link = '#';
                                    if (has_role($roles, 'Member')) {
                                        $link = admin_url('members/details/'.$this->auth_user->id);
                                    }
                                    if (has_role($roles, 'Trainer')) {
                                        $link = admin_url('trainer/details/'.$this->auth_user->id);
                                    }
                                ?>
                                <a class="dropdown-item" href="<?= $link ?>"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                                <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 align-middle me-1"></i> My Wallet</a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> Settings<span class="badge bg-success ms-auto">11</span></a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> Lock screen</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?= base_url('dashboard/logout');?>"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                       
            
                    </div>
                </div>
            </header>
