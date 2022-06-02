<?php foreach($audio_visuals as $audio_visual): ?>

    <!-- Edit Modal Section Start -->
    <div id="audio-visual-<?=$audio_visual->barcode?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Update Audio Visual Material</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/edit_audio_visual/'.$audio_visual->barcode)?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" id="id" name="id" class="form-control" required>
                                          <div class="form-group">
                                            <label >Barcode ID</label>
                                            <input name="barcode" value="<?=$audio_visual->barcode?>"  type="text" class="form-control" placeholder="Barcode ID" disabled>
                                          </div>
                                            <div class="form-group">
                                                <label >Title</label>
                                                <input name="title" value="<?=$audio_visual->title?>" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Grade Level</label>
                                                <input name="grade_level" value="<?=$audio_visual->grade_level?>"   type="text" class="form-control" placeholder="Grade Level" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Subject</label>
                                                <input name="subject" value="<?=$audio_visual->subject?>"  type="text" class="form-control" placeholder="Subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Duration</label>
                                                <input name="duration" value="<?=$audio_visual->duration?>" type="text" class="form-control" placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Copyright</label>
                                                <input name="copyright" value="<?=$audio_visual->copyright?>"  type="text" class="form-control" placeholder="Publisher" required>
                                            </div>
                                            <div class="form-group" id="data_3">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_received" value="<?=$audio_visual->date_received?>"  class="form-control" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" name="editAudioVisualBtn" value="Update" >
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- edit modal Section end -->

<?php endforeach ?>