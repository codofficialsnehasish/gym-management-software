<ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('')?>"  href="<?= admin_url('settings');?>" role="tab">
                                                    <span class="d-none d-md-block">General</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link  <?= tab_active('contact')?>"  href="<?= admin_url('settings/contact');?>" role="tab">
                                                    <span class="d-none d-md-block">Contact</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('social-media')?>"  href="<?= admin_url('settings/social-media');?>" role="tab">
                                                    <span class="d-none d-md-block">Social Media</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                                </a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link"  href="#settings" role="tab">
                                                    <span class="d-none d-md-block">Seo</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('google-recaptcha')?>"  href="<?= admin_url('settings/google-recaptcha');?>" role="tab">
                                                    <span class="d-none d-md-block">Google reCaptcha</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('maintenance-mode')?>"  href="<?= admin_url('settings/maintenance-mode');?>" role="tab">
                                                    <span class="d-none d-md-block">Maintenance Mode
                                                    </span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('custom-css')?>"  href="<?= admin_url('settings/custom-css');?>" role="tab">
                                                    <span class="d-none d-md-block">Custom Css</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('custom-js')?>"  href="<?= admin_url('settings/custom-js');?>" role="tab">
                                                    <span class="d-none d-md-block">Custom Javascript</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link <?= tab_active('cookie-warning')?>"  href="<?= admin_url('settings/cookie-warning');?>" role="tab">
                                                    <span class="d-none d-md-block">Cookies Warning</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                                                </a>
                                            </li> 
                                        </ul>
