
    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>Library Resources / Reservation</h1>
                                    </div>
                                    <!-- <a class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Assign</a> -->
                                </div>
                            </div>
                            
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    
                                

                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <?php flash_alert(); ?>
                                        <thead>
                                            <tr>
                                                <!-- <th data-field="class">Class #</th> -->
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="borrower">Borrower</th>
                                                <th data-field="reservation">Reservation Date</th>
                                                <th data-field="reservation">Pickup Date</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($resources as $resource): ?>
                                            <tr>
                                                <td><?=$resource->barcode?></td>
                                                <td><?=$resource->title?> </td>
                                                <td><?=$resource->first_name?> <?=$resource->last_name?> 
                                                    <?php if($resource->user_type=="Student"){ echo '('.$resource->course.', '.$resource->year_level.', ' .$resource->section.')'; }?>
                                                </td>
                                                <td><?=date("M d, Y", strtotime($resource->reservation_date))?> </td> 
                                                <td><?=date("M d, Y", strtotime($resource->created_at))?> </td> 
                                                <td>
                                                  <div style="display: flex;">
                                                    <!-- <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                                    <button class="btn " data-toggle="modal" data-target="#resource<?=$resource->lib_id?>" style="background: #1aff00">Confirm</button>
                                                  </div>
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
        <!-- Static Table End --> 
        <?php $this->load->view('admin/modal/transaction/confirm_reservation_modal.php');?>