

    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <h1>Books</h1>
                                    </div>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalertedit"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Import</a>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                          <option value="">Export Basic</option>
                                          <option value="all">Export All</option>
                                          <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <?php flash_alert(); ?>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="class">Class No.</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="edition">Edition</th>
                                                <th data-field="volume">Volume</th>
                                                <th data-field="Author">Author</th>
                                                <!-- <th data-field="publisher">Publisher</th> -->
                                                <th data-field="pages">Pages</th>
                                                <th data-field="date-receive">Date Received</th>
                                                <th data-field="year">Year</th>
                                                <!-- <th data-field="price">Cash Price</th> -->
                                                <!-- <th data-field="soc">Source of Fund</th> -->
                                                <!-- <th data-field="remarks">Remarks</th> -->
                                                <th data-field="status"> Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($books as $book): ?>
                                    <tr>
                                        <td></td>
                                        <td><?=$book->class?></td>
                                        <td><?=$book->barcode?></td>
                                        <td><?=$book->title?></td>
                                        <td><?=$book->edition?></td>
                                        <td><?=$book->volume?></td>
                                        <td><?=$book->author?></td>                        
                                        <!-- <td><?=$book->publisher?></td> -->
                                        <td><?=$book->pages?></td>
                                        <td><?= date("M d, Y", strtotime($book->date_received))?></td>
                                        <td><?=$book->year?></td>
                                        <!-- <td><?=$book->cash_price?></td> -->
                                        <!-- <td><?=$book->sof?></td> -->
                                        <!-- <td><?=$book->remarks?></td> -->
                                        <td>
                                        <select class="form-control dt-tb resource-status" barcode="<?=$book->barcode?>">
                                                        <option <?php if($book->status == 'Available'){ echo 'selected'; }?> value="Available"  selected   >Available</option>
                                                        <option  <?php if($book->status == 'Reserved' || $book->status == 'Borrowed' || $book->status == 'Not Available'){ echo 'selected'; }?> value="Not Available">Not Available</option> 
                                                        <option  <?php if($book->status == 'Damage'){ echo 'selected'; }?> value="Damage"  >Damage</option>
                                                        <option  <?php if($book->status == 'Archive'){ echo 'selected'; }?> value="Archive"  >Archive</option> 
                                                    </select>
                                            
                                        </td>
                                        <td>
                                          <div style="display: flex;">
                                          <a class="media" name="view_pdf"  style="background: #1aff00"><i class="fa fa-eye view_pdf" file="<?=site_url('tools/files/').$book->soft_copy?>"  aria-hidden="true"></i>
                                        
                                        
                                        
                                        <!-- <?php
                                            
                                            // The location of the PDF file
                                            // on the server
                                            // $filename = "/tools/files/".$book->soft_copy;
                                            
                                            // // Header content type
                                            // header("Content-type: application/pdf");
                                            
                                            // header("Content-Length: " . filesize($filename));
                                            
                                            // // Send the file to the browser.
                                            // readfile($filename);
                                                
                                            ?> -->
                                            </a>
                                          <a href="#" data-toggle="modal" data-target="#book<?=$book->barcode?>" style="background: #00bbff">
                                            <i class="fa fa-pencil-square-o editBook" >
                                            </i>
                                          </a>
                                          <a href="#" data-toggle="modal" data-target="#deletemodal<?=$book->barcode?>" style="background: #ff0000">
                                            <i class="fas fa-trash-alt deleteBook" data-db_barcode="<?=$book->barcode?>" data-db_title="<?=$book->title?>"> </i>
                                          </a>
                                          </div>
                                        </td>
                                    </tr>

                                    <?php endforeach?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                      </div>
                  </div>
                    <?php $this->load->view('admin/modal/books/add_modal.php'); ?>
                    <?php $this->load->view('admin/modal/books/edit_modal.php'); ?>
                    <?php $this->load->view('admin/modal/books/import_modal.php'); ?>
                    <?php $this->load->view('admin/modal/books/delete_modal.php'); ?>                                                         
                </div>
            </div>
        </div>

        <!-- Static Table End -->
