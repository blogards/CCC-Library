<?php foreach($users as $user): ?>
<!-- Delete modal Section Start -->
<div id="delete-user-<?=$user->id?>" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header header-color-modal bg-color-4">
                                      <h4 class="modal-title">Delete Record?</h4>
                                      <div class="modal-close-area modal-close-df">
                                          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                      </div>
                                  </div>
                                  <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('users/delete_user/'.$user->id);?>">
                                  <div class="modal-body">
                                      <input type="hidden" id="db_barcode" name="db_barcode" class="form-control" value="">
                                      <p style="font-size: 24px; font-weight: 600;">Are you sure to delete the record of <?=$user->last_name?>, <?=$user->first_name?> <?=$user->middle_name?></p><br/>
                                      <i>The process cannot be undone </i>
                                  </div>
                                  <div class="modal-footer danger-md">
                                      <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                      <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-danger" type="submit" name="deleteBooksBtn" id="delete">Delete</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    <!-- Delete modal Section end -->
<?php endforeach ?>