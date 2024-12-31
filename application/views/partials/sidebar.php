            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">
                
                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="<?= base_url('dashboard');?>" class="waves-effect <?= active_link('dashboard');?>">
                                    <i class="ti-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            
                            <?php
                                $segment='';
                                $rolesegment='';
                                if($this->uri->segment(1)=='settings'){$segment='settings';}
                                if($this->uri->segment(1)=='email-settings'){$segment='email-settings';}
                                if($this->uri->segment(1)=='social-login-settings'){$segment='social-login-settings';}
                                if($this->uri->segment(1)=='currencies'){$segment='currencies';}
                                if($this->uri->segment(1)=='role'){$rolesegment='role';}
                                if($this->uri->segment(1)=='role-permission'){$rolesegment='role-permission';}
                                if($this->uri->segment(1)=='asign-role'){$rolesegment='asign-role';}
                            ?>   
                            <?php
                                if ($this->permission->method('general_settings', 'read')->access() || $this->permission->method('social_login_settings', 'read')->access() || $this->permission->method('currencies', 'read')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                        if ($this->permission->method('general_settings', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('settings');?>"><a href="<?= base_url('settings/')?>" class="<?= active_link('settings');?>">General Settings</a></li>
                                    <?php } ?>
                                    <!--<li class="<?= tab_active('email-settings');?>"><a href="<?= base_url('email-settings/')?>" class="<?= active_link('email-settings');?>">eMail Settings</a></li>-->
                                    <?php
                                        if ($this->permission->method('social_login_settings', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('social-login-settings');?>"><a href="<?= base_url('social-login-settings/')?>" class="<?= active_link('social-login-settings');?>">Social Login Settings</a></li>
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('currencies', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('currencies');?>"><a href="<?= base_url('currencies/')?>" class="<?= active_link('currencies');?>">Currencies</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>

                            <?php
                                if ($this->permission->module('permission')->access() || $this->permission->method('role', 'create')->access()) {
                            ?>
                            <!-- Role & Permission -->
                            <li class="<?= active_menu($rolesegment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($rolesegment);?>">
                                    <i class="ti-unlock"></i>
                                    <span>Role & Permission</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                        if ($this->permission->method('role', 'create')->access() || $this->permission->method('role', 'read')->access() || $this->permission->method('role', 'update')->access() || $this->permission->method('role', 'delete')->access()) {
                                    ?>
                                    <li class="<?= tab_active('role');?>"><a href="<?= base_url('role/')?>" class="<?= active_link('role');?>">Role</a></li>
                                    <?php } ?>
                                    <li class="<?= tab_active('role-permission');?>"><a href="<?= base_url('role-permission/')?>" class="<?= active_link('role-permission');?>">Role Permission</a></li>
                                    <?php
                                    if ($this->permission->module('assign_role')->access()) {
                                        ?>
                                    <li class="<?= tab_active('asign-role');?>"><a href="<?= base_url('asign-role/')?>" class="<?= active_link('asign-role');?>">Asign Role</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>

                            <!-- Modules -->
                            <?php
                                if ($this->permission->module('module')->access() || $this->permission->method('module', 'create')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Modules</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li class="<?= tab_active('modules');?>"><a href="<?= base_url('modules/')?>" class="<?= active_link('modules');?>">All Modules</a></li>
                                    <li class="<?= tab_active('sub-modules');?>"><a href="<?= base_url('sub-modules/')?>" class="<?= active_link('sub-modules');?>">All Sub Modules</a></li>
                                </ul>
                            </li>
                            <?php } ?>

                            <!-- Inquiry -->
                            <?php
                                if ($this->permission->module('inquiry')->access() || $this->permission->method('inquiry', 'create')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Inquiry</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li class="<?= tab_active('inquiry/add-new');?>"><a href="<?= base_url('inquiry/add-new')?>" class="<?= active_link('inquiry/add-new');?>">Add Inquiry</a></li>
                                    <?php
                                         if ($this->permission->method('followup_list', 'create')->access() || $this->permission->method('followup_list', 'read')->access() || $this->permission->method('followup_list', 'update')->access() || $this->permission->method('followup_list', 'delete')->access()) {
                                    ?>
                                    <li class="<?= tab_active('inquiry');?>"><a href="<?= base_url('inquiry/')?>" class="<?= active_link('inquiry');?>">Followup List</a></li>
                                    <?php } ?>
                                    <li class="<?= tab_active('inquiry/not-interested');?>"><a href="<?= base_url('inquiry/not-interested')?>" class="<?= active_link('inquiry/not-interested');?>">Not Interested List</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            
                            <!-- Followup -->
                            <?php
                                if ($this->permission->module('followup')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Followup</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li class="<?= tab_active('followup/inquiry-followup');?>"><a href="<?= base_url('followup/inquiry-followup/')?>" class="<?= active_link('followup/inquiry-followup');?>">Inquiry Followup</a></li>
                                    <!-- <li class="<?= tab_active('followup/due-payment-followup');?>"><a href="<?= base_url('followup/due-payment-followup/')?>" class="<?= active_link('followup/due-payment-followup');?>">Due Payment Followup</a></li> 
                                    <li class="<?= tab_active('followup/renewal-followup');?>"><a href="<?= base_url('followup/renewal-followup/')?>" class="<?= active_link('followup/renewal-followup');?>">Renewal Followup</a></li> 
                                    <li class="<?= tab_active('followup/irregular-member-list');?>"><a href="<?= base_url('followup/irregular-member-list/')?>" class="<?= active_link('followup/irregular-member-list');?>">Irregular Member List</a></li>  -->
                                </ul>
                            </li> 
                            <?php } ?>

                            <!-- Members -->
                            <?php
                                if (($this->permission->method('member', 'create')->access() && $this->permission->method('member', 'read')->access()) || $this->permission->method('member_category', 'read')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Member</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                        if ($this->permission->method('member_category', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('category/')?>" class="<?= active_link('modules');?>">Category</a></li>
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('member', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('members/')?>" class="<?= active_link('modules');?>">All Members</a></li>
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('member', 'create')->access()) {
                                    ?>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('members/add-new')?>" class="<?= active_link('modules');?>">Add Members</a></li>
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('member', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('members/active-members')?>" class="<?= active_link('modules');?>">Active Members</a></li>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('members/inactive-members')?>" class="<?= active_link('modules');?>">Inactive Members</a></li>
                                    <!-- <li class="<?= tab_active('members');?>"><a href="<?= base_url('members/')?>" class="<?= active_link('modules');?>">Attendance</a></li> -->
                                    <?php } ?>
                                </ul>
                            </li> 
                            <?php } ?>

                            <?php if ($this->permission->method('attendance', 'read')->access()) { ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="<?= base_url('attendance/')?>" class="waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Attendance</span>
                                </a>
                            </li> 
                            <?php } ?>

                            <?php
                                if ($this->permission->method('membership', 'read')->access() || $this->permission->method('membership', 'create')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Membership</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                        if ($this->permission->method('membership', 'create')->access()) {
                                    ?>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('membership/add-new/')?>" class="<?= active_link('modules');?>">New Membership</a></li>
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('membership', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('members');?>"><a href="<?= base_url('membership/')?>" class="<?= active_link('modules');?>">All Memberships</a></li>
                                    <?php } ?>
                                </ul>
                            </li> 
                            <?php } ?>

                            <?php
                                if ($this->permission->module('membership_plan')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="<?= admin_url('master-manage/package-master/')?>" class="waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Membership Plans</span>
                                </a>
                            </li> 
                            <?php } ?>

                            <?php
                                if ($this->permission->module('continue_charge')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="<?= admin_url('continue-charge')?>" class="waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Continue Charge</span>
                                </a>
                            </li> 
                            <?php } ?>

                            <?php
                                if ($this->permission->module('schedule_class')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="<?= base_url('gym-c-info/')?>" class="waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Schedule Class</span>
                                </a>
                            </li> 
                            <?php } ?>
                            
                            <!-- Members -->
                            <?php
                                if ($this->permission->method('trainer', 'read')->access() && $this->permission->method('trainer', 'create')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="<?= base_url('trainer/')?>" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Trainer</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li class="<?= tab_active('trainer');?>"><a href="<?= base_url('trainer/')?>" class="<?= active_link('trainer');?>">All Trainers</a></li>
                                </ul>
                            </li> 
                            <?php } ?>
                                        
                            
                            <!-- All Master Data -->
                            <?php
                                if ($this->permission->module('master_data')->access()) {
                            ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="fas fa-coins"></i>
                                    <span>All Master Data</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                        if ($this->permission->method('shift_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('shift-master');?>"><a href="<?= base_url('master-manage/shift-master/')?>" class="<?= active_link('shift-master');?>">Shift Master Master</a></li>
                                    <?php } ?>

                                    <?php
                                        if ($this->permission->method('documents_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('documents');?>"><a href="<?= base_url('master-manage/documents/')?>" class="<?= active_link('documents');?>">Documents Master</a></li>
                                    <?php } ?>

                                    <?php
                                        if ($this->permission->method('gender_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('gender-master');?>"><a href="<?= base_url('master-manage/gender-master/')?>" class="<?= active_link('gender-master');?>">Gender Master</a></li> 
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('medical_history', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('medical-history-master');?>"><a href="<?= base_url('master-manage/medical-history-master/')?>" class="<?= active_link('medical-history-master');?>">Medical History Master</a></li> 
                                    <?php } ?>
                                    <!-- <li class="<?= tab_active('package-master');?>"><a href="<?= base_url('master-manage/package-master/')?>" class="<?= active_link('package-master');?>">Rooms</a></li> -->
                                    <?php
                                        if ($this->permission->method('payment_mode', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('payment-mode-master');?>"><a href="<?= base_url('master-manage/payment-mode-master/')?>" class="<?= active_link('payment-mode-master');?>">Payment Mode Master</a></li>
                                    <?php } ?>

                                    <?php
                                        if ($this->permission->method('blood_group_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('blood-group-master');?>"><a href="<?= base_url('master-manage/blood-group-master/')?>" class="<?= active_link('blood-group-master');?>">Blood Group Master</a></li> 
                                    <?php } ?>

                                    <?php
                                        if ($this->permission->method('marital_status_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('marital-status-master');?>"><a href="<?= base_url('master-manage/marital-status-master/')?>" class="<?= active_link('marital-status-master');?>">Marital Status Master</a></li> 
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('religion_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('religion-master');?>"><a href="<?= base_url('master-manage/religion-master/')?>" class="<?= active_link('religion-master');?>">Religion Master</a></li> 
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('nationality_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('nationality-master');?>"><a href="<?= base_url('master-manage/nationality-master/')?>" class="<?= active_link('nationality-master');?>">Nationality Master</a></li> 
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('status_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('status-master');?>"><a href="<?= base_url('master-manage/status-master/')?>" class="<?= active_link('status-master');?>">Status Master</a></li> 
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('category_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('catagory-master');?>"><a href="<?= base_url('master-manage/catagory-master/')?>" class="<?= active_link('catagory-master');?>">Catagory Master</a></li> 
                                    <?php } ?>
                                    <?php
                                        if ($this->permission->method('how_to_know_master', 'read')->access()) {
                                    ?>
                                    <li class="<?= tab_active('how-to-know-master');?>"><a href="<?= base_url('master-manage/how-to-know-master/')?>" class="<?= active_link('how-to-know-master');?>">How to Know Master</a></li> 
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>


                            <!-- <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class=" waves-effect <?= active_menu($segment);?>">
                                    <i class="fas fa-fingerprint"></i>
                                    <span>Biometric</span>
                                </a>
                            </li>  -->

                            <?php if ($this->permission->module('accounts')->access()) { ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Accounts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php if ($this->permission->method('transactions', 'read')->access()) { ?>
                                    <li class="<?= tab_active('transactions');?>"><a href="<?= base_url('accounts/transactions/')?>" class="<?= active_link('transactions');?>">Transactions</a></li>
                                    <?php } ?>
                                </ul>
                            </li> 
                            <?php } ?>

                            <?php if ($this->permission->method('data', 'read')->access()) { ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="<?= base_url('data/')?>" class="waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Data</span>
                                </a>
                            </li> 
                            <?php } ?>

                            <?php if ($this->permission->module('reports')->access()) { ?>
                            <li class="<?= active_menu($segment);?>">
                                <a href="javascript: void(0);" class="has-arrow waves-effect <?= active_menu($segment);?>">
                                    <i class="ti-settings"></i>
                                    <span>Reports</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php if ($this->permission->method('expiry_report', 'read')->access()) { ?>
                                    <li class="<?= tab_active('expiry-report');?>"><a href="<?= base_url('report/expire-report/')?>" class="<?= active_link('transactions');?>">Expiry Report</a></li>
                                    <?php } ?>
                                </ul>
                            </li> 
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
