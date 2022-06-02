<!-- Add Modal Section Start -->
<?php foreach($resources as $resource): ?>

<div id="resource<?=$resource->lib_id?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Confirm Reservation</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('transaction/confirm_reservation/'.$resource->lib_id);?>">
                                        <div class="modal-body">

                                            <input type="hidden" id="da_barcode" name="da_barcode" class="form-control">
                                            <p style="font-size: 24px; font-weight: 600; margin-bottom:0px  !important">Are you sure to release the reservation of <span ><?=$resource->title?></span></p>
                                            <i>The process cannot be undone </i><br/><br/>


                                            <div class="form-group datetime-local">
                                                <label>Pick-up Date</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" name="pickup_date" id="datetime1" min="" class="form-control datetime1"  value="<?=$resource->reservation_date?>" placeholder="<?php echo date("F j, Y", strtotime($resource->reservation_date)) ?>">
                                                    <input type="hidden" name="pick_up_date" value="<?=$resource->reservation_date?>" >
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <input type="hidden" name="pick_up_date" value="<?=$resource->reservation_date?>" >
                                        <div class="modal-footer">
                                            <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                            <button href="#" class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" name="confirm_reservation" id="delete">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                      </div>
<?php endforeach ?>
                    <!-- Add Modal Section end -->