<?php  foreach($all_thesis as $thesis): ?>
<!-- Edit Modal Section Start -->
<div id="thesis<?=$thesis->barcode?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-3">
                                    <h4 class="modal-title">Update Thesis / Dissertation</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                </div>
                                <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/edit_thesis/'.$thesis->barcode)?>">
                                    <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                            <input type="hidden" id="id" name="id" class="form-control" required>
                                            <div class="form-group">
                                                <label >Barcode ID</label>
                                                <input name="barcode" value="<?=$thesis->barcode?>" type="text" class="form-control" placeholder="Barcode ID" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label >Title</label>
                                                <input name="title" value="<?=$thesis->title?>" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Author/s</label>
                                                <input name="author" value="<?=$thesis->author?>" type="text" class="form-control" placeholder="Author" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Year</label>
                                                <input name="year" value="<?=$thesis->year?>" type="text" class="form-control" placeholder="Year" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                        <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="editThesisBtn" value="Update" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- edit modal Section end -->
                    <?php endforeach ?>