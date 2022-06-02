
    <!-- Start Left menu area -->
    <div  style="background:#434343" class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?=base_url('tools/img/logo/CCC-logo.png')?>" alt="" /></a>
                <strong><a href="index.html"><img src="<?=base_url('tools/img/logo/CCC-logo.png')?>" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">

                        <!-- Dashboard Section start -->
                        <li class="active">
                            <a title="Landing Page" href="<?=site_url('admin')?>" aria-expanded="false">
                                <span class="fas fa-tachometer-alt icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <!-- Dashboard Section end -->
                        
                        <!-- Transaction Section start -->
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false">
                                <i class="fas fa-exchange-alt icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Transaction</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="<?=site_url('transaction/available_resources')?>"><span class="mini-sub-pro">Available Resources</span></a></li>
                                <!-- <li><a title="View Mail" href="<?=site_url('transaction/reservations')?>"><span class="mini-sub-pro">Reservations</span></a></li> -->
                                <li><a title="View Mail" href="<?=site_url('transaction/to_release')?>"><span class="mini-sub-pro">Reservations</span></a></li>
                                <li><a title="View Mail" href="<?=site_url('transaction/borrowed')?>"><span class="mini-sub-pro">Borrowed</span></a></li>
                                <li><a title="View Mail" href="<?=site_url('transaction/returned')?>"><span class="mini-sub-pro">Returned</span></a></li>
                            </ul>
                        </li>
                        <!-- Library Assets Section end -->

                        <!-- Library Assets Section start -->
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false">
                                <i class="fa fa-book icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Library Resources</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All Library" href="<?=site_url('library_resources/books')?>"><span class="mini-sub-pro">Books</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('library_resources/audio_visual')?>"><span class="mini-sub-pro">Audio-Visual Materials</span></a></li>
                                <li><a title="All Library" href="<?=site_url('library_resources/manuscript')?>"><span class="mini-sub-pro">Manuscript/Narrative</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('library_resources/gov_publication')?>"><span class="mini-sub-pro">Government Publications</span></a></li>
                                <li><a title="All Library" href="<?=site_url('library_resources/thesis_and_dissertation')?>"><span class="mini-sub-pro">Thesis and Dissertation</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('library_resources/journals')?>"><span class="mini-sub-pro">Journals</span></a></li>
                            </ul>
                        </li>
                        <!-- Library Assets Section end -->

                        <!-- Users Section start -->
                        <?php if($this->session->userdata('user_type') == 'Admin') { ?>
                        <li class="active">
                            <a href="<?=site_url('users/index')?>" aria-expanded="false">
                                <i class="fa fa-user icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Users</span>
                            </a>                           
                        </li>
                        <?php } ?>
                        <!-- Users Section end -->
                        
                        <!-- <li class="active">
                            <a title="Calendar" href="calendar.php" aria-expanded="false">
                                <i class="fa fa-calendar icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Calendar</span>
                            </a>
                        </li> -->


                        <!-- <?php// if($this->session->userdata('user_type') == 'Admin') { ?> -->
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false">
                                <i class="fa fa-file icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Reports</span>
                            </a>
                            <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                                <li><a title="Faculty" href="<?=site_url('reports/faculty');?>"><span class="mini-sub-pro">Faculty</span></a></li>
                                <li><a title="Student" href="<?=site_url('reports/student');?>"><span class="mini-sub-pro">Student</span></a></li>
                                <li><a title="Multimedia" href="area-charts.html"><span class="mini-sub-pro">Multimedia</span></a></li>
                                <li><a aria-expanded="false">     
                                    </a></li>
                                <li></li>
                            </ul>
                        </li>
                        <!-- <?php// } ?> -->

                        
                        <?php if($this->session->userdata('user_type') == 'Admin') { ?>
                        <li class="">
                            <a class="has-arrow" href="" aria-expanded="false">
                                <i class="fa fa-cogs icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Settings</span>
                            </a>
                            <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                                <li><a title="Email Settings" href="<?=site_url('settings/email');?>"><span class="mini-sub-pro">Email</span></a></li>
                                
                            </ul>
                            <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                                <li><a title="Email Settings" href="<?=site_url('settings/report');?>"><span class="mini-sub-pro">Report</span></a></li>
                                
                            </ul>
                        </li>
                        <?php } ?>

                        <li class="active">
                            <a aria-expanded="false">     
                            </a>
                        </li>
                        <li class="active">
                            <a aria-expanded="false">     
                            </a>
                        </li>
                        <li class="active">
                            <a aria-expanded="false">     
                            </a>
                        </li>
                        <li class="active">
                            <a aria-expanded="false">     
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
   