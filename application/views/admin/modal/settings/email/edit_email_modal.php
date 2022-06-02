<?php foreach($emails as $email): ?>
<!-- Assign Modal Section Start -->
<div id="email-<?=$email->id?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Update Email Content</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('settings/update_email/'.$email->id)?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">

                                          <?php //if($this->session->userdata('user_type') =='Admin' || $this->session->userdata('user_type') =='Library Staff'){?>
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input type="text" class="form-control" name="email_code" value="<?=$email->code?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="email_subject" value="<?=$email->subject?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea type="text" class="form-control" name="email_content_1" value="<?=$email->content_1?>" required>
                                                    <?=$email->content_1?>
                                                </textarea>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Content 2</label>
                                                <textarea type="text" class="form-control" name="email_content_2" value="<?=$email->content_2?>" required>
                                                    <?=$email->content_2?>
                                                </textarea>
                                            </div> -->
                                            <div class="form-group">
                                                <label>Footer</label>
                                                <textarea type="text" class="form-control" name="footer" value="<?=$email->footer?>" required>
                                                    <?=$email->footer?>
                                                </textarea>
                                            </div>

                                    

                                            
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="proceed_borrow">Save Changes</a>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Assign Modal Section end -->
<?php endforeach ?>