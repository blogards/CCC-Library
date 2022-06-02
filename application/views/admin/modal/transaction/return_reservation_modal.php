<!-- Add Modal Section Start -->
<?php foreach($resources as $resource): ?>

<div id="resource<?=$resource->lib_id?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Return of Borrowed Library Resources</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('transaction/receive_transaction/'.$resource->lib_id);?>">
                                        <div class="modal-body">
                                            

                                            <input type="hidden" id="da_barcode" name="da_barcode" class="form-control">
                                            <p style="font-size: 24px; font-weight: 600; margin-bottom:0px  !important"><?=$resource->category?>: <span ><?=$resource->title?> is being returned.</span></p>
                                            <i>The process cannot be undone </i><br/><br/>

                                            <div class="form-group datetime-local">
                                            <label>Borrowed Date</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="pickup_date" id="" min="" max="" class="form-control" value="<?=date("d/m/y", strtotime($resource->pickup_date))?>" disabled>
                                                </div><br>

                                                <label>Expected Date of Return</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="due_date" id="" min="" max="" class="form-control " value="<?=date("d/m/y", strtotime($resource->due_date))?>" disabled>
                                                </div><br>

                                                <label>Date Received</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="datetime-local" name="return_date" id="" min="" max="" class="form-control datetime4" value="" required>
                                                    <input type="hidden" name="pick_up_date" value="<?=$resource->reservation_date?>" >
                                                </div><br>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="modal-footer">
                                            <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                            <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" name="release_reservation" id="delete">Proceed</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                      </div>
<?php endforeach ?>
                    <!-- Add Modal Section end -->