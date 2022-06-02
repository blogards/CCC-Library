<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Available Library Resources</h5>
                                <h2><span class="counter"><?=$count_resources?></span> <span class="count-icon"><i class="fa fa-book icon-wrap"></i></span></h2>
                                <div>
                                    <a href="" class="small-box-footer bg-yellow"> <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                            <h5>Reservation / On hand</h5>
                                <h2><span class="counter"><?=$count_reservation?></span> <span class="count-icon"><i class="fa fa-hand-paper-o icon-wrap"></i></span></h2>
                                <div>
                                    <a href="" class="small-box-footer bg-red"> <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                            <h5>Returned</h5>
                                <h2><span class="counter"><?=$count_returned?></span> <span class="count-icon"><i class="fa fa-undo icon-wrap"></i></span></h2>
                                <div>
                                    <a href="" class="small-box-footer bg-aqua"> <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Chemical Engineering</h5>
                                <h2>$<span class="counter">3500</span> <span class="tuition-fees">Tuition Fees</span></h2>
                                <span class="text-inverse">80%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                                        <h1>Present Transaction</h1>
                                    </div>
                                    <a style="display:right" class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal"
                                    <?php if($has_reservation == true){ echo 'disabled';}else{ { echo 'data-target="#resource1"';}} ?>>
                                    <i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add Reservation</a>
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
                                                <th data-field="reservation_date">Reservation Date</th>
                                                <th data-field="due_date">Due Date</th>
                                                <th data-field="status">Status</th>
                                                
                                                <!-- <th data-field="action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($on_process as $process): ?>
                                            <tr>
                                                <td><?=$process->category?></td>
                                                <td><?=$process->barcode?></td>                                
                                                <td><?=$process->title?> </td>
                                                
                                                <td><?=date("M d, Y", strtotime($process->due_date))?> </td>
                                                <td><?=date("M d, Y", strtotime($process->reservation_date))?> </td>
                                                <td>
                                                    
                                                <label  class="badge1 
                                                <?php if($process->status == 'Reserved'){echo 'btn-danger';}else if($process->status == 'Borrowed'){echo 'btn-success';}?> ">
                                                <?=$process->status?>
                                                </label> </td>
                                                
                                                
                                                
                                                <!-- <td>
                                                  <div style="display: flex;">
                                                    <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  </div>
                                                </td> -->
                                            </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php $this->load->view('guest/modal/assign_modal.php');?>
                   
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
                                    

                                    <?php flash_alert(); ?>

                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="category">Category</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="reservation_date">Reservation Date</th>
                                                <th data-field="due_date">Due Date</th>
                                                <th data-field="status">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($has_returned as $returned): ?>
                                                <tr>
                                                <td><?=$returned->category?></td>
                                                <td><?=$returned->barcode?></td>                                
                                                <td><?=$returned->title?> </td>
                                                
                                                <td><?=date("M d, Y", strtotime($returned->due_date))?> </td>
                                                <td><?=date("M d, Y", strtotime($returned->reservation_date))?> </td>
                                                <td><?=$returned->status?> </td>
                                                <!-- <td>
                                                  <div style="display: flex;">
                                                    <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  </div>
                                                </td> -->
                                            </tr>
                                            <?php endforeach ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php //$this->load->view('admin/modal/transaction/available-books/assign_modal.php');?>
                   
                </div>
            </div>
        </div>