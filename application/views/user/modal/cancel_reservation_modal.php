<!-- Add Modal Section Start -->
<?php foreach($on_process as $process):?>
<div id="resource<?=$process->lib_id?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header header-color-modal bg-color-4">
                                      <h4 class="modal-title">Cancel <?=$process->category ?> Reservation</h4>
                                      <div class="modal-close-area modal-close-df">
                                          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                      </div>
                                  </div>
                                  <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('user/cancel_reservation/'.$process->lib_id);?>">
                                  <div class="modal-body">
                                      <input type="hidden" id="da_barcode" name="da_barcode" class="form-control">
                                      <p style="font-size: 24px; font-weight: 600;">Are you sure to cancel your reservation of <span ><?=$process->title?></span></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Back</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="deleteAudioVisualBtn" id="delete">Proceed</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                  
  <?php endforeach ?>
                    <!-- Add Modal Section end -->