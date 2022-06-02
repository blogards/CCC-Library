<!-- Assign Modal Section Start -->
<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Assign to borrower</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="includes/logic/borrow-resources.php">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">
                                          <?php
                                            // $sql = "SELECT * FROM borrowers";
                                            // $result = $db->query($sql);
                                          ?>
                                            <div class="form-group">
                                              <label >Borrower's Name</label>
                                              <select class="select2 form-control qwerty" data-rel="chosen" style="width: 100%;"  name="borrower" id="selectError">
                                                <option disabled selected>-- Search student name --</option>
                                                    <?php 
                                                        // while ($row = $result->fetch_assoc()) {
                                                        //     echo "<option value=". $row['id'] .">".$row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ."</option>";
                                                        // }
                                                    ?>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                            <?php
                                                // $lsql = "select COUNT(title) as 'total', title, barcode, category FROM `library-resources` where status = 'Available' GROUP BY title, category, status order by 3";
                                                // $results = $db->query($lsql);
                                            ?>
                                              <label >Resources Name</label>
                                              <?php  ?>
                                              
                                              <select class="select3 form-control" data-rel="chosen" style="width: 100%;"  name="resources" id="selectError">
                                                <option disabled selected>-- Search Library Resources Name --</option>
                                                    <?php 
                                                        // while ($row = $results->fetch_assoc()) {
                                                        //     $category = $row["category"];
                                                        //     $title = $row["title"];
                                                        //     echo "<option value=". $row['barcode'] .">".$row["title"]." (".$row["category"].$row['barcode'].") "."</option>";
                                                       // }
                                                        
                                                    ?>
                                              </select>
                                            </div>
                                            <!-- <div class="form-group" id="data_6">
                                                <label>Date to pickup</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_received" class="form-control" value="" >
                                                </div>
                                            </div> -->
                                            <p>Select Date: <input type="text" id="datepicker"></p>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="proceed_borrow">Proceed</a>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Assign Modal Section end -->