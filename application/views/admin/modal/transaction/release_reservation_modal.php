<!-- Add Modal Section Start -->
<?php foreach($resources as $resource): ?>

<div id="resource<?=$resource->lib_id?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Release Reservation</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('transaction/release_transaction/'.$resource->lib_id);?>">
                                        <div class="modal-body">
                                            

                                            <input type="hidden" id="da_barcode" name="da_barcode" class="form-control">
                                            <p style="font-size: 24px; font-weight: 600; margin-bottom:0px  !important">Are you sure to release the reservation of <span ><?=$resource->title?></span></p>
                                            <i>The process cannot be undone </i><br/><br/>

                                            <!-- <div class="form-group datetime-local">
                                                <label>Pick-up Date</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                                    <input type="hidden" name="pickup_date" id="datetime2" min="" max="" class="form-control datetime2" placeholder="<?=$resource->reservation_date?>" value="<?=date("d/m/y h:i a", strtotime($resource->reservation_date))?>" >
                                                    <!-- <input type="hidden" name="pick_up_date" value="<?//=$resource->reservation_date?>" >
                                                </div><br> -->

                                                <!-- <label>Date of Return</label>
                                                <div class="input-group"> -->
                                                    <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                                    <input type="hidden" name="due_date" id="datetime3" min="" max="" class="form-control expected_due" value="" required>
                                                <!-- </div> -->
                                            <!-- </div> -->
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