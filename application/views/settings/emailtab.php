<ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('')?>"  href="<?= admin_url('email-settings');?>" role="tab">
                                                    <span class="d-none d-md-block">General</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link  <?= tab_active('contact-email-settings')?>"  href="<?= admin_url('email-settings/contact-email-settings');?>" role="tab">
                                                    <span class="d-none d-md-block">Contact</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('product-email-settings')?>"  href="<?= admin_url('email-settings/product-email-settings');?>" role="tab">
                                                    <span class="d-none d-md-block">Product</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link"  href="#settings" role="tab">
                                                    <span class="d-none d-md-block">Seo</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('register-email-settings')?>"  href="<?= admin_url('email-settings/register-email-settings');?>" role="tab">
                                                    <span class="d-none d-md-block">Register</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                           
                                        </ul>
