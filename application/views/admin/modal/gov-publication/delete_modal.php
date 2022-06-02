<?php   foreach($publications as $publication): ?>

<!-- Delete modal Section Start -->

<div id="deletemodal<?=$publication->barcode?>" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header header-color-modal bg-color-4">
                                      <h4 class="modal-title">Delete Record?</h4>
                                      <div class="modal-close-area modal-close-df">
                                          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                      </div>
                                  </div>
                                  <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/delete_publication/'.$publication->barcode)?>">
                                  <div class="modal-body">
                                      <input type="hidden" id="da_barcode" name="da_barcode" class="form-control">
                                      <p style="font-size: 24px; font-weight: 600;">Are you sure to delete the record of <span ><?=$publication->title?></span></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="deleteAudioVisualBtn" id="delete">Delete</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    <!-- Delete modal Section end -->

<?php endforeach ?>