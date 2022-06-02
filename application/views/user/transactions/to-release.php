
    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd" >
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>Library Resources / To Release</h1>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright user-table" >
                                    
                                <?php flash_alert(); ?>

                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="category">Category</th>
                                                <th data-field="title">Title</th>
                                                <!-- <th data-field="borrower">Borrower</th> -->
                                                <th data-field="reservation">Reservation Date</th>
                                                <th data-field="release">Release Date</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($resources as $resource): ?>
                                            <tr>
                                                <td><?=$resource->barcode?></td>
                                                <td><?=$resource->category?></td>
                                                <td><?=$resource->title?> </td>
                                                <!-- <td><?=$resource->first_name?> <?=$resource->last_name?> 
                                                    <?php if($resource->user_type=="Student"){ echo '('.$resource->course.', '.$resource->year_level.', ' .$resource->section.')'; }?>
                                                </td> -->
                                                
                                                 <td><?=date("M d, Y", strtotime($resource->reservation_date))?> </td> 
                                                 <td><?=date("M d, Y", strtotime($resource->pickup_date))?> </td>   
                                                <td>
                                                    <div style="display: flex;">
                                                        <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <!-- <button class="btn " data-toggle="modal" data-target="#resource<?=$resource->lib_id?>" style="background: #1aff00">Cancel</button> -->
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