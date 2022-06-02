<!-- Add Modal Section Start -->
<?php foreach($manuscripts as $manuscript): ?>
<div id="manuscript-<?=$manuscript->barcode?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Update Manuscript / Narrative</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/edit_manuscript/'.$manuscript->barcode);?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                            <!-- <div class="form-group">
                                              <label >Barcode</label>
                                              <input name="barcode" type="text" class="form-control" placeholder="Barcode" required>
                                            </div> -->
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title" type="text" class="form-control" value="<?=$manuscript->title?>" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Author</label>
                                              <input name="author" type="text" class="form-control" value="<?=$manuscript->author?>"  placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Course</label>
                                              <input name="course" type="text" class="form-control" value="<?=$manuscript->course?>"  placeholder="Course" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Year</label>
                                              <input name="year" type="text" class="form-control" value="<?=$manuscript->year?>"  placeholder="Year" required>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" name="edit_manuscript_btn" value="Proceed" >
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Add Modal Section end -->
<?php endforeach ?>