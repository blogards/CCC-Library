

        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="analytics-sparkle-line">
                            <!-- <div class="analytics-content"> -->
                                <h5>Library Resources</h5>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Available</h5>
                                <h2><span class="counter"><?php echo $available?></span> <span class="tuition-fees"></span></h2>
                                <span class="text-success"><?php echo round(($available/$total)*100);?>%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round(($available/$total)*100);?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Not Available</h5>
                                <h2><span class="counter"><?php echo $not_available?></span> <span class="tuition-fees"> </span></h2>
                                <span class="text-danger"><?php echo round(($not_available/$total)*100);?>%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($not_available/$total)*100);?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Damage</h5>
                                <h2><span class="counter"><?php echo $damage?></span> <span class="tuition-fees"></span></h2>
                                <span class="text-info"><?php echo round(($damage/$total)*100);?>%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round(($damage/$total)*100);?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Archive</h5>
                                <h2><span class="counter"><?php echo $archive?></span> <span class="tuition-fees"></span></h2>
                                <span class="text-inverse"><?php echo  round(($archive/$total)*100);?>%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($archive/$total)*100);?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="courses-area mg-b-15 mg-tb-30">
            <div class="container-fluid">
                <div class="row">                 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <!-- <h3 class="box-title">Visits from countries</h3> -->
                            <ul class="country-state" style="text-align: center;padding-left:20%; padding-right:20%">
                                <li>
                                    <h2><span class="counter"><?=$avm?></span></h2> <small>Audio Visual Materials</small>
                                    <div class="pull-right"><?php echo round(($avm/$resource_total)*100,2);?>% <i class="fa fa-level-up text-danger ctn-ic-1"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round(($avm/$resource_total)*100);?>%;"> <span class="sr-only"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter"><?=$books?></span></h2> <small>Books</small>
                                    <div class="pull-right"><?php echo round(($books/$resource_total)*100,2);?>% <i class="fa fa-level-up text-success ctn-ic-2"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($books/$resource_total)*100);?>%;"> <span class="sr-only"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter"><?=$gov_pub?></span></h2> <small>Government Publications</small>
                                    <div class="pull-right"><?php echo round(($gov_pub/$resource_total)*100,2);?>% <i class="fa fa-level-up text-success ctn-ic-3"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($gov_pub/$resource_total)*100);?>%;"> <span class="sr-only"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter"><?=$journal?></span></h2> <small>Journals</small>
                                    <div class="pull-right"><?php echo round(($journal/$resource_total)*100,2);?>% <i class="fa fa-level-down text-success ctn-ic-4"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($journal/$resource_total)*100);?>%;"> <span class="sr-only"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter"><?=$manuscript?></span></h2> <small>Manuscripts / Narratives</small>
                                    <div class="pull-right"><?php echo round(($manuscript/$resource_total)*100,2);?>% <i class="fa fa-level-up text-success ctn-ic-5"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($manuscript/$resource_total)*100);?>%;"> <span class="sr-only"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter"><?=$thesis?></span></h2> <small>Thesis / Dissertations</small>
                                    <div class="pull-right"><?php echo round(($thesis/$resource_total)*100,2);?>% <i class="fa fa-level-up text-success ctn-ic-5"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  round(($thesis/$resource_total)*100);?>%;"> <span class="sr-only"></span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="traffice-source-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Users</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs">
                            <h3 class="box-title">Students</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div style="color: #006DF0;"> <i class="fas fa-user-graduate users-icon" aria-hidden="true"></i> </div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success"><span class="counter"><?=$users?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs res-mg-t-30 table-mg-t-pro-n">
                            <h3 class="box-title">Teachers</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div style="color: #933EC5;" ><i class="fas fa-chalkboard-teacher users-icon" aria-hidden="true"></i></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple"><span class="counter"><?=$teachers?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <h3 class="box-title">Library Staffs</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div style="color: #65b12d;" ><i class="fas fa-user-tie users-icon" aria-hidden="true"></i> </div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info"><span class="counter"><?=$staffs?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <h3 class="box-title">Guest</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div style="color: #D80027;"><i class="fas fa-user-alt users-icon" aria-hidden="true"></i></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter"><?=$guests?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Library Transaction</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>All library transactions per month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Book transactions</h5>
                                </li>
                                <!-- <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Accounting</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Electrical</h5>
                                </li> -->
                            </ul>
                            <div id="area-chart" style="height: 356px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    
        
        


        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
              
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <h1>Today's Transaction</h1>
                                    </div>
                                    <!-- <a style="display:right" class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal"
                                    <?php  //if($this->session->userdata('user_type')=='Student'){
                                            //     if($has_reservation == true){ 
                                            //         echo 'disabled';
                                            //     }else{ 
                                            //         echo 'data-target="#PrimaryModalalert"';
                                            //     }
                                            // }else{ 
                                            //     echo 'data-target="#PrimaryModalalert"';
                                            // } 
                                            ?>>
                                    <i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add Reservation</a> -->
                                </div>
                            </div>

                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <?php flash_alert(); ?>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="category">Category</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="borrower">Borrower</th>
                                                <th data-field="reservation_date">Reservation Date</th>
                                                <th data-field="pickup_date">Pickup Date</th>
                                                <th data-field="due_date">Due Date</th>
                                                <th data-field="returned_date">Returned Date</th>
                                                <th data-field="status">Status</th>
                                                <!-- <th data-field="action">Action</th>
                                                 -->
                                                <!-- <th data-field="action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($today as $tdy): ?>
                                            <tr>
                                                <td><?=$tdy->category?></td>
                                                <td><?=$tdy->barcode?></td>                                
                                                <td><?=$tdy->title?> </td>
                                                <td><?=$tdy->first_name?> <?=$tdy->last_name?></td>   
                                                
                                                

                                                <td><?=date("M d, Y", strtotime($tdy->reservation_date))?> </td>
                                                <?php if($tdy->pickup_date == NULL ){ echo '<td></td>';}else{echo '<td>'.date("M d, Y", strtotime($tdy->pickup_date)).'</td>';}?>
                                                <?php if($tdy->due_date == NULL ){ echo '<td></td>';}else{echo '<td>'.date("M d, Y", strtotime($tdy->due_date)).'</td>';}?>
                                                <?php if($tdy->returned_date == NULL ){ echo '<td></td>';}else{echo '<td>'.date("M d, Y", strtotime($tdy->returned_date)).'</td>';}?>
                                                <td>
                                                    
                                                    <label style="margin-top:5%;font-size:15px" class="badge1 
                                                    <?php if($tdy->status == 'Reserved'){
                                                        echo 'btn-danger';
                                                        }else if($tdy->status == 'Borrowed'){
                                                            echo 'btn-success';
                                                        }
                                                        else if($tdy->status == 'Returned'){
                                                            echo 'btn-info';}
                                                            ?> 
                                                    ">
                                                    <?=$tdy->status?>
                                                    </label> 
                                                </td>
                                                
                                            </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>



        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>Recent Transactions</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    

                                    

                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="category">Category</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="borrower">Borrower</th>
                                                <th data-field="reservation_date">Reservation Date</th>
                                                <th data-field="pickup_date">Pickup Date</th>
                                                <th data-field="due_date">Due Date</th>
                                                <th data-field="returned_date">Returned Date</th>
                                                <th data-field="status">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($past as $pst): ?>
                                                <tr>
                                                <td><?=$pst->category?></td>
                                                <td><?=$pst->barcode?></td>                                
                                                <td><?=$pst->title?> </td>
                                                <td><?=$pst->first_name?> <?=$pst->last_name?></td>
                                                
                                                
                                                <td><?=date("M d, Y", strtotime($pst->reservation_date))?> </td>
                                                <?php if($pst->pickup_date == NULL ){ echo '<td></td>';}else{echo '<td>'.date("M d, Y", strtotime($pst->pickup_date)).'</td>';}?>
                                                <?php if($pst->due_date == NULL ){ echo '<td></td>';}else{echo '<td>'.date("M d, Y", strtotime($pst->due_date)).'</td>';}?>
                                                <?php if($pst->returned_date == NULL ){ echo '<td></td>';}else{echo '<td>'.date("M d, Y", strtotime($pst->returned_date)).'</td>';}?>
                                                <td>
                                                    
                                                    <label style="margin-top:5%;font-size:15px" class="badge1 
                                                    <?php if($pst->status == 'Reserved'){
                                                        echo 'btn-danger';
                                                        }else if($pst->status == 'Borrowed'){
                                                            echo 'btn-success';
                                                        }
                                                        else if($pst->status == 'Returned'){
                                                            echo 'btn-info';}
                                                            ?> 
                                                    ">
                                                    <?=$pst->status?>
                                                    </label> 
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/includes/myscript.php')?>
