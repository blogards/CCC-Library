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
                                    
                                    <?php if($this->session->userdata('user_type') =='Admin' || $this->session->userdata('user_type') =='Library Staff'){?>

                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('admin/assign_borrower')?>">
                                   
                                    <?php }else if($this->session->userdata('user_type') =='Student' || $this->session->userdata('user_type') =='Teacher'){ ?>
                                      <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('ccc_lms/assign_borrower')?>">
                                    <?php } ?>

                                    <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">

                                          <?php if($this->session->userdata('user_type') =='Admin' || $this->session->userdata('user_type') =='Library Staff'){?>
                                            
                                            <div class="form-group">
                                              <label >Borrower's Name</label>
                                              <select class="select2 form-control qwerty" data-rel="chosen" style="width: 100%;"  name="borrower" id="selectError" required >
                                                <option disabled selected>-- Search User's name --</option>
                                                    
                                                    <?php  foreach($borrowers as $borrower)
                                                            echo "<option value=".$borrower->id.">".$borrower->first_name . " " . $borrower->middle_name . " " . $borrower->last_name ."</option>";                                                     
                                                    ?>

                                              </select>
                                            </div>

                                            <?php }else{
                                              $user_id = $this->session->userdata('id');
                                              echo "<input type='hidden' value='.$user_id.' name='borrower'>";
                                            } ?>

                                            <div class="form-group">
                                              <label >Resources Name</label>                                            
                                              <select class="select3 form-control" data-rel="chosen" style="width: 100%;"  name="resources" id="selectError" required >
                                                <option disabled selected>-- Search Library Resources Name --</option>
                                                    <?php foreach($available as $avlb)
                                                        echo "<option value=". $avlb->id.">".$avlb->title." (".$avlb->category." ".$avlb->barcode.") "."</option>";
                                                    ?>
                                              </select>
                                            </div>
                                            
                                            
                                            <input type="hidden" name="user_id" value="<?=$this->session->userdata('id')?>">
                                            <div class="form-group">
                                              
                                              <label>Reservation Date: </label>
                                              <?php if($this->session->userdata('user_type') == 'Admin' || $this->session->userdata('user_type') == 'Library Staff') {?>
                                                <input type="date" id="" class="form-control pickup_date" min="" name="date-assign" value="" required>
                                                <?php }else{?>
                                                <input type="date" id="" class="form-control pickup_date" min="" name="date-assign" value="" required>
                                                <?php }?>
                                              </div>
                                              <?php if($this->session->userdata('user_type') =='Admin' || $this->session->userdata('user_type') =='Library Staff'){?>
                                            <!-- <div class="form-group" >
                                              <label>Due Date: </label>
                                              
                                                <input type="date"  name="due_assign" id="due-assign1" class="form-control dueassign" min ="" value="">
                                              
                                            </div> -->
                                            <?php }?>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" value="Proceed" name="assign_btn">
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Assign Modal Section end -->

