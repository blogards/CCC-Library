

    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?=base_url('tools/img/logo/CCC-logo.png')?>" alt="" /></a>
                <strong><a href="index.html"><img src="<?=base_url('tools/img/logo/CCC-logo.png')?>" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">

                        <li class="active">
                            <a title="Landing Page" href="
                            <?php if($this->session->userdata('user_type') != ''){ echo site_url('user');}
                                    else{ echo site_url('guest');}?>
                            " aria-expanded="false">
                                <span class="fa fa-tachometer icon-wrap" aria-hidden="true"></span>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>

                        <!-- Dashboard Section start -->
                        <?php if($this->session->userdata('user_type') != ''){?>
                        
                        <!-- Dashboard Section end -->
                        <li class="" >                                                                                      
                                <a class="has-arrow" style="" href="" aria-expanded="false">
                                    <i class="fa fa-book icon-wrap" aria-hidden="true"></i>
                                    <span  class="mini-click-non">Available Resources</span>
                                </a>    
                                <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="All Library" href="<?=site_url('user/available_books')?>"><span>Books</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('user/available_audio_visual')?>"><span>Audio-Visual Materials</span></a></li>
                                <li><a title="All Library" href="<?=site_url('user/available_manuscripts')?>"><span >Manuscript/Narrative</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('user/available_gov_pubs')?>"><span>Government Publications</span></a></li>
                                <li><a title="All Library" href="<?=site_url('user/available_thesis')?>"><span >Thesis and Dissertation</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('user/available_journals')?>"><span>Journals</span></a></li>
                            </ul>
                        </li>
                        <?php }else  if($this->session->userdata('user_type') == ''){?>
                        <!-- Dashboard Section end -->
                        <li class="" >             
                                                                                                     
                                <a class="has-arrow" style="" href="" aria-expanded="false">
                                    <i class="fa fa-book icon-wrap" aria-hidden="true"></i>
                                    <span  style="color:#fff" class="mini-click-non">Available Resources</span>
                                </a>    
                                <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="All Library" href="<?=site_url('guest/available_books')?>"><span>Books</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('guest/available_audio_visual')?>"><span>Audio-Visual Materials</span></a></li>
                                <li><a title="All Library" href="<?=site_url('guest/available_manuscripts')?>"><span >Manuscript/Narrative</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('guest/available_gov_pubs')?>"><span>Government Publications</span></a></li>
                                <li><a title="All Library" href="<?=site_url('guest/available_thesis')?>"><span >Thesis and Dissertation</span></a></li>
                                <li><a title="Add Library" href="<?=site_url('guest/available_journals')?>"><span>Journals</span></a></li>
                            </ul>
                        </li>
                        
                        <?php }?>
                        


                        <!-- <li >
                            <a title="Inbox" href="<?=site_url('user/available_books')?>">
                                <i class="fa fa-book icon-wrap" aria-hidden="true"></i>
                                <span class="mini-sub-pro">Available Books</span>
                            </a>
                        </li> -->
                        <!-- <li > 
                            <a title="Inbox" href="<?=site_url('user/reservations')?>">
                                <i class="fa fa-calendar icon-wrap" aria-hidden="true"></i>
                                <span class="mini-sub-pro">Reservations</span>
                            </a>
                        </li>
                        <li>
                            <a title="View Mail" href="<?=site_url('user/to_release')?>">
                                <i class="fa fa-share icon-wrap" aria-hidden="true"></i>
                                <span class="mini-sub-pro">To Release</span>
                            </a>
                        </li>
                        <li>
                            <a title="View Mail" href="<?=site_url('user/borrowed')?>">
                                <i class="fa fa-server icon-wrap" aria-hidden="true"></i>
                                <span class="mini-sub-pro">Borrowed</span>
                            </a>
                        </li>
                        <li>
                            <a title="View Mail" href="<?=site_url('user/returned')?>">
                                <i class="fa fa-reply icon-wrap" aria-hidden="true"></i>
                                <span class="mini-sub-pro">Returned</span>
                            </a>
                        </li>
                        
                        
                        <li class="active">
                            <a title="Calendar" href="calendar.php" aria-expanded="false">
                                <i class="fa fa-calendar icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Calendar</span>
                            </a>
                        </li>

                        <?php if($this->session->userdata('user_type') == 'Admin') { ?>
                        <li class="active">
                            <a title="Landing Page" href="#" aria-expanded="false">
                                <i class="fa fa-cogs icon-wrap" aria-hidden="true"></i>
                                <span class="mini-click-non">Settings</span>
                            </a>
                        </li>
                        <?php } ?> -->
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    