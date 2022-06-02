<!-- Assign Modal Section Start -->
<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Add Email Content</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('settings/save_email')?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">

                                          <?php //if($this->session->userdata('user_type') =='Admin' || $this->session->userdata('user_type') =='Library Staff'){?>
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input type="text" class="form-control" name="email_code" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="email_subject" value="" required>
                                            </div>                                           
                                            <div class="form-group">
                                                <label>Content </label>
                                                <textarea type="text" class="form-control" name="email_content_1" value="" required></textarea>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Content 2</label>
                                                <textarea type="text" class="form-control" name="email_content_2" value="" required></textarea>
                                            </div> -->
                                            <div class="form-group">
                                                <label>Footer</label>
                                                <textarea type="text" class="form-control" name="footer" value="" required></textarea>
                                            </div>

                                    

                                            
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="proceed_borrow">Save</a>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Assign Modal Section end -->