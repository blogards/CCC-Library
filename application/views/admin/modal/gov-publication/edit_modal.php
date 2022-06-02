<?php   foreach($publications as $publication): ?>
<!-- Edit Modal Section Start -->
<div id="publication-<?=$publication->barcode?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Update Government Publication</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/edit_publication/'.$publication->barcode)?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" id="id" name="id" class="form-control" required>
                                          <div class="form-group">
                                            <label >Barcode ID</label>
                                            <input name="barcode" value="<?=$publication->barcode?>" type="text" class="form-control" placeholder="Barcode ID" disabled>
                                          </div>
                                            <div class="form-group">
                                                <label >Title</label>
                                                <input name="title"  value="<?=$publication->title?>" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Volume</label>
                                                <input name="volume" value="<?=$publication->volume?>" type="text" class="form-control" placeholder="Volume" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Copy</label>
                                                <input name="copy" value="<?=$publication->copy?>" type="number" class="form-control" placeholder="Copy" required>
                                            </div>
                                            <div class="form-group" id="data_3">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" value="<?=$publication->date?>" name="date_received" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label >ISSN</label>
                                                <input name="issn" value="<?=$publication->issn?>" type="text" class="form-control" placeholder="ISSN" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Subject</label>
                                                <input name="subject" value="<?=$publication->subject?>" type="text" class="form-control" placeholder="Subject" required>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="editPublicationBtn" value="Update">
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- edit modal Section end -->
<?php endforeach ?>