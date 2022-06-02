
                    <div id="resource1" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Reserve Library Resources</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('ccc_lms/reserve_book1');?>">
                                      <div class="modal-body">
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                            <div class="form-group">
                                              <label >First Name</label>
                                              <input name="first_name" type="text" class="form-control" placeholder="First name" value="" required>
                                            </div> 
                                            <div class="form-group">
                                              <label >Middle Name</label>
                                              <input name="middle_name" type="text" class="form-control" placeholder="Middle name" value="" required>
                                            </div> 
                                            <div class="form-group">
                                              <label >Last Name</label>
                                              <input name="last_name" type="text" class="form-control" placeholder="Last name" value="" required>
                                            </div> 
                                            <br>

                                            <div class="form-group">
                                              <label >Street</label>
                                              <input name="street" type="text" class="form-control" placeholder="Street" value="" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Barangay</label>
                                              <input name="barangay" type="text" class="form-control" placeholder="Barangay" value="" required>
                                            </div>
                                            <div class="form-group">
                                              <label >City</label>
                                              <input name="city" type="text" class="form-control" placeholder="City" value="" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Province</label>
                                              <input name="province" type="text" class="form-control" placeholder="Province" value="" required>
                                            </div>

                                            <div class="form-group">
                                              <label >Postal</label>
                                              <input name="postal" type="text" class="form-control" placeholder="Postal" value="" required>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                            <div class="form-group">
                                              <label >Email</label>
                                              <input name="email" type="email" class="form-control" placeholder="Email" value="" >
                                            </div>
                                            <div class="form-group">
                                              <label >Contact</label>
                                              <input name="contact" type="text" class="form-control" placeholder="Contact" value="" >
                                            </div>
                                            <br><br>
                                            
                                            <div class="form-group">
                                              <label >Resources Name</label>                                            
                                              <select class="select3 form-control" data-rel="chosen" style="width: 100%;"  name="title" id="selectError" required >
                                                <option disabled selected>-- Search Library Resources Name --</option>
                                                    <?php foreach($available as $avlb)
                                                        echo "<option value=". $avlb->id.">".$avlb->title." (".$avlb->category." ".$avlb->barcode.") "."</option>";
                                                    ?>
                                              </select>
                                            </div>
                                            <br><br>
                                            <div class="form-group" >
                                                <label>Date to Borrow</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" name="date-sched" id="datetime0" min="" max="" class="form-control datetime0" placeholder="<?php echo date("F j, Y, g:i a") ?>" required>
                                                </div>
                                            </div>
                                            <br><br>
                                            <!-- <div class="form-group" >
                                              <label>Due Date: </label>
                                              <?php if($this->session->userdata('user_type') !='Admin' || $this->session->userdata('user_type') !='Library Staff'){?>
                                                <input type="date"  name="due_assign" id="due-assign1" class="form-control dueassign" min ="" value="" disable >
                                              <?php }else{ ?>
                                                <input type="text"  name="due_assign" id="due-assign1" class="form-control dueassign" min ="" value="" disable>
                                                <?php }?>
                                                
                                            </div> -->
                                        </div>
                                        <input type="hidden" name="user_id" value="<?=$this->session->userdata('id')?>">
                                        <div class="modal-footer">
                                            <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                            <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" value="Proceed" name="guest_add_reservation_btn">
                                        </div>
                                      </div>
                                     
                                    </form>
                                </div>
                            </div>
                      </div>